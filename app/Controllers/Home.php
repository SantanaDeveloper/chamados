<?php

namespace App\Controllers;

use App\Models\ChamadosModel;

class Home extends BaseController
{
	public function index()
	{
		return view('home/index');
	}

	public function cadastroAcao()
	{
		helper('form');

		$validation = \Config\Services::validation();
		$validation->setRules([
			'txtTitulo' => ['label' => 'Título', 'rules' => 'required|min_length[8]'],
			'txtDescricao' => ['label' => 'Descrição', 'rules' => 'required']
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return $this->index();
		} else {
			$criado = date('Y-m-d H:i:s');
			$idUsuario = $this->session->get('id');
			$data = [
				'id_user' => $idUsuario,
				'title' => $this->request->getPost('txtTitulo'),
				'description' => $this->request->getPost('txtDescricao'),
				'created' => $criado,
				'status' => 'Pending'
			];
			$ChamadosModel = new ChamadosModel();
			if ($ChamadosModel->save($data)) {
				$idChamado = $ChamadosModel->insertID();
				unset($data);
				$data = [
					'id_ticket' => $idChamado,
					'id_user' => $idUsuario,
					'answer' => '---',
					'status' => 'Pending',
					'updated' => $criado
				];

				$builder = $this->db->table('call_histories');
				$builder->insert($data);

				$this->session->setFlashdata('sucesso', 'Chamado cadastrado com sucesso. Código do chamado #' . $idChamado);
			} else {
				$this->session->setFlashdata('erro', 'Não foi possível realizar o cadastro.');
			}

			return redirect()->to('/home');
		}
	}

	//--------------------------------------------------------------------

}
