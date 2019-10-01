<?php declare(strict_types=1);

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Libraries\Hash;

class CustomValidationRules
{
    private $request;

    public function __construct()
    {
        $this->request = Services::request();
    }

    public function is_username_valid(string $username, string &$error = null): bool
    {
        $userModel = new UserModel();
        $is_exists = $userModel->where('username', $username)->countAllResults() > 0;

        if (!$is_exists) {
            $error = lang('Validation.invalidUsername');
        }

        return $is_exists;
    }

    public function is_password_valid(string $password, string &$error = null): bool
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $valid = true;

        if ($username)
        {
            $user = $userModel->select(['password', 'salt'])
                ->where('username', $username)
                ->first();

            if ($user)
            {
                $valid = Hash::verify($password, $user->password, $user->salt);

                if (!$valid)
                {
                    $error = lang('Validation.invalidPassword');
                }
            }
        }

        return $valid;
    }
}
