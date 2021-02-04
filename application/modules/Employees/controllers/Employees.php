<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Employee', 'employee');
		$this->load->module('Deductions');
		$this->load->module('Payrolls');
	}

	public function index()
	{
		$data['positions']	= $this->employee->getPositions();
		$data['schedules']	= $this->employee->getSchedules();
		$data['employees']	= $this->employee->get();
		$data['deductions'] = $this->deduction->get();
		$data['page'] = 'Employee';
		$data['section'] = 'List';
		$data['content_view'] = 'Employees/index';
		$this->template->admin_template($data);
	}

	public function addemployee()
	{
	  $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
	  $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
	  $this->form_validation->set_rules('gender', 'Gender', 'required');
	  $this->form_validation->set_rules('dob', 'DOB', 'required');
	  $this->form_validation->set_rules('address', 'Address', 'trim|required');
	  $this->form_validation->set_rules('cell', 'Phone Number', 'trim|required');
	  $this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[employees.email]');
	  $this->form_validation->set_rules('position', 'Position', 'trim|required');
	  $this->form_validation->set_rules('schedule', 'Work Schedule', 'trim|required');
	  $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
	  $this->form_validation->set_rules('kin', 'Next of Kin', 'trim|required');
	  $this->form_validation->set_rules('national_id', 'National ID', 'trim|required');
	  $this->form_validation->set_rules('account', 'Account', 'trim|required');
	  $this->form_validation->set_rules('pay_day', 'Pay Day', 'trim|required|is_numeric');
	  $this->form_validation->set_rules('kinaddress', 'Next of Kin Address', 'trim|required');
	  $this->form_validation->set_rules('kinphone', 'Next of Kin Phone', 'trim|required');
		$this->form_validation->set_rules('engagement_date', 'Engagement Date', 'trim|required');
	  if($this->form_validation->run() == FALSE){
		$response=array('msg'=> validation_errors());
		echo json_encode($response);
		die();
	  }else {
		  $data = array(
			'firstname' => $this->input->post('fname'),
			'middlename' => $this->input->post('mname'),
			'lastname' => $this->input->post('lname'),
			'gender' => $this->input->post('gender'),
			'birthdate' => $this->input->post('dob'),
			'address' => $this->input->post('address'),
			'contact_info' => $this->input->post('cell'),
			'email' => $this->input->post('email'),
			'position_id' => $this->input->post('position'),
			'schedule_id' => $this->input->post('schedule'),
			'account' => $this->input->post('account'),
			'pay_day' => $this->input->post('pay_day'),
			'national_id' => $this->input->post('national_id'),
			'salary' => $this->input->post('salary'),
			'engagement_date' => date('Y-m-d', strtotime($this->input->post('engagement_date'))),
			'created_on' => date('Y-m-d H:i:s'),
		  );
		  $add = $this->employee->create($data);
		  if($add){
			$data = array(
				'employee_id' => $add,
				'kname' => $this->input->post('kin'),
				'kaddress' => $this->input->post('kinaddress'),
				'kphone' => $this->input->post('kinphone'),
				'date' => date('Y-m-d H:i:s'),
			);
			$kin = $this->employee->addkin($data);
			if($kin){
				$response=array('msg'=> 'YES');
				echo json_encode($response);
				die();
			}else {
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
			}
		  }else {
			$response=array('msg'=> 'NO');
			echo json_encode($response);
			die();
		  }
	  }
	}

	public function editemployee($id)
	{
	  $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
	  $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
	  $this->form_validation->set_rules('gender', 'Gender', 'required');
	  $this->form_validation->set_rules('dob', 'DOB', 'required');
	  $this->form_validation->set_rules('address', 'Address', 'trim|required');
	  $this->form_validation->set_rules('national_id', 'National ID', 'trim|required');
	  $this->form_validation->set_rules('account', 'Account', 'trim|required');
	  $this->form_validation->set_rules('pay_day', 'Pay Day', 'trim|required|is_numeric');
	  $this->form_validation->set_rules('cell', 'Phone Number', 'trim|required');
	  $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
	  $this->form_validation->set_rules('position', 'Position', 'trim|required');
	  $this->form_validation->set_rules('schedule', 'Work Schedule', 'trim|required');
	  $this->form_validation->set_rules('kin', 'Next of Kin', 'trim|required');
	  $this->form_validation->set_rules('kinaddress', 'Next of Kin Address', 'trim|required');
	  $this->form_validation->set_rules('kinphone', 'Next of Kin Phone', 'trim|required');
	  $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
		 $this->form_validation->set_rules('engagement_date', 'Engagement Date', 'trim|required');
	  if($this->form_validation->run() == FALSE){
		$response=array('msg'=> validation_errors());
		echo json_encode($response);
		die();
	  }else {
		  $data = array(
			'firstname' => $this->input->post('fname'),
			'middlename' => $this->input->post('mname'),
			'lastname' => $this->input->post('lname'),
			'gender' => $this->input->post('gender'),
			'birthdate' => $this->input->post('dob'),
			'address' => $this->input->post('address'),
			'contact_info' => $this->input->post('cell'),
			'email' => $this->input->post('email'),
			'position_id' => $this->input->post('position'),
			'schedule_id' => $this->input->post('schedule'),
			'account' => $this->input->post('account'),
			'pay_day' => $this->input->post('pay_day'),
			'national_id' => $this->input->post('national_id'),
			'salary' => $this->input->post('salary'),
			'engagement_date' => date('Y-m-d', strtotime($this->input->post('engagement_date')))
		  );
		//   var_dump($data);die;
		  $add = $this->employee->update($id,$data);
		  if($add){
			$data = array(
				'kname' => $this->input->post('kin'),
				'kaddress' => $this->input->post('kinaddress'),
				'kphone' => $this->input->post('kinphone')
			);
			$kin = $this->employee->updatekin($id, $data);
			if($kin){
				$response=array('msg'=> 'YES');
				echo json_encode($response);
				die();
			}else {
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
			}
		  }else {
			$response=array('msg'=> 'NO');
			echo json_encode($response);
			die();
		  }
	  }
	}
	public function positions()
	{
		$data['positions']	= $this->employee->getPositions();
		$data['page'] = 'Employee';
		$data['section'] = 'Positions';
		$data['content_view'] = 'Employees/positions';
		$this->template->admin_template($data);
	}

	public function overtime()
	{
		$data['overtimes'] = $this->employee->getOvertime();
		$data['employees']	= $this->employee->get();
		$data['page'] = 'Overtime';
		$data['section'] = 'List';
		$data['content_view'] = 'Employees/overtime';
		$this->template->admin_template($data);
	}

	public function advance()
	{
		$data['employees']	= $this->employee->get();
		$data['advances'] =	$this->employee->getAdvance();
		$data['page'] = 'Advance';
		$data['section'] = 'Payments';
		$data['content_view'] = 'Employees/advance';
		$this->template->admin_template($data);
	}

	public function schedules()
	{
		$data['schedules']	= $this->employee->getSchedules();
		$data['page'] = 'Work';
		$data['section'] = 'Schedules';
		$data['content_view'] = 'Employees/schedules';
		$this->template->admin_template($data);
	}


	public function settings($employee, $month, $year)
	{


		$settings =$this->deduction->get();
		if($settings):

		foreach($settings as $set)
			{
				$data = array(
					'description' => $set->description,
					'status' => $set->status,
							);
		  $check = $this->deduction->checksettings($employee, $set->id,$month, $year);
				$deduction =	getLastDeduction($set->id,$employee);
			//var_dump($check);die;
			if($check):
			$this->deduction->updatesettings($check->id, $data);
		elseif(!$check && $set->status == '1' && $deduction):

		$data = array(
			 'did' => $deduction->did,
			 'employee' => $employee,
			 'amount' => $deduction->amount,
			 'year' => $year,
			 'month' => $month,
			 'description' => $set->description,
			 'status' => $set->status,
			 'date' => date('Y-m-d H:i:s')
		 );
		$this->deduction->createsettings($data);
			endif;
			}

				return true;

		else:
			return false;
		endif;
		}



		public function addDeductions($id)
		{

		   $this->form_validation->set_rules('period', 'Period', 'trim|required');
			 if ($this->form_validation->run() == FALSE) {
				 $response=array('msg'=> validation_errors());
 		 		echo json_encode($response);
 		 		die();
			}else {
				$deduction = $this->input->post('deduction');
				$amount = $this->input->post('amount');
				$period = $this->input->post('period');
			  $month = date('m', strtotime($period));
				$year = date('Y', strtotime($period));

				for($count = 0; $count < count($deduction); $count++)
				{
					if(!empty($deduction[$count]) && empty($amount[$count])){
						$response=array('msg'=> 'Amount is not supposed to be empty for all selected deduductions. Check if all selected values are not empty');
						echo json_encode($response);
						die();
					}
					if(!empty($deduction[$count])):
					  $check = $this->deduction->checksettings($id, $deduction[$count], $month, $year);
						$data = array(
							'did' => $deduction[$count],
							'employee' => $id,
							'amount' => $amount[$count],
							'year' => $year,
							'month' => $month,
							'status' => 1,
							'date' => date('Y-m-d H:i:s')
						);
					//	var_dump($check);die;
						if(!$check){
					$create = $this->deduction->createsettings($data);
				}else{
						$create = $this->deduction->updatesettings($check->id, $data);
				}
			else:
				$response=array('msg'=> 'Please select at least one option to add deduction to employee');
				echo json_encode($response);
				die();
			 endif;
				}
     if (isset($create) && $create == TRUE) {
				$response=array('msg'=> 'YES', 'month'=>$month, 'year'=>$year);
				echo json_encode($response);
				die();
     }else {

				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
     }


			}


		}

	public function workschedules()
	{
		$data['employees']	= $this->employee->get();
		$data['attendance'] = $this->employee->getAttendance();
		$data['page'] = 'Work';
		$data['section'] = 'Schedules';
		$data['content_view'] = 'Employees/work_schedule';
		$this->template->admin_template($data);
	}

	public function attend()
	{
	  $popcorn = $this->input->post('popcorn');

	    $day =  $this->input->post('day');
	    $timein =  $this->input->post('time_in');
	    $timeout = $this->input->post('time_out');
	    $employee = $this->input->post('employee');
			if(empty($employee)){
				$response=array('msg'=> 'Please select employee');
				echo json_encode($response);
				die();
			}
	    for($count = 0; $count < count($day); $count++)
			{
				if(!empty($employee) && !empty($timein[$count]) && !empty($timeout[$count])):
			//	define("SECONDS_PER_HOUR", 60*60);
				$start = strtotime($day[$count]." ".$timein[$count]);
				$stop = strtotime($day[$count]." ".$timeout[$count]);
	      if(!empty($timein[$count]) && empty($timeout[$count])){
	        $response=array('msg'=> 'Field Timeout is required. Please make sure all values are correct');
	        echo json_encode($response);
	        die();
	      }
	      if(!empty($timeout[$count]) && empty($timein[$count])){
	        $response=array('msg'=> 'Field Timein is required. Please make sure all values are correct');
	        echo json_encode($response);
	        die();
	      }
	      if($start >= $stop){
	        $response=array('msg'=> 'Time in can never greater or equal to time out. Please make sure all values are correct');
	        echo json_encode($response);
	        die();
	      }

	        $check = $this->employee->checkday(date('Y-m-d', strtotime($day[$count])), $employee);

					$diff = round(abs($stop-$start))/3600;

	        if(!$check){
	      $data = array(
	        'employee_id' => $employee,
	        'time_in' => date('H:i:s', strtotime($timein[$count])),
	        'time_out' => date('H:i:s', strtotime($timeout[$count])),
	        'date' => date('Y-m-d', strtotime($day[$count])),
	        'status' => 1,
	        'num_hr' => $diff,
	      );
	      $create = $this->employee->createattendance($data);
	    }else {
	      $response=array('msg'=> 'This record already exist. Please recheck data and confirm');
	      echo json_encode($response);
	      die();
	    }
		endif;
	    }

	        $response=array('msg'=> 'YES');
	        echo json_encode($response);
	        die();


	}

	public function earnings($id)
	{

        $data['earnings'] = $this->employee->getearnings($id);
		$data['id'] = $id;
		$data['page'] = 'Employee';
		$data['section'] = 'Earnings';
		$data['content_view'] = 'Employees/earnings_v';
		$this->template->admin_template($data);
	}

	public function addearning($id)
    {
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {

            $data = array(
                'employee' => $id,
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount'),
				'is_taxable'=> $this->input->post('tax'),
                'date' => date('Y-m-d H:i:s')
            );
        $add = $this->employee->createarning($data);
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

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {
            $data = array(
                'is_taxable' =>  $this->input->post('tax'),
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount')
            );
        $add = $this->employee->updateearning($id, $data);
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


	public function createadvance()
    {
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('employee', 'Employee', 'trim|required');
		$this->form_validation->set_rules('issued', 'Date Issued', 'trim|required');
		$this->form_validation->set_rules('repayment', 'Repayment Date', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {

            $data = array(
                'employee_id' => $this->input->post('employee'),
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount'),
				'date_advance'=> date('Y-m-d', strtotime($this->input->post('issued'))),
				'payment_date' => date('Y-m-d', strtotime($this->input->post('repayment'))),
                'created' => date('Y-m-d H:i:s')
            );
        $add = $this->employee->createadvance($data);
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
    public function editadvance($id)
    {

		$this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->form_validation->set_rules('employee', 'Employee', 'trim|required');
		$this->form_validation->set_rules('issued', 'Date Issued', 'trim|required');
		$this->form_validation->set_rules('repayment', 'Repayment Date', 'trim|required');
        if ( $this->form_validation->run() == FALSE ) {
            $response=array('msg'=> validation_errors());
            echo json_encode($response);
            die();
        }else {

            $data = array(
                'employee_id' => $this->input->post('employee'),
                'description'=>$this->input->post('description'),
                'amount' => $this->input->post('amount'),
				'date_advance'=> date('Y-m-d', strtotime($this->input->post('issued'))),
				'payment_date' => date('Y-m-d', strtotime($this->input->post('repayment'))),
            );
        $add = $this->employee->updateadvance($id, $data);
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


			public function addposition()
		    {
		        $this->form_validation->set_rules('description', 'Description', 'trim|required');
		        $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
			    	$this->form_validation->set_rules('grade', 'Grade', 'trim|required');
		        if ( $this->form_validation->run() == FALSE ) {
		            $response=array('msg'=> validation_errors());
		            echo json_encode($response);
		            die();
		        }else {

		            $data = array(
		                'description'=>$this->input->post('description'),
		                'rate' => $this->input->post('rate'),
										'grade' => $this->input->post('grade'),
		                // 'created' => date('Y-m-d H:i:s')
		            );
		        $add = $this->employee->createposition($data);
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
		    public function editposition($id)
		    {

					$this->form_validation->set_rules('description', 'Description', 'trim|required');
					$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
					$this->form_validation->set_rules('grade', 'Grade', 'trim|required');
					if ( $this->form_validation->run() == FALSE ) {
							$response=array('msg'=> validation_errors());
							echo json_encode($response);
							die();
					}else {

							$data = array(
									'description'=>$this->input->post('description'),
									'rate' => $this->input->post('rate'),
									'grade' => $this->input->post('grade'),
									// 'created' => date('Y-m-d H:i:s')
							);
					$add = $this->employee->updateposition($id,$data);
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

				public function addschedule()
					{
							$this->form_validation->set_rules('time_in', 'Time In', 'trim|required');
							$this->form_validation->set_rules('time_out', 'Time Out', 'trim|required');
							if ( $this->form_validation->run() == FALSE ) {
									$response=array('msg'=> validation_errors());
									echo json_encode($response);
									die();
							}else {

									$data = array(
											'time_in'=>$this->input->post('time_in'),
											'time_out' => $this->input->post('time_out'),
											// 'created' => date('Y-m-d H:i:s')
									);
							$add = $this->employee->createschedule($data);
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
					public function editschedule($id)
					{

						$this->form_validation->set_rules('time_in', 'Time In', 'trim|required');
						$this->form_validation->set_rules('time_out', 'Time Out', 'trim|required');
						if ( $this->form_validation->run() == FALSE ) {
								$response=array('msg'=> validation_errors());
								echo json_encode($response);
								die();
						}else {

								$data = array(
										'time_in'=>$this->input->post('time_in'),
										'time_out' => $this->input->post('time_out'),
										// 'created' => date('Y-m-d H:i:s')
								);
						$add = $this->employee->updateschedule($id, $data);
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

					public function addovertime()
						{
								$this->form_validation->set_rules('employee', 'Employee', 'trim|required');
								$this->form_validation->set_rules('hours', 'Hours', 'trim|required');
								$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
								$this->form_validation->set_rules('date_overtime', 'Overtime Date', 'trim|required');
								if ( $this->form_validation->run() == FALSE ) {
										$response=array('msg'=> validation_errors());
										echo json_encode($response);
										die();
								}else {

										$data = array(
												'employee_id'=>$this->input->post('employee'),
												'hours' => $this->input->post('hours'),
												'rate' => $this->input->post('rate'),
												'date_overtime' => date('Y-m-d', strtotime($this->input->post('date_overtime')))
										);
								$add = $this->employee->createovertime($data);
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
						public function updateovertime($id)
						{

							$this->form_validation->set_rules('employee', 'Employee', 'trim|required');
							$this->form_validation->set_rules('hours', 'Hours', 'trim|required');
							$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
							$this->form_validation->set_rules('date_overtime', 'Overtime Date', 'trim|required');
							if ( $this->form_validation->run() == FALSE ) {
									$response=array('msg'=> validation_errors());
									echo json_encode($response);
									die();
							}else {

									$data = array(
											'employee_id'=>$this->input->post('employee'),
											'hours' => $this->input->post('hours'),
											'rate' => $this->input->post('rate'),
											'date_overtime' => date('Y-m-d', strtotime($this->input->post('date_overtime')))
									);
							$add = $this->employee->updateovertime($id, $data);
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
						public function deduct()
					{
						$data['deductions'] = $this->deduction->get();
						$data['page'] = 'Employee';
						$data['section'] = 'Deductions';
						$data['content_view'] = 'Payrolls/deduct_v';
						$this->template->admin_template($data);
					}

}
