<?php declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Controllers\Auth;

class ACL implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $auth = new Auth;
        if (!$auth->isLoggedIn()) {
            return redirect('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}
