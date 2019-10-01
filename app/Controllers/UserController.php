<?php declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\ResourceBaseController;
use App\Models\RoleModel;
use App\Models\UserModel;
use Config\App;

class UserController extends BaseController
{
	private $user_model;
	private $role_model;

	public function __construct()
	{
		$this->user_model = new UserModel;
		$this->role_model = new RoleModel();
	}

	public function index()
	{
		$search = $this->request->getGet('search');
		$curr_page = $this->request->getGet('page') ?? 1;

		$select = [
			'users.id',
			'first_name',
			'last_name',
			'username',
			'users.created_at',
			'users.updated_at',
			'roles.display_name user_role',
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
			'search' => $search,
			'pager' => $this->user_model->pager,
			'record_offset' => ($curr_page - 1) * App::RECORD_LIMIT,
		]);
	}

	public function new()
	{
		return view('users/form', [
			'is_add' => true,
			'opt_roles' => $this->role_model->getDropdownOptions(),
		]);
	}

	public function edit($id = null)
	{
		if (! $this->isRecordExist($id, $this->user_model))
		{
			return $this->redirectToList();
		}

		return view('users/form', [
			'edit_record_id' => $id,
			'user' => $this->user_model->find($id),
			'opt_roles' => $this->role_model->getDropdownOptions(),
		]);
	}

	public function show($id = null)
	{
		if (! $this->isRecordExist($id, $this->user_model))
		{
			return $this->redirectToList();
		}

		return view('users/detail', [
			'user' => $this->user_model->find($id),
			'opt_roles' => $this->role_model->getDropdownOptions(),
		]);
	}

	public function create()
	{
		if (! $this->validate($this->validationRules()))
		{
			return $this->new();
		}

		$user_model = $this->user_model;

		$user_model->transStart();

		// save record
		$post = $this->request->getPost();
		$user_model->save($post);

		// set default password
		$insert_id = $user_model->getInsertID();
		$user = $user_model->find($insert_id);

		$user->setDefaultPassword();

		$user_model->protect(false);
		$user_model->save($user);
		$user_model->protect(true);

		$user_model->transComplete();

		if ($user_model->transStatus())
		{
			$this->session->setFlashdata('form_message', [
				'message' => lang('Crud.newRecordSave', [lang('Module.user')]),
				'type' => 'success',
			]);
			return $this->redirectToList();
		}
		else
		{
			$this->session->setFlashdata('form_message', ['message' => lang('Crud.savingFailed'), 'type' => 'error']);
			return redirect()->to('/users/new');
		}
	}

	public function update($id = null)
	{
		if (! $this->isRecordExist($id, $this->user_model))
		{
			return $this->redirectToList();
		}

		if (! $this->validate($this->validationRules((int) $id)))
		{
			$this->edit($id);
		}

		if ($this->user_model->save($this->request->getPost() + ['id' => $id]))
		{
			$this->session->setFlashdata('form_message', [
				'message' => lang('Crud.recordUpdated', [lang('Module.user')]),
				'type' => 'success',
			]);
			return $this->redirectToList();
		}
		else
		{
			$this->session->setFlashdata('form_message', ['message' => lang('Crud.savingFailed'), 'type' => 'error']);
			return redirect()->to('/users/new');
		}
	}

	public function delete($id = null)
	{
		if (! $this->isRecordExist($id, $this->user_model))
		{
			return $this->redirectToList();
		}

		if (! $this->user_model->delete(['id' => $id]))
		{
			$this->session->setFlashdata('form_message', [
				'message' => lang('Crud.savingFailed'),
				'type' => 'error',
			]);
			return $this->redirectToList();
		}

		$this->session->setFlashdata('form_message', [
			'message' => lang('Crud.hasBeenDeleted', [lang('Module.user')]),
			'type' => 'success',
		]);
		return $this->redirectToList();
	}

	private function redirectToList()
	{
		return redirect()->to('/users');
	}

	private function validationRules(?int $user_id = null): array
	{
		$rules = [
			'username' => [
				'label' => lang('Label.username'),
				'rules' => 'required|is_unique[users.username' . ($user_id ? ",id,$user_id" : '') . ']',
			],
			'email_address' => [
				'label' => lang('Label.emailAddress'),
				'rules' => 'required|valid_email|' .
					'is_unique[users.email_address' . ($user_id ? ",id,$user_id" : '') . ']',
			],
			'first_name' => [
				'label' => lang('Label.firstName'),
				'rules' => 'required',
			],
			'last_name' => [
				'label' => lang('Label.lastName'),
				'rules' => 'required',
			],
			'role_id' => [
				'label' => lang('Label.role'),
				'rules' => 'required',
			],
		];

		return $rules;
	}
}
