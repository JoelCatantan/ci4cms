<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\ResourceBaseController;

class UserController extends ResourceBaseController
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel;
    }

    public function index()
    {

    }

    public function new()
    {
        return view('users/form', ['is_add' => TRUE]);
    }

    public function edit($id = NULL)
    {

    }

    public function show($id = NULL)
    {

    }

    public function create()
    {
        if (!$this->validate($this->validationRules()))
        {
            return view('users/form', ['is_add' => TRUE]);
        }
        else
        {
            $this->session->setFlashdata('form_message', 'New User has been created');
            $this->index();
        }
    }

    public function update($id = NULL)
    {

    }

    public function delete($id = NULL)
    {

    }

    private function validationRules(?int $user_id = null): array
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username' . ($user_id ? ".id.$user_id" : '') . ']',
            ],
            'email_address' => [
                'label' => 'Email Address',
                'rules' => 'required|is_unique[users.email_address' . ($user_id ? ".id.$user_id" : '') . ']',
            ],
            'first_name' => [
                'label' => 'First Name',
                'rules' => 'required',
            ],
            'last_name' => [
                'label' => 'Last Name',
                'rules' => 'required',
            ],
        ];

        return $rules;
    }

    public function landingPage()
    {
        return view('users/list_of_users');
    }
}
