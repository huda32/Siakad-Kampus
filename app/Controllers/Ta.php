<?php namespace App\Controllers;
use App\Models\ModelTa;
class Ta extends BaseController
{	
	public function __construct(){
        helper('form');
		   $this->ModelTa = new ModelTa();
		  
    }
	public function index()
	{
		$data = [
			'title' => 'Tahun Akademik',
			'ta' => $this->ModelTa->allData(),
			'isi' => 'admin/v_ta',
		];
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = [
			'ta' => $this->request->getPost('ta'),
			'semester' => $this->request->getPost('semester'),
		];

		$this->ModelTa->add($data);
		session()->setFlashdata('pesan','Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('ta'));
	}

	public function edit($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
			'ta' => $this->request->getPost('ta'),
			'semester' => $this->request->getPost('semester'),
		];

		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan','Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('ta'));
	}
	public function delete($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
		];

		$this->ModelTa->delete_data($data);
		session()->setFlashdata('pesan','Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('ta'));
	}

	//--------------------------------------------------------------------


	public function setting()
	{
		$data = [
			'title' => 'Tahun Akademik',
			'ta' => $this->ModelTa->allData(),
			'isi' => 'admin/v_set_ta',
		];
		return view('layout/v_wrapper', $data);
	}

	public function set_status_ta($id_ta){

		//reset Status Ta 
		$this->ModelTa->reset_status_ta();
        $data = [
            'id_ta' => $id_ta,
            'status' => 1
        ];
            $this->ModelTa->edit($data);
			session()->setFlashdata('pesan','Status Tahun Akademik Berhasil Di ganti');
			return redirect()->to(base_url('ta/setting'));
    }



}
