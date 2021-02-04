<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrolls extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Payroll', 'payroll');
        $this->load->module('Employees');
				$this->employees = New Employees();
	}

    public function payroll()
	{
        $year = $this->input->get('year') != NULL ? $this->input->get('year') : "" ;
        $month = $this->input->get('month') != NULL ? $this->input->get('month') : "";

         $data['payee'] = $this->payroll->getpayee();
	     	$data['deductions'] = $this->deduction->get();
		//$data['settings'] = $this->deduction->getPayrollSettings($month, $year);
		$data['overtimes'] = $this->employee->getUnpaidOvertime();
        $data['earnings'] = $this->payroll->getearnings();
        $data['payrolls'] = $this->payroll->get($month, $year);
		$data['page'] = 'Employee';
		$data['section'] = 'Payrolls';
		$data['content_view'] = 'Payrolls/payrolls';
		$this->template->admin_template($data);
	}


    public function payslip($id)
	{

        $year = $this->input->get('year') != NULL ? $this->input->get('year') : "" ;
        $month = $this->input->get('month') != NULL ? $this->input->get('month') : "";
        $data['deductions'] = $this->deduction->getPayrollSettings($id,$month,$year);
        $data['employee'] = $this->payroll->getEmployee($id);
		$data['page'] = 'Employee';
		$data['section'] = 'Payslip';
		$data['content_view'] = 'Payrolls/payslip';
		$this->template->admin_template($data);
	}
    public function payslips()
	{
        $year = $this->input->get('year') != NULL ? $this->input->get('year') : "" ;
        $month = $this->input->get('month') != NULL ? $this->input->get('month') : "";
        $data['employees'] = $this->employee->get();
		$data['page'] = 'Employee';
		$data['section'] = 'Payslip';
		$data['content_view'] = 'Payrolls/payslips';
		$this->template->admin_template($data);
	}

    public function payee()
	{

        $data['payees'] = $this->payroll->getpayee();
		$data['page'] = 'Payee';
		$data['section'] = 'Tax Bands';
		$data['content_view'] = 'Payrolls/payee_v';
		$this->template->admin_template($data);
	}
    public function earnings()
	{
        $data['positions']	= $this->employee->getPositions();
        $data['earnings'] = $this->payroll->getearnings();
		$data['page'] = 'Employee';
		$data['section'] = 'Earnings';
		$data['content_view'] = 'Payrolls/earnings_v';
		$this->template->admin_template($data);
	}
    public function addpayee()
    {
        $this->form_validation->set_rules('rate', 'Tax Rate', 'trim|required|is_unique[payee_tax_bands.rate]');
        $this->form_validation->set_rules('start', 'Minimum Salary', 'trim|required|is_unique[payee_tax_bands.start]');
        $this->form_validation->set_rules('end', 'Maximum Salary', 'trim|required|is_unique[payee_tax_bands.end]');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {
            $data = array(
                'rate' => $this->input->post('rate'),
                'start' => $this->input->post('start'),
                'end' => $this->input->post('end'),
                'added' => date('Y-m-d H:i:s')
            );
        $add = $this->payroll->addpayee($data);
        if($add){
            $response=array('msg'=> 'YES');
            echo json_encode($response);
            die();
        }else {
            $response=array('msg'=> 'NO');
            echo json_encode($response);
            die();
        }
        }
    }
    public function addearning()
    {
        $this->form_validation->set_rules('positions[]', 'Positions', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {
            $positions = implode(',', $this->input->post('positions'));
            $data = array(
                'position' => $positions,
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount'),
                'dateadded' => date('Y-m-d H:i:s')
            );
        $add = $this->payroll->createarning($data);
        if($add){
            $response=array('msg'=> 'YES');
            echo json_encode($response);
            die();
        }else {
            $response=array('msg'=> 'NO');
            echo json_encode($response);
            die();
        }
        }
    }
    public function editearning($id)
    {
        $this->form_validation->set_rules('positions[]', 'Positions', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {
            $positions = implode(',', $this->input->post('positions'));
            $data = array(
                'position' => $positions,
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount')
            );
        $add = $this->payroll->updateearning($id, $data);
        if($add){
            $response=array('msg'=> 'YES');
            echo json_encode($response);
            die();
        }else {
            $response=array('msg'=> 'NO');
            echo json_encode($response);
            die();
        }
        }
    }

    public function generate()
    {

     $this->form_validation->set_message('required', 'The %s field Should not be empty');
		 $this->form_validation->set_rules('period', 'Set Period', 'trim|required');
		 if ($this->form_validation->run() == FALSE) {
			 $response=array('msg'=> validation_errors());
			 echo json_encode($response);
			 die();
		 }else {
			 $date = $this->input->post('period');
			 $month =(int)date('m', strtotime($date));
			 $year = date('Y', strtotime($date));

     $this->earningsettings($month, $year);
     $this->payesettings($month, $year);
		 //$this->employees->settings($month, $year);



      $employees = $this->employee->get();

      foreach ($employees as $employee) {
          $check = $this->payroll->check($employee->employee_id, $month, $year);
          $earning = getIndividualEarning($employee->employee_id);
				   $deductions = $this->payroll->getDeductions($employee->employee_id,$month, $year);
					// var_dump($check);
					 $this->employees->settings($employee->employee_id,$month, $year);
					 	 //$this->employees->settings($employee->employee_id,$month, $year);
          //var_dump($earning);die;
          $taxable = 0;
          $en = 0;
          foreach ($earning as $earn) {
            //  var_dump($earn->is_taxable);die;
            if($earn->is_taxable == '1'){
                $taxable += $earn->amount;
            }
            $en += $earn->amount;
          }
					$overtime = getCulculateOverTime($employee->employee_id, $month, $year);
          $tax = $employee->salary+$taxable+$overtime;
          $payee = getPaye($tax, $month, $year);
          $paycal = ($employee->salary*$payee->rate)-($payee->subtract);
          $earnings = getEarning($employee->position_id, $month, $year);
					$advance = getPayrollAdvance($employee->employee_id, $month, $year);
          $deducted =$deductions+$paycal+$advance;
          $earned = $employee->salary+$overtime+$earnings+$en;
          $net = $earned-$deducted;


				//	 var_dump($employee->employee_id,$earnings);die;
          if(!$check):
        $data = array(
            'position' => $employee->position_id,
            'employee_id' => $employee->employee_id,
            'gross' => $employee->salary,
            'deductions' => $deducted,
            'net' => $net,
            'month' => $month,
            'year' => $year,
            'created' => date('Y-m-d H:i:s')
        );

       $create = $this->payroll->create($data);
    else:
        $data = array(
            'position' => $employee->position_id,
            'gross' => $employee->salary,
            'deductions' => $deducted,
            'net' => $net,
        );

     $create = $this->payroll->updatepayroll($check->pid, $data);

    endif;
      }
		
      if($create){
				$response=array('msg'=> 'YES');
				echo json_encode($response);
				die();
      }else {
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
      }
			// code...
		 }
    }

    public function payesettings($month, $year)
    {

        $pays = $this->payroll->getpayee();

      foreach ($pays as $payee) {
          $check = $this->payroll->checkpayee($payee->start);
          if(!$check):
        $data = array(
            'start' => $payee->start,
            'end' => $payee->end,
            'deduct' => $payee->subtract,
            'month' => $month,
            'year' => $year,
            'date' => date('Y-m-d H:i:s')
        );
        $create = $this->payroll->createpayeesettings($data);
    else:
        $data = array(
            'start' => $payee->start,
            'end' => $payee->end,
            'deduct' => $payee->subtract
        );
     $create = $this->payroll->updatepayeesettings($check->id, $data);
    endif;
      }
      if($create){
      return true;
        // $response=array('msg'=> 'YES', 'month'=>date('m'));
        // echo json_encode($response);
        // die();
      }else {
				return false;
        // $response=array('msg'=> 'NO');
        // echo json_encode($response);
        // die();
      }
    }

    public function earningsettings($month, $year)
    {

        $earnings = $this->payroll->getearnings();
        $iearnings = $this->payroll->getindvidualearnings();

      foreach ($earnings as $earning) {
          $check = $this->payroll->checkearnings($earning->id);
					$data = array(
							'earning_id' => $earning->id,
							'position' => $earning->position,
							'description' => $earning->description,
							'amount'=> $earning->amount,
							'month' => $month,
							'year' => $year,
							'dateadded' => date('Y-m-d H:i:s')
					);
          if(!$check):
        $create = $this->payroll->createearningsettings($data);
    else:
     $create = $this->payroll->updateearningsettings($check->id, $data);
    endif;
      }

      foreach ($iearnings as $earning) {
        $check = $this->payroll->checkindvearnings($earning->id_earn);
				$data = array(
						'id_earn' => $earning->id_earn,
						'employee' => $earning->employee,
						'description' => $earning->description,
						'amount'=> $earning->amount,
						'is_taxable' => $earning->is_taxable,
						'month' => $month,
						'year' => $year,
						'dateadded' => date('Y-m-d H:i:s')
				);
        if(!$check):
      $create = $this->payroll->createindividualsettings($data);
  else:
   $create = $this->payroll->updateindvidualsettings($check->id_earn, $data);
  endif;
    }
      if($create){
				return true;
        // $response=array('msg'=> 'YES', 'month'=>date('m'));
        // echo json_encode($response);
        // die();
      }else {
				return false;
        // $response=array('msg'=> 'NO');
        // echo json_encode($response);
        // die();
      }
    }

		public function payovertime()
		{

				$ids = $this->input->post('id');
				if(!empty($ids)):
			foreach ($ids as $id) {

				$data = array(
						'status' => 'paid',
						'payment_month' => date('m'),
						'payment_year' => date('Y')
				);
				$create = $this->employee->updateovertime($id, $data);

			}
			if($create){
				$response=array('msg'=> 'YES', 'month'=>date('m'));
				echo json_encode($response);
				die();
			}else {
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
			}
    else:
			$response=array('msg'=> 'There is no pending overtime this month');
			echo json_encode($response);
			die();
		endif;

		}


}
