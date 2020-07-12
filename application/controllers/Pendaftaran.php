<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title'=>'Tujuan 1');
        $this->template->load('template','pendaftaran/pendaftaran_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pendaftaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'kode_daftar' => $row->kode_daftar,
    		'nama_ketua' => $row->nama_ketua,
    		'noid_ketua' => $row->noid_ketua,
    		'tujuan' => $row->tujuan,
    		'tlp_ketua' => $row->tlp_ketua,
    		'email' => $row->email,
    		'tgl_berangkat' => $row->tgl_berangkat,
    		'tgl_pulang' => $row->tgl_pulang,
    		'status' => $row->status,
    		'total_bayar' => $row->total_bayar,
    	    );
            $this->template->load('template','pendaftaran/pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendaftaran/create_action'),
    	    'kode_daftar' => set_value('kode_daftar'),
    	    'nama_ketua' => set_value('nama_ketua'),
    	    'noid_ketua' => set_value('noid_ketua'),
    	    'tujuan' => set_value('tujuan'),
    	    'tlp_ketua' => set_value('tlp_ketua'),
    	    'email' => set_value('email'),
    	    'tgl_berangkat' => set_value('tgl_berangkat'),
    	    'tgl_pulang' => set_value('tgl_pulang'),
    	    'status' => set_value('status'),
    	    'total_bayar' => set_value('total_bayar'),
    	);
        $this->template->load('template','pendaftaran/pendaftaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ketua' => $this->input->post('nama_ketua',TRUE),
		'noid_ketua' => $this->input->post('noid_ketua',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'tlp_ketua' => $this->input->post('tlp_ketua',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tgl_berangkat' => $this->input->post('tgl_berangkat',TRUE),
		'tgl_pulang' => $this->input->post('tgl_pulang',TRUE),
		'status' => $this->input->post('status',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
        		'kode_daftar' => set_value('kode_daftar', $row->kode_daftar),
        		'nama_ketua' => set_value('nama_ketua', $row->nama_ketua),
        		'noid_ketua' => set_value('noid_ketua', $row->noid_ketua),
        		'tujuan' => set_value('tujuan', $row->tujuan),
        		'tlp_ketua' => set_value('tlp_ketua', $row->tlp_ketua),
        		'email' => set_value('email', $row->email),
        		'tgl_berangkat' => set_value('tgl_berangkat', $row->tgl_berangkat),
        		'tgl_pulang' => set_value('tgl_pulang', $row->tgl_pulang),
        		'status' => set_value('status', $row->status),
        		'total_bayar' => set_value('total_bayar', $row->total_bayar),
        	);
            $this->template->load('template','pendaftaran/pendaftaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_daftar', TRUE));
        } else {
            $data = array(
		'nama_ketua' => $this->input->post('nama_ketua',TRUE),
		'noid_ketua' => $this->input->post('noid_ketua',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'tlp_ketua' => $this->input->post('tlp_ketua',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tgl_berangkat' => $this->input->post('tgl_berangkat',TRUE),
		'tgl_pulang' => $this->input->post('tgl_pulang',TRUE),
		'status' => $this->input->post('status',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('kode_daftar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ketua', 'nama ketua', 'trim|required');
	$this->form_validation->set_rules('noid_ketua', 'noid ketua', 'trim|required');
	$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('tlp_ketua', 'tlp ketua', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tgl_berangkat', 'tgl berangkat', 'trim|required');
	$this->form_validation->set_rules('tgl_pulang', 'tgl pulang', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');

	$this->form_validation->set_rules('kode_daftar', 'kode_daftar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 11:26:31 */
/* http://harviacode.com */