<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController extends CRUDController
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new User;
    }

    public function index(): string
    {
        return view('users/list_of_users', [
            'users' => $this->user_model->get(),
        ]);
    }

    public function new()
    {

    }

    public function edit(int $id)
    {

    }

    public function show(int $id)
    {

    }

    public function create()
    {

    }

    public function update(int $id)
    {

    }

    public function delete(int $id)
    {

    }
}
