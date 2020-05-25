<?php

namespace App\Controllers;

use App\Models\ChamadosModel;

class Chamados extends BaseController
{
	public function index()
	{
		$id = $this->session->get('id');
		$sql = "SELECT * FROM `tickets` ";
		$where = '';

		//FILTRA TITULO E STATUS
		if (!empty($_GET['txtTitulo']) && !empty($_GET['txtStatus'])) {

			$where .= " WHERE `title` LIKE '%" . $this->db->escapeLikeString($_GET['txtTitulo']) . "%' ESCAPE '!' ";
			$where .= " AND `status` LIKE '%" . $this->db->escapeLikeString($_GET['txtStatus']) . "%' ESCAPE '!'";
		}
		//FILTRA SOMENTE TITULO
		else if (!empty($_GET['txtTitulo'])) {

			$where .= " WHERE `title` LIKE '%" . $this->db->escapeLikeString($_GET['txtTitulo']) . "%' ESCAPE '!' ";
		}
		//FILTRA SOMENTE STATUS
		else if (!empty($_GET['txtStatus'])) {

			$where .= " WHERE `status` LIKE '%" . $this->db->escapeLikeString($_GET['txtStatus']) . "%' ESCAPE '!' ";
		}

		//VALIDAÇÃO PRA RESGATAR SOMENTE OS CHAMADOS DO USUARIO
		if ($this->session->get('nivel') == 'Usuário') {
			$where = ($where == '' ? " WHERE `id_user` = {$id}" : $where . " AND `id_user` = {$id}");
		}

		$sql .= $where . " ORDER BY `status` ASC, `created` DESC ";

		$query = $this->db->query($sql);

		$data = [
			'titulo' => 'Listagem de Chamados',
			'chamados' => $query->getResult()
		];

		return view('chamados/index', $data);
	}

	public function responder($id)
	{

		$ChamadosModel = new ChamadosModel();
		$idUsuario = $this->session->get('id');
		$nivelUsuario = $this->session->get('nivel');

		if ($nivelUsuario == 'Usuário') {
			$chamado = $ChamadosModel->select('tickets.id, tickets.title, tickets.description, tickets.created, tickets.`status`, users.name')
				->join('users', ' users.id = tickets.id_user')
				->where('tickets.id', $id)
				->where('tickets.id_user', $idUsuario)
				->find();
		} else {
			$chamado = $ChamadosModel->select('tickets.id, tickets.title, tickets.description, tickets.created, tickets.`status`, users.name')
				->join('users', ' users.id = tickets.id_user')
				->where('tickets.id', $id)
				->find();
		}

		if (count($chamado) == 0) {
			$this->session->setFlashdata('erro', 'Acesso de forma inadequada.');
			return redirect()->to('/chamados');
		}

		$historico = $ChamadosModel->select('call_histories.`status`, call_histories.updated, call_histories.answer, users.name')
			->join('call_histories', 'call_histories.id_ticket = tickets.id')
			->join('users', 'users.id = call_histories.id_user')
			->where('tickets.id', $id)
			->orderBy('call_histories.updated', 'DESC')
			->findAll();

		$data = [
			'titulo' => 'Responder Chamado',
			'chamado' => $chamado,
			'historico' => $historico
		];
		return view('chamados/responder', $data);
	}

	public function responderAcao($id)
	{
		helper('form');

		$validation = \Config\Services::validation();
		$validation->setRules([
			'txtResposta' => ['label' => 'Resposta', 'rules' => 'required'],
			'txtStatus' => ['label' => 'Status', 'rules' => 'required']
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return $this->responder($id);
		} else {
			$data = [
				'id_ticket' => $id,
				'id_user' => $this->session->get('id'),
				'answer' => $this->request->getPost('txtResposta'),
				'status' => $this->request->getPost('txtStatus'),
				'updated' => date('Y-m-d H:i:s')
			];

			$builder = $this->db->table('call_histories');
			if ($builder->insert($data)) {
				$ChamadosModel = new ChamadosModel();
				$ChamadosModel->save([
					'id' => $id,
					'status' => $this->request->getPost('txtStatus'),
				]);
				$this->session->setFlashdata('sucesso', 'Resposta cadastrada com sucesso.');
			} else {
				$this->session->setFlashdata('erro', 'Não foi possível cadastrar sua resposta.');
			}

			return redirect()->to('/chamados/responder/' . $id);
		}
	}

	public function excluir($id)
	{
		$ChamadosModel = new ChamadosModel();
		$idUsuario = $this->session->get('id');
		$nivelUsuario = $this->session->get('nivel');

		if ($nivelUsuario == 'Usuário') {
			$chamado = $ChamadosModel->select('tickets.id')
				->join('users', ' users.id = tickets.id_user')
				->where('tickets.id', $id)
				->where('tickets.id_user', $idUsuario)
				->find();
		} else {
			$chamado = $ChamadosModel->select('tickets.id')
				->join('users', ' users.id = tickets.id_user')
				->where('tickets.id', $id)
				->find();
		}

		if (count($chamado) == 0) {
			$this->session->setFlashdata('erro', 'Acesso de forma inadequada.');
			return redirect()->to('/chamados');
		}

		if($ChamadosModel->delete($id)){
			$builder = $this->db->table('call_histories');
			$builder->where('id_ticket', $id)->delete();

			$this->session->setFlashdata('sucesso', 'Excluído com sucesso.');
		} else {
			$this->session->setFlashdata('erro', 'Não foi possivel excluir o chamado.');
		}

		return redirect()->to('/chamados');
	}

	//--------------------------------------------------------------------

}
