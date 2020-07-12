<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

    public $tables = 'pendaftaran_anggota';
    public $table = 'pendaftaran';
    public $id = 'kode_daftar';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('kode_daftar,nama_ketua,noid_ketua,alamat,tujuan,tlp_ketua,email,tgl_berangkat,tgl_pulang,status,total_bayar');
        $this->datatables->from('pendaftaran');
        $this->datatables->where('tujuan','Tujuan1');
        //add this line for join
        //$this->datatables->join('table2', 'pendaftaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pendaftaran/read/$1'),'Read')." | ".anchor(site_url('pendaftaran/update/$1'),'Update')." | ".anchor(site_url('pendaftaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'kode_daftar');
        return $this->datatables->generate();
    }
    function json2() {
        $this->datatables->select('kode_daftar,nama_ketua,noid_ketua,alamat,tujuan,tlp_ketua,email,tgl_berangkat,tgl_pulang,status,total_bayar');
        $this->datatables->from('pendaftaran');
        $this->datatables->where('tujuan','Tujuan2');
        //add this line for join
        //$this->datatables->join('table2', 'pendaftaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pendaftaran/read/$1'),'Read')." | ".anchor(site_url('pendaftaran/update/$1'),'Update')." | ".anchor(site_url('pendaftaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'kode_daftar');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kode_daftar', $q);
	$this->db->or_like('nama_ketua', $q);
	$this->db->or_like('noid_ketua', $q);
	$this->db->or_like('tujuan', $q);
	$this->db->or_like('tlp_ketua', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('tgl_berangkat', $q);
	$this->db->or_like('tgl_pulang', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('total_bayar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kode_daftar', $q);
	$this->db->or_like('nama_ketua', $q);
	$this->db->or_like('noid_ketua', $q);
	$this->db->or_like('tujuan', $q);
	$this->db->or_like('tlp_ketua', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('tgl_berangkat', $q);
	$this->db->or_like('tgl_pulang', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('total_bayar', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    // insert data
    function insertanggota($data)
    {
        $this->db->insert($this->tables, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pendaftaran_model.php */
/* Location: ./application/models/Pendaftaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 11:26:31 */
/* http://harviacode.com */