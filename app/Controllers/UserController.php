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
        return view('users/list_of_users', [
            'users' => $this->user_model->findAll(),
        ]);
    }

    public function new()
    {

    }

    public function edit($id = NULL)
    {

    }

    public function show($id = NULL)
    {

    }

    public function create()
    {

    }

    public function update($id = NULL)
    {

    }

    public function delete($id = NULL)
    {

    }
}
