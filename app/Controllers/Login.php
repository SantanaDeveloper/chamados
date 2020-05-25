<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
	public function index()
	{
		$data = [
			'titulo' => 'Login no sistema!',
		];
		return view('login/index', $data);
	}

	public function loginAcao()
	{
		helper('form');

		$validation = \Config\Services::validation();
		$validation->setRules([
			'txtEmail' => ['label' => 'Email', 'rules' => 'required|valid_email'],
			'txtSenha' => ['label' => 'Senha', 'rules' => 'required|min_length[6]'],
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return $this->index();
		} else {
			$senha = $this->request->getPost('txtSenha');

			//Instância da classe Login Model.
			$loginModel = new LoginModel();

			$data = $loginModel->where('email', $this->request->getPost('txtEmail'))
								->find();
			if(count($data) == 0 OR count($data) > 1){
				$this->session->setFlashdata('erro', 'Email ou Senha incorreto!');
				return redirect()->to('/login');
			}

			if(password_verify($senha, $data[0]->password)){
				$session = [
					'id' => $data[0]->id,
					'nome' => $data[0]->name,
					'email' => $data[0]->email,
					'nivel' => $data[0]->rank,
					'logged_in' => true
				];
				$this->session->set($session);
				return redirect()->to('/home');
			} else {
				$this->session->setFlashdata('erro', 'Email ou Senha incorreto!');
				return redirect()->to('/login');
			}
		}
	}

	public function cadastro()
	{
		$data = [
			'titulo' => 'Cadastre-se!'
		];
		return view('login/cadastro', $data);
	}

	public function cadastroAcao()
	{
		helper('form');

		$validation = \Config\Services::validation();
		$validation->setRules([
			'txtNome' => ['label' => 'Nome', 'rules' => 'required|min_length[5]'],
			'txtEmail' => ['label' => 'Email', 'rules' => 'required|valid_email'],
			'txtSenha' => ['label' => 'Senha', 'rules' => 'required|min_length[6]'],
		]);

		if (!$validation->withRequest($this->request)->run()) {
			$data = [
				'titulo' => 'Cadastre-se!'
			];
			return view('login/cadastro', $data);
		} else {

			$senha = password_hash(
				$this->request->getPost('txtSenha'),
				PASSWORD_DEFAULT,
				['cost' => 8]
			);

			$data = [
				'name' => $this->request->getPost('txtNome'),
				'email' => $this->request->getPost('txtEmail'),
				'password' => $senha,
				'rank' => 'Usuário'
			];

			$loginModel = new LoginModel();

			if ($loginModel->save($data)) {
				//Sucesso
				$this->session->setFlashdata('sucesso', 'Cadastro realizado com sucesso!');
			} else {
				//Falha
				$this->session->setFlashdata('erro', 'Não foi possível realizar o cadastro!');
			}

			return redirect()->to('index');
		}
	}

	public function sair()
	{
		$this->session->destroy();
		return redirect()->to('index');
	}

	//--------------------------------------------------------------------

}
