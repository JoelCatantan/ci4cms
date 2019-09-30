<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Psr\Log\LoggerInterface;

class ResourceBaseController extends ResourceController
{
	protected $helpers = [
		'html',
		'form',
		'common',
	];

	// protected $request;
	// protected $response;
	protected $session;
	protected $view;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->session = Services::session();

		$view = Services::renderer();
		$view->setVar('validation', Services::validation());
		$view->setVar('form_message', $this->session->getFlashdata('form_message'));
	}

	protected function isRecordExist(string $value, Model $model, string $column = 'id')
	{
		$isRecordExist = boolval($model->where($column, $value)->countAllResults());

		if (! $isRecordExist)
		{
			$this->session->setFlashdata('form_message', ['message' => lang('Crud.noSuchRecord'), 'type' => 'error']);
		}

		return $isRecordExist;
	}
}
