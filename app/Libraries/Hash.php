<?php declare(strict_types=1);

namespace App\Libraries;

use Config\Database;

class Hash
{
    const CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const DEFAULT_PASSWORD = '123456';

    private static function randomString(int $length = 6, ?string $table = null, ?string $field = null): string
    {
        $chars = self::CHARS;
        $chars_num = strlen($chars) - 1;

        $generate = function($length) use ($chars, $chars_num) {
            $random = '';

            do {
                $random .= $chars[rand(0, $chars_num)];
                $length--;
            }
            while($length > 0);

            return $random;
        };

        do {
            $random  = $generate($length);
            $try_again = false;

            if ($table && $field)
            {
                $try_again = Database::connect()
                    ->table($table)
                    ->where($field, $random)
                    ->countAllResults() === 1;
            }
        }
        while($try_again);

        return $random;
    }

    public static function generate(?string $password = null, ?string $salt = null): array
    {
        $password = $password ?? self::DEFAULT_PASSWORD;
        $salt = $salt ?? self::randomString(6, 'users', 'salt');
        $password_hashed = password_hash("$password$salt", PASSWORD_BCRYPT);

        return ['password_hashed' => $password_hashed, 'salt' => $salt];
    }

    public static function verify(string $password, string $hashed, string $salt): bool
    {
        return password_verify("$password$salt", $hashed);
    }
}
