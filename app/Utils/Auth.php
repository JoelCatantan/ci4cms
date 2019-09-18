<?php declare(strict_types=1);

namespace App\Utils;

use App\Entities\User;
use App\Models\UserModel;
use Config\Services;

class Auth
{
    private $user_model;
    private $session;

    private const USER_DATA_SESSION_KEY = '_user_data';
    private const SESSION_AUTH_ID_KEY = 'auth_id';

    public function __construct()
    {
        $this->user_model = new UserModel;
        $this->session = Services::session();
        $this->request = Services::request();
    }

    public function initSession(): void
    {
        $username = $this->request->getPost('username');

        if (!$username)
        {
            throw new \Exception('missing_initial_user_data');
        }

        $user = $this->user_model
            ->where('username', $username)
            ->first();

        if (!$user)
        {
            throw new \Exception('undefined_user');
        }

        $this->session->set(self::SESSION_AUTH_ID_KEY, $user->id);
        $this->session->setFlashdata(self::USER_DATA_SESSION_KEY, $user);
    }

    public function isLoggedIn(): bool
    {
        return boolval($this->id());
    }

    public function userData(): ?User
    {
        $user_data = $this->session->getFlashdata(self::USER_DATA_SESSION_KEY);

        if (!$user_data)
        {
            $user_data = $this->user_model->find($this->session->get(self::SESSION_AUTH_ID_KEY));

            if (!$user_data)
            {
                throw new \Exception('user_data_not_initial_yet');
            }
            else
            {
                $this->session->setFlashdata(self::USER_DATA_SESSION_KEY, $user_data);
            }
        }

        return $user_data;
    }

    public function id(): ?int
    {
        return $this->session->auth_id;
    }

    public function destroySession(): void
    {
        $this->session->destroy();
    }
}
