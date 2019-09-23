<?php declare(strict_types=1);

namespace App\Controllers;

use Config\App;
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
		$search = $this->request->getGet('search');

		$select = [
			'users.id',
			'first_name',
			'last_name',
			'username',
			'users.created_at',
			'users.updated_at',
			'roles.display_name role',
		];

		$record_list = $this->user_model
			->select($select)
			->join('roles', 'roles.id = users.role_id');

		if ($search)
			{
			$record_list->orLike('first_name', $search)
				->orLike('last_name', $search)
				->orLike('username', $search)
				->orLike('users.created_at', $search)
				->orLike('users.updated_at', $search)
				->orLike('roles.display_name', $search);
		}

		return view('users/list_of_users', [
			'record_list' => $record_list->paginate(App::RECORD_LIMIT),
			'search'      => $search,
			'pager'       => $this->user_model->pager,
		]);
	}

	public function new()
	{
		return view('users/form', ['is_add' => true]);
	}

	public function edit($id = null)
	{
	}

	public function show($id = null)
	{
	}

	public function create()
	{
		if (! $this->validate($this->validationRules()))
		{
			return view('users/form', ['is_add' => true]);
		}
		else
		{
			$this->session->setFlashdata('form_message', 'New User has been created');
			$this->index();
		}
	}

	public function update($id = null)
	{
	}

	public function delete($id = null)
	{
	}

	private function validationRules(?int $user_id = null): array
	{
		$rules = [
			'username'      => [
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username' . ($user_id ? ".id.$user_id" : '') . ']',
			],
			'email_address' => [
				'label' => 'Email Address',
				'rules' => 'required|is_unique[users.email_address' . ($user_id ? ".id.$user_id" : '') . ']',
			],
			'first_name'    => [
				'label' => 'First Name',
				'rules' => 'required',
			],
			'last_name'     => [
				'label' => 'Last Name',
				'rules' => 'required',
			],
		];

		return $rules;
	}
}
