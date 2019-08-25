<?php declare(strict_types=1);

namespace App\Controllers;

class Dashboard extends BaseController
{
	protected $helpers = ['html'];

	public function index()
	{
		return view('dashboard');
	}
}
