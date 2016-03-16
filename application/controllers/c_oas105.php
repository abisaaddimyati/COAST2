<?php /************************************************************************************************* Program History :** Project Name     : OAS* Client Name      : CBI - Muhammad* Program Id       : OAS105* Program Name     : Data Bantuan Per Karyawan* Description      :* Environment      : PHP 5.4.4* Author           : Winni Oktaviani* Version          : 01.00.00* Creation Date    : 23-02-2015 10:05:00 ICT 2015** Update history     Re-fix date       Person in charge      Description* ** Copyright(C) [..]. All Rights Reserved*************************************************************************************************/if ( ! defined('BASEPATH')) exit('No direct script access allowed');class C_OAS105 extends MY_Controller {		function __construct()	{		parent::__construct();		$index	= $this->config->item('index_page');		$host	= $this->config->item('base_url');		$this->url = empty($index) ? $host : $host . $index . '/';		$this->load->model('m_oas105','setting_model');	}	function load_view()	{		$param['employee_list'] = $this->setting_model->get_employee_list();		$param['user_list']		= $this->setting_model->get_user();		$this->load->view('v_oas105', $param);	}		function search()	{		$search['employeeid']	= $this->input->get('employeeid');		$param['employee_list'] = $this->setting_model->get_employee_list($search['employeeid']);		$param['user_list']		= $this->setting_model->get_user();		$param['search_param']	= $search;		$this->load->view('v_oas105', $param);	}	}/* End of file c_oas105.php *//* Location: ./application/controllers/c_oas105.php */