<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deductions extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Deduction','deduction');
	}

	public function index()
	{
		$data['deductions'] = $this->deduction->get();
		$data['page'] = 'Deduction';
		$data['section'] = 'List';
		$data['content_view'] = 'Deductions/index';
		$this->template->admin_template($data);
	}

	public function add()
	{
		$this->form_validation->set_rules('description', 'Description', 'trim|required|is_unique[deductions.description]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|is_numeric');
		if($this->form_validation->run() == FALSE){
		$response=array('msg'=> validation_errors());
		echo json_encode($response);
		die();
		}else{
			$data = array(
				'description'=> $this->input->post('description'),
				'amount' => $this->input->post('amount')
			);
			$add = $this->deduction->add($data);
			if($add){
			$response=array('msg'=> 'YES');
			echo json_encode($response);
			die();
			}else{
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|is_numeric');
		if($this->form_validation->run() == FALSE){
		$response=array('msg'=> validation_errors());
		echo json_encode($response);
		die();
		}else{
			$data = array(
				'description'=> $this->input->post('description'),
				'amount' => $this->input->post('amount')
			);
			$add = $this->deduction->update($id, $data);
			if($add){
			$response=array('msg'=> 'YES');
			echo json_encode($response);
			die();
			}else{
				$response=array('msg'=> 'NO');
				echo json_encode($response);
				die();
			}
		}
	}

	public function rmdeduct($id)
	{

   $type = $this->input->get('type');
		if($type == 'deactivate'):
			$data = array(
				'status'=> '0'
			);
		else :
			$data = array(
				'status'=> '1'
			);
		endif;
			$add = $this->deduction->update($id, $data);
			if($add){
		  $this->session->set_flashdata('success', 'Status changed');
			redirect('deductions');
			}else{
				$this->session->set_flashdata('error', 'Failed to change status due to unknown error');
				redirect('deductions');
				}

			}


}
