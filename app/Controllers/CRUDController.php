<?php declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\HTTP\{RedirectResponse, RequestInterface, ResponseInterface};
use Psr\Log\LoggerInterface;

class CRUDController extends Controller
{
	protected $helpers = ['html', 'form'];
	protected $session;
    protected $validation;
    protected $rules;

	public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ):void {
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		$this->session = Services::session();
		$this->validation = Services::validation();
	}

    protected function redirectWithErrorFlasData(string $named_route): RedirectResponse
    {
        $errors = $this->getFormErrors();
        $this->session->setFlashdata('erros', $errors);

        return redirect()->route($named_route);
    }

    protected function isValidationSucceed(): bool
    {
        return $this->validate($this->rules);
    }

    protected function getFormErrors(): array
    {
        return $this->validation->getErrors();
    }

    protected function getFormError(string $field): ?string
    {
        $error = null;
        $errors = $this->getFormErrors();

        if ($errors)
        {
            $error = $errors[$field] ?? null;
        }

        return $error;
    }
}
