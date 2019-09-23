<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
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

		// $this->request = $request;
		// $this->response = $response;

		$this->session    = Services::session();
		$this->validation = Services::validation();
	}
}
