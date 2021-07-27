<?php 
namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{ public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

	public function index()
	{
       

		$data = [
			'title' => 'Login',
			'isi' => 'v_login',
		];
		return view('layout/v_wrapper', $data);
	}

    public function cek_login(){
        
      

        if($this->validate([ 
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])){
            //jika valid
            
            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');
            $password = $this->request->getPost('password');

            if($level == 'admin'){
                $cek_user = $this->ModelAuth->login_user($username, $password, $level);
                if($cek_user){
                    //jika data cocok
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $cek_user['level']);
                    //login
                    return redirect()->to(base_url('admin'));

                    
                }else{
                    session()->setFlashdata('pesan', 'Login gagal, Username Atau password salah');
                    return redirect()->to(base_url('auth'));
                }
            }else if($level == 'mahasiswa'){
                $cek_user = $this->ModelAuth->login_user($username, $password, $level);
                if($cek_user){
                    //jika data cocok
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $cek_user['level']);
                    //login
                    return redirect()->to(base_url('admin'));

                    
                }else{
                    session()->setFlashdata('pesan', 'Login gagal, Username Atau password salah');
                    return redirect()->to(base_url('auth'));
                }
            }else if($level == 'dosen'){
                echo 'Dosen';
            }
        }else{
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }



    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Logout sukses !!!');
        return redirect()->to(base_url('auth/index'));               
    }
	//--------------------------------------------------------------------

}
