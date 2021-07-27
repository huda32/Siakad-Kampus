<?php namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
	public function __construct(){
		helper('form');
		$this->ModelDosen = new ModelDosen();
	}
	public function index()
	{
		$data = [
			'title' => 'ADD Dosen',
            'dosen' => $this->ModelDosen->allData(),
			'isi' => 'admin/dosen/v_index.php',
		];
		return view('layout/v_wrapper', $data);
	
	}

	public function add()
	{
		$data = [
			'title' => 'Dosen',
            'isi' => 'admin/dosen/v_add.php',
		];
		return view('layout/v_wrapper', $data);
	
	}

	public function insert()
	{
		if($this->validate([ 
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
          	'nidn' => [
                'label'  => 'NIDN',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
			'nama_dosen' => [
                'label'  => 'Nama Dosen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
			'foto_dosen' => [
                'label'  => 'foto dosen',
                'rules'  => 'uploaded[foto_dosen]|max_size[foto_dosen,2024]|mime_in[foto_dosen,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max-sixe' => 'Ukuran {field} max 2024 KB',
                    'mime_in' => 'Format {field} wajib jpg/png/gif',
                ]
            ],
        ])){
            ///jika Valid
            //mengambil file foto dr form input
            $foto = $this->request->getFile('foto_dosen');
            // merename nama file foto
            $nama_file = $foto->getRandomName();

            $data = array(
                'kode_dosen' => $this->request->getPost('kode_dosen'),
                'nidn' => $this->request->getPost('nidn'),
				'nama_dosen' => $this->request->getPost('nama_dosen'),
                'password' => $this->request->getPost('password'),
                'foto_dosen' => $nama_file,
            );
            //memindahkan file foto dari input ke direktori
            $foto->move('fotodosen', $nama_file);
            $this->ModelDosen->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('dosen'));
        }else{
            ///jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/add'));
        }
	}

    public function edit($id_dosen)
	{
		$data = [
			'title' => 'Edit Dosen',
            'dosen' => $this->ModelDosen->detailData($id_dosen),
			'isi' => 'admin/dosen/v_edit.php',
		];
		return view('layout/v_wrapper', $data);
	
	}

    public function update($id_dosen)
    {
        if($this->validate([ 
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
          	'nidn' => [
                'label'  => 'NIDN',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
			'nama_dosen' => [
                'label'  => 'Nama Dosen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!', 
                ]
            ],
			'foto_dosen' => [
                'label'  => 'foto dosen',
                'rules'  => 'max_size[foto_dosen,2024]|mime_in[foto_dosen,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                   'max-sixe' => 'Ukuran {field} max 2024 KB',
                    'mime_in' => 'Format {field} wajib jpg/png/gif',
                ]
            ],
        ])){
            ///jika Valid
            //mengambil file foto dr form input
            $foto = $this->request->getFile('foto_dosen');

            if($foto->getError() == 4){
                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
				    'nama_dosen' => $this->request->getPost('nama_dosen'),
                     'password' => $this->request->getPost('password'),
                    // 'foto' => $nama_file,
                );
                $this->ModelDosen->edit($data);
            }else{
                // menghapus foto lama
                $dosen = $this->ModelDosen->detaildata($id_dosen);
                if($dosen['foto_dosen'] != ""){
                    unlink('fotodosen/'. $dosen['foto_dosen']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();

                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
				    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                    'foto_dosen' => $nama_file,
                );
                //memindahkan file foto dari input ke direktori
                $foto->move('fotodosen', $nama_file);
                $this->ModelDosen->edit($data);
            }
            
            session()->setFlashdata('pesan', 'Data Berhasil Diganti!!');
            return redirect()->to(base_url('dosen'));
        }else{
            ///jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit/'. $id_dosen));
        }

    }


    public function delete($id_dosen)
	{
        $dosen = $this->ModelDosen->detaildata($id_dosen);
        if($dosen['foto_dosen'] != ""){
            unlink('fotodosen/'. $dosen['foto_dosen']);
        }
		$data = [
            'id_dosen' => $id_dosen,
		];

		$this->ModelDosen->delete_data($data);
		session()->setFlashdata('pesan','Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('dosen'));
	}
   
	//--------------------------------------------------------------------

}
