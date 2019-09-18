<?php declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ACL implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if (!boolval(Services::session()->auth_id)) {
            return redirect('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response) { }
}
