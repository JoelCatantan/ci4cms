<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Config;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Psr\Log\LoggerInterface;

class ResourceBaseController extends ResourceController
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
        $this->validation = Services::validation();
		$this->view = Services::renderer();

		$this->view->setVar('default_template', Config::DEFAULT_TEMPLATE);
		$this->view->setVar('validation', $this->validation);
    }
}
