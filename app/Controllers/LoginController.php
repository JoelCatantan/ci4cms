<?php declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Utils\Auth;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends BaseController
{
	private $rules = [
		'username' => 'required|alpha_numeric|is_username_valid',
		'password' => 'required|alpha_numeric|is_password_valid',
	];

	private $user_model;
	private $auth;

	public function __construct()
	{
		$this->auth = new Auth;
		$this->user_model = new UserModel();
	}

	public function index()
	{
		if ($this->auth->isLoggedIn())
		{
			return redirect('/');
		}

		$this->session->keepFlashdata('redirect');

		return view('layout/' . DEFAULT_TEMPLATE . '/login', [
			'validation_errors' => $this->session->getFlashdata('login_errors'),
		]);
	}

	public function verifyCredentials(): ?RedirectResponse
	{
		$redirect = redirect($this->session->getFlashdata('redirect') ?? '/');

		if ($this->validate($this->rules))
		{
			$this->auth->initSession();
		}
		else
		{
			$this->session->keepFlashdata('redirect');
			$this->session->setFlashdata('login_errors', $this->validation->getErrors());
			$redirect = redirect()->to('login');
		}

		return $redirect;
	}

	public function logout(): RedirectResponse
	{
		$this->auth->destroySession();

		return redirect('login');
	}
}
