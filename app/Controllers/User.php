<?php namespace App\Controllers;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct(){
		helper('form');
        $this->ModelUser = new ModelUser();
       
	}

	public function index()
	{
		$data = [
			'title' => 'User',
			'user' => $this->ModelUser->allData(),
			'isi' => 'admin/v_user',
		];
		return view('layout/v_wrapper', $data);
    }
    
    public function add()
    {
        if($this->validate([ 
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            // |is_unique[tbl_user.username]'
            // 'is_unique' => '{field} Sudah Ada, Input {field} Lain !!!',
			'username' => [
                'label'  => 'Username',
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
			'foto' => [
                'label'  => 'foto',
                'rules'  => 'uploaded[foto]|max_size[foto,2024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max-sixe' => 'Ukuran {field} max 2024 KB',
                    'mime_in' => 'Format {field} wajib jpg/png/gif',
                ]
            ],
        ])){
            ///jika Valid
            //mengambil file foto dr form input
            $foto = $this->request->getFile('foto');
            // merename nama file foto
            $nama_file = $foto->getRandomName();

            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            //memindahkan file foto dari input ke direktori
            $foto->move('foto', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('user'));
        }else{
            ///jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }

    }

    public function edit($id_user)
    {
        if($this->validate([ 
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            // |is_unique[tbl_user.username]'
            // 'is_unique' => '{field} Sudah Ada, Input {field} Lain !!!',
			'username' => [
                'label'  => 'Username',
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
			'foto' => [
                'label'  => 'foto',
                'rules'  => 'max_size[foto,2024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    // 'uploaded' => '{field} Wajib Diisi !!!',
                    'max-sixe' => 'Ukuran {field} max 2024 KB',
                    'mime_in' => 'Format {field} wajib jpg/png/gif',
                ]
            ],
        ])){
            ///jika Valid
            //mengambil file foto dr form input
            $foto = $this->request->getFile('foto');

            if($foto->getError() == 4){
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    // 'foto' => $nama_file,
                );
                $this->ModelUser->edit($data);
            }else{
                // menghapus foto lama
                $user = $this->ModelUser->detail_data($id_user);
                if($user['foto'] != ""){
                    unlink('foto/'. $user['foto']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();

                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                //memindahkan file foto dari input ke direktori
                $foto->move('foto', $nama_file);
                $this->ModelUser->edit($data);
            }
            
            session()->setFlashdata('pesan', 'Data Berhasil Diganti!!');
            return redirect()->to(base_url('user'));
        }else{
            ///jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }

    }
    public function delete($id_user)
	{
        $user = $this->ModelUser->detail_data($id_user);
        if($user['foto'] != ""){
            unlink('foto/'. $user['foto']);
        }
		$data = [
			'id_user' => $id_user,
		];

		$this->ModelUser->delete_data($data);
		session()->setFlashdata('pesan','Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('user'));
	}
   

}