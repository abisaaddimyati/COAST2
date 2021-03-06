<?php 
/************************************************************************************************
 * Program History :
*
* Project Name     : OAS
* Client Name      : CBI - Muhammad
* Program Id       : OAS034
* Program Name     : Paid Selected
* Description      :
* Environment      : PHP 5.4.4
* Author           : Dwi Irawati
* Version          : 01.00.00
* Creation Date    : 31-10-2014 10:20:00 ICT 2014
*
* Update history     Re-fix date       Person in charge      Description
* 
*
* Copyright(C) [..]. All Rights Reserved
*************************************************************************************************/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_OAS034 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$index	= $this->config->item('index_page');
		$host	= $this->config->item('base_url');

		$this->url = empty($index) ? $host : $host . $index . '/';
		$this->user	= unserialize(base64_decode($this->session->userdata('user')));

		$this->load->model('m_oas034', 'list_model');
		
	}

	function _get_post_data()
	{
		$search['employeeGroup']	= $this->user['group'];
		$search['employeeid']		= $this->input->get('employeeid');
		$search['employeename']		= $this->input->get('employeename');
		$search['claimtype']		= $this->input->get('claimtype');
		$search['group_id']			= $this->input->get('group');
		$search['division_id']		= $this->input->get('division');
		
		$search['year'] = $this->input->get('year');
		$search['month'] = $this->input->get('month');

		return $search;
	}

	function search()
	{
		$search = $this->_get_post_data();

		$employeeID = $this->user['id'];
		$param['this_id'] = $this->user['id'];
		$param['submission_list'] = $this->list_model->get_search_list($employeeID, $search);
		$param['list_group'] = $this->list_model->get_group_list();

		if($search['group_id'] != ''){
			$param['list_division'] = $this->list_model->get_division_list($search['group_id']);
		}
		
		$param['list_claim_type'] = $this->list_model->get_claim_type_list();
		$param['search_param'] = $search;
		$param['month_list'] = $this->month_list;	
		$param['employee_list'] = $this->list_model->get_employee_list();
		$this->load->view('v_oas034', $param);
	}

	function load_view()
	{
		$employeeID = $this->user['id'];
		$param['employeeGroup'] = $this->user['group'];

		$param['this_id'] = $this->user['id'];
		$param['submission_list'] = $this->list_model->get_list($param);
		$param['list_group'] = $this->list_model->get_group_list();
		$param['list_claim_type'] = $this->list_model->get_claim_type_list();
		$param['month_list'] = $this->month_list;	
		$param['employee_list'] = $this->list_model->get_employee_list();
		$this->load->view('v_oas034', $param);
	}

	function load_division($group_id = '')
	{
		$out = array();
		header('Content-Type: application/x-json; charset=utf-8');

		if($group_id != ''){
			$division_list = $this->list_model->get_division_list($group_id);
			if(isset($division_list)){
				$out[''] = '-- All --';
				foreach ($division_list as $division) {
					$out[$division['id']] = $division['name'];
				}
			}else{
				$out['0'] = '-- Data Not Found --';
			}
		}
		else
		{
			$out[''] = '-- All --';
		}
		echo(json_encode($out));
	}

	public function paid_selected(){
		$update = $this->list_model->paid_selected();
		if($update){
			header('location:'.base_url().'#');
		}
	}
}

/* End of file c_oas034.php */
/* Location: ./application/controllers/c_oas034.php */