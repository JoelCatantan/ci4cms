<?php declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class LoggedIn implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		if (! boolval(Services::session()->auth_id))
		{
			return redirect('login')->with('redirect', uri_string());
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response)
	{
	}
}
