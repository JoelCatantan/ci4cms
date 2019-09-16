<?php declare(strict_types=1);

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Libraries\Hash;

class CustomRules
{
    private $request;

    public function __construct()
    {
        $this->request = Services::request();
    }

    public function is_username_valid(string $username, string &$error = null): bool
    {
        $userModel = new UserModel();

        $count = $userModel->where('username', $username)
            ->countAllResults();

        $is_exists = $count > 0;

        if (!$is_exists) {
            $error = lang('Validation.invalid_username');
        }

        return $is_exists;
    }

    public function is_password_valid(string $password, string &$error = null): bool
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $valid = true;

        if ($username) {
            $user = $userModel->select(['password', 'salt'])
                ->where('username', $username)
                ->first();

            if ($user) {
                $valid = Hash::verify($password, $user->password, $user->salt);

                if (!$valid) {
                    $error = lang('Validation.invalid_password');
                }
            }
        }

        return $valid;
    }
}
