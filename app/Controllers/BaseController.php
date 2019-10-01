<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Config\Services;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [
		'html',
		'form',
		'common',
	];

	protected $session;

	/**
	 * Constructor.
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();

		$this->session = Services::session();
		$this->validation = Services::validation();

		Services::renderer()
			->setVar('form_message', $this->session->getFlashdata('form_message'))
			->setVar('validator', $this->validation);
	}

	protected function isRecordExist(string $value, Model $model, string $column = 'id')
	{
		$isRecordExist = boolval($model->where($column, $value)->countAllResults());

		if (!$isRecordExist)
		{
			$this->session->setFlashdata('form_message', ['message' => lang('Crud.noSuchRecord'), 'type' => 'error']);
		}

		return $isRecordExist;
	}
}
