<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('model_mahasiswa');

    }

	function index()
	{
		$data['hasil']=$this->model_mahasiswa->TampilMahasiswa();
			$this->load->view('v_mahasiswa',$data);
	}
	
	function tambah()
		{
			$this->load->view('v_tambah_mahasiswa'); 
		}
	
	function simpan_mahasiswa()
    {
        $data = array(
            'nik'=>$this->input->post('nik'),
			'nama'=>$this->input->post('nama'),
			'jk'=>$this->input->post('jk'),
            'tanggal_lhr'=>$this->input->post('tanggal_lhr'),
            'jurusan'=>$this->input->post('jurusan'),
            'umur'=>$this->input->post('umur')
        );
        $this->db->insert('mahasiswa',$data);
        redirect('mahasiswa/index');
	}

	function update($nik)
    {
        $data['ambil']=$this->model_mahasiswa->GetNik($nik);
        $this->load->view('v_update_mahasiswa',$data);
	}
	
    function simpan_update()
    {
        $data = array(
        
            'nama'=>$this->input->post('nama'),
            'jk'=>$this->input->post('jk'),
            'tanggal_lhr'=>$this->input->post('tanggal_lhr'),
            'jurusan'=>$this->input->post('jurusan'),
            'umur'=>$this->input->post('umur')
		);
		$nik = $this->input->post('nik');
		$this->db->where('nik', $nik);
        $this->db->update('mahasiswa',$data);
        redirect('mahasiswa');
	}

	function hapus($nik)
    {
        $this->model_mahasiswa->HapusMahasiswa($nik);
        redirect('mahasiswa');
    }
}
?>