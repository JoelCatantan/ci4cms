<?php
namespace App\Controllers;

use App\Config;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;

class MyController extends Controller
{
	protected $helpers = ['html', 'form'];
	protected $request;
	protected $session;
	protected $view;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->session = Services::session();
		$this->request = Services::request();
		$this->view = Services::renderer();
		$this->view->setVar('default_template', Config::DEFAULT_TEMPLATE);
	}
}
