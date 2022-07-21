<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();

		public function __construct()
		{
			$this->CI =& get_instance();
			// $this->CI->load->model('m_identitas');
			// $this->CI->load->model('m_kelompok');
		}

		function rupiah($angka){
	
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		 
		}

		function set($content_area, $value)
		{
			$this->template_data[$content_area] = $value;
		}
	
		function load($template = '', $name ='', $view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			// $view_data['identitas'] = $this->CI->m_identitas->data();
			// $view_data['kelompok'] = $this->CI->m_kelompok->get_all_kelompok();
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('front/'.$template, $this->template_data);
		}

		function dashboard($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			// $view_data['identitas'] = $this->CI->m_identitas->data();
			// $this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template', $this->template_data);
		}

		function admin($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			// $view_data['identitas'] = $this->CI->m_identitas->data();
			// $this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template-non', $this->template_data);
		}

		function edit($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			// $view_data['identitas'] = $this->CI->m_identitas->data();
			// $this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template-edit', $this->template_data);
		}

}