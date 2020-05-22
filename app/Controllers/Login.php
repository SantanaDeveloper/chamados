<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		return view('login/index');
    }
    
    public function cadastro()
	{
		return view('login/cadastro');
	}

	//--------------------------------------------------------------------

}
