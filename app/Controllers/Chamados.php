<?php namespace App\Controllers;

class Chamados extends BaseController
{
	public function index()
	{
		return view('chamados/index');
    }
    
    public function responder()
	{
		return view('chamados/responder');
	}

	//--------------------------------------------------------------------

}
