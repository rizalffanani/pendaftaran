<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Info_model');
        $this->load->model('Pendaftaran_model');
    }

    public function index()
    {
        $data = array(
            'barang_dat1' => 'hf',
        );
        $this->template->load('template2','frontend/home', $data);
    }    
    public function info()
    {
        $data = array(
            'title' => 'Info',
        );
        $this->template->load('template2','frontend/info', $data);
    }   
    public function tentang()
    {
        $data = array(
            'title' => 'Tutorial',
        );
        $this->template->load('template2','frontend/tentang', $data);
    }    
    public function list()
    {
        $data = array(
            'title' => 'Tentang',
        );
        $this->template->load('template2','frontend/list', $data);
    }    
    public function daftar()
    {
        $data = array(
            'title' => 'Form Daftar',
        );
        $this->template->load('template2','frontend/daftar', $data);
    }    
    public function tabel(){
        $a = $this->input->post('a',TRUE);
        ?>
            <td>
              <input type="text" class="form-control" name="namaanggota[]" id="namaanggota<?= $a?>" placeholder="Nama Anggota" required/>
            </td>
            <td>
              <input type="number" class="form-control" name="tlpanggota[]" id="tlpanggota<?= $a?>" placeholder="No Telp" min="0"  mk<?= $a?>="<?= $a?>"  required/>
            </td>
            <td>
              <select name="jenisid[]" id="jenisid<?= $a?>" class="form-control" required>
                <option>Jenis Identitas</option>
                <option value="KK">KK</option>
                <option value="KTM">KTM</option>
                <option value="KTP">KTP</option>
                <option value="PASSPORT">PASSPORT</option>
              </select>
            </td>
            <td>
              <input type="number" class="form-control" name="noid[]" id="noid<?= $a?>" placeholder="No Identitas" min="0" required/>
            </td>
            <td>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jeniskelamin[<?= ($a-1)?>]" value="L" required>
                  <label class="form-check-label">L</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jeniskelamin[<?= ($a-1)?>]" value="P">
                  <label class="form-check-label">P</label>
                </div>
              </div>
            </div>
            </td>
            <td><a href="#" onclick="hapus(this)">Hapus</a></td>
    <?php
    }
    public function kirim(){
        function generateRandomStringLengkap($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->daftar();
        } else {
            $kode_daftar = generateRandomStringLengkap(10);
            $data = array(
                'kode_daftar' => $kode_daftar,
                'nama_ketua' => $this->input->post('namaketua',TRUE),
                'jenisid' => $this->input->post('jenisids',TRUE),
                'noid_ketua' => $this->input->post('noidentitas',TRUE),
                'tujuan' => $this->input->post('tujuan',TRUE),
                'tlp_ketua' => $this->input->post('tlp',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'email' => $this->input->post('email',TRUE),
                'tgl_berangkat' => $this->input->post('tglberangkat',TRUE),
                'tgl_pulang' => $this->input->post('tglpulang',TRUE),
                'status' => 'belum bayar',
                'total_bayar' => (10000*count($this->input->post('namaanggota'))),
            );
            $this->Pendaftaran_model->insert($data);
            $ida= $this->db->insert_id();
            for ($i=0; $i < count($this->input->post('namaanggota')); $i++) { 
                $data2 = array(
                    'kode_daftar' => $kode_daftar,
                    'nama_anggota' => $this->input->post('namaanggota',TRUE)[$i],
                    'tlp_anggota' => $this->input->post('tlpanggota',TRUE)[$i],
                    'jenis_id' => $this->input->post('jenisid',TRUE)[$i],
                    'noid' => $this->input->post('noid',TRUE)[$i],
                    'jenis_kelamin' => $this->input->post('jeniskelamin',TRUE)[$i],
                );
                $this->Pendaftaran_model->insertanggota($data2);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('front/cekstatus/'.$kode_daftar));
        }
    }
    public function cekstatus($id="") 
    {
        $id = (empty($id)) ? $this->input->post('search',TRUE) : $id ;
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Cek Status',
                'data' => $row
            );
            $this->template->load('template2','frontend/cekinfo', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('front'));
        }
    }
    public function download($id)
    {
        // $this->load->view('frontend/download', $id);
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('frontend/download',$data,true);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        } 
        redirect(site_url('front'));
    }
    public function _rules() 
    {
    $this->form_validation->set_rules('namaketua', 'Nama Ketua', 'trim|required');
    $this->form_validation->set_rules('noidentitas', 'No Identitas', 'trim|required');
    $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
    $this->form_validation->set_rules('tlp', 'No Telepon', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('tglberangkat', 'Tanggal Berangkat', 'trim|required');
    $this->form_validation->set_rules('tglpulang', 'Tanggal Pulang', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-07 01:38:10 */
/* http://harviacode.com */