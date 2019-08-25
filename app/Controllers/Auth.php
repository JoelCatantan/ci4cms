<?php declare(strict_types=1);

namespace App\Controllers;

use App\Entities\UserEntity;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services;

class Auth extends Controller
{
    private $user_model;
    private $session;
    private $use_data;

    public function __construct()
    {
        $this->session = Services::session();
        $this->request = Services::request();
        $this->user_model = new UserModel;
    }

    public function initSession(): void
    {
        $username = $this->request->getPost('username');
        $auth = $this->user_model->where('username', $username)->select('id')->first();

        if (!$auth)
        {
            throw new \Exception('undefined_user');
        }

        $this->session->set('auth_id', $auth->id);
    }

    public function isLoggedIn(): bool
    {
        return $this->id() !== 0;
    }

    public function user(): ?UserEntity
    {
        $user = null;

        if ($this->isLoggedIn())
        {
            $user = $this->use_data;

            if (!$user)
            {
                $user = $this->use_data = $this->user_model
                ->where('id', $this->id())
                ->find();
            }

            if (!$user)
            {
                throw new \Exception('undefined_user');
            }
        }
        return $user;
    }

    public function id(): ?int
    {
        return (int) $this->session->auth_id;
    }

    public function destroySession(): void
    {
        $this->session->destroy();
    }
}
