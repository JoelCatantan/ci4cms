<?php declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class RoleController extends BaseController
{
	private $role_model;

	public function __construct()
	{
		$this->role_model = new RoleModel();
	}

	public function index()
	{
		$record_list = $this->role_model
			->select(['id', 'display_name', 'description', 'created_at', 'updated_at'])
			->findAll();

		return view('roles/list_of_roles', ['record_list' => $record_list]);
	}

	public function delete($id = null)
	{
		if (! $this->isRecordExist($id, $this->role_model))
		{
			return $this->redirectToList();
		}

		if (! $this->role_model->delete(['id' => $id]))
		{
			$this->session->setFlashdata('form_message', [
				'message' => lang('Crud.savingFailed'),
				'type' => 'error',
			]);
			return $this->redirectToList();
		}

		$this->session->setFlashdata('form_message', [
			'message' => lang('Crud.hasBeenDeleted', [lang('Module.role')]),
			'type' => 'success',
		]);

		return $this->redirectToList();
	}

	private function redirectToList()
	{
		return redirect()->to('/roles');
	}
}
