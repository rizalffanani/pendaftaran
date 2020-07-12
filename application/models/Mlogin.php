<?php
class Mlogin extends CI_Model
{
    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function validate($username,$password)
    {
        $this->db->select('*')
             ->from('users')
             ->where('username', $username)
             ->where('password', $password)
             ->join('auth_assignment', 'users.id = auth_assignment.user_id');
        return $result = $this->db->get()->row();     
    }

    public function validateusername($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->join('table2', 'kategori.field = table2.field');
        return $query = $this->db->get('users')->row();     
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert2($data)
    {
        $this->db->insert('users_detail', $data);
    }

    function get_by_id($id)
    {
        // $this->db->select('username');
        $this->db->where('username', $id);
        return $this->db->get($this->table)->row();
    }    
    function get_by_email($id)
    {
        // $this->db->select('username');
        $this->db->where('email', $id);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update('users_detail', $data);
    }

    function updatepass($id, $data)
    {
        $this->db->where('username', $id);
        $this->db->update('users', $data);
    }
}
