<?php

namespace src\handlers;

use src\models\User;

class AuthHandler
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if ($data) {
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->photo = $data['photo'];
                $loggedUser->name = $data['name_user'];
                $loggedUser->level = $data['level'];
                $loggedUser->email = $data['email'];
                $loggedUser->password = $data['password'];

                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($password, $email)
    {

        $user = User::select()->where('email', $email)->one();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = md5(rand(0, 9999) . time());

                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                    ->execute();

                return $token;
            }
        }

        return false;
    }

    public static function emailExists($email): bool
    {
        $user = User::select()->where('email', $email)->one();

        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
