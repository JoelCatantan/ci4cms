<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use App\Entities\User;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends CrudController
{
    protected $rules = [
        'username' => 'required|alpha_numeric|is_username_valid',
        'password' => 'required|alpha_numeric|is_password_valid',
    ];

    private $user_model;
    private $auth;

    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->auth = new Auth;
    }

	public function index()
	{
        if ($this->auth->isLoggedIn())
        {
            return redirect('/');
        }

        return view('layout/login', [
            'validation_errors' => $this->session->getFlashdata('erros'),
        ]);
    }

    public function varifyCredentials(): ?RedirectResponse
    {
        $redirect = redirect('/');

        if ($this->isValidationSucceed())
        {
            $this->auth->initSession();
        }
        else
        {
            $redirect = $this->redirectWithErrorFlasData('login');
        }

        return $redirect;
    }

    public function logout(): RedirectResponse
    {
        $this->auth->destroySession();

        return redirect('login');
    }
}
