<?php namespace App\Controllers;
use App\Models\ModelDosen;
use App\Models\ModelKelas;
use App\Models\ModelProdi;


class Kelas extends BaseController
{
	public function __construct()
	{
		$this->ModelKelas = new ModelKelas();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Rombongan Kelas',
			'kelas' => $this->ModelKelas->allData(),
			'dosen' => $this->ModelDosen->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'isi' => 'admin/kelas/v_kelas',
		];
		return view('layout/v_wrapper', $data);
	}

	public function add(){
		if($this->validate([ 
            'nama_kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
			],
			'id_prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
			],
			'id_dosen' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
					'required' => '{field} Wajib Diisi !!!',
					// 'is_unique' => '{field} Sudah Ada Input Kode Lain !!!'
                ]
			],
			'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
			],
        ])){
			  //jika valid
			  $data = [
				'nama_kelas' => $this->request->getPost('nama_kelas'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'id_dosen' => $this->request->getPost('id_dosen'),
				'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
            ];
    
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan','Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('kelas'));
		}else{
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
		}
	}

	public function delete($id_kelas){
		$data = [
			'id_kelas' => $id_kelas,
		];

		$this->ModelKelas->delete_data($data);
		session()->setFlashdata('pesan','Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('kelas'));
	}

	public function rincian_kelas($id_kelas){
		$kelas = $this->ModelKelas->detail($id_kelas);
		$data = [
			'title' => 'Rombongan Kelas : '.$kelas['nama_kelas'] ,
			'kelas' =>	$kelas,
			'mhs' => $this->ModelKelas->mahasiswa($id_kelas),
			'jml' => $this->ModelKelas->jml_mhs($id_kelas),
			'mhs_tpk' => $this->ModelKelas->mhs_tdk_ada_kelas(),
			'isi' => 'admin/kelas/v_rincian_kelas',
		];
		return view('layout/v_wrapper', $data);
	}


	public function add_anggota_kelas($id_mhs, $id_kelas){
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => $id_kelas
		];

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan','Mahasiswa Berhasil Ditambahkan Ke Kelas !!!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));

	}
	//--------------------------------------------------------------------
	public function remove_anggota_kelas($id_mhs, $id_kelas){
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => null
		];

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan','Mahasiswa Berhasil Dihapus dari kelas !!!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));

	}
}