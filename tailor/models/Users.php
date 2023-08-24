<?php

namespace models;
use core\Utils;
use \core\Model;

class Users extends Model
{
    public function Validate($formrow)
    {
        $errors = [];
        if (empty($formrow['login']))
            $errors [] = 'Поле "Логін" не може бути порожнім!';
        $user = $this->GetUserByLogin($formrow['login']);
        if (!empty($user))
            $errors [] = 'Користувач із заданим логіном вже існує';
        if (empty($formrow['password']))
            $errors [] = 'Поле "Пароль" не може бути порожнім!';
        if ($formrow['password'] != $formrow['password2'])
            $errors [] = 'Обидва паролі повинні збігатись!';
        if (empty($formrow['firstname']))
            $errors [] = 'Поле "Ім\'я" не може бути порожнім!';
        if (empty($formrow['lastname']))
            $errors [] = 'Поле "Прізвище" не може бути порожнім!';
            if (empty($formrow['adress']))
            $errors [] = 'Поле "Адреса" не може бути порожнім!';
        if(count($errors)>0)
            return $errors;
        else
            return true;
    }

    public function IsAuth()
    {
        return isset($_SESSION['user']);
    }

    public function GetCurrentUser()
    {
        if ($this->IsAuth())
            return $_SESSION['user'];
        else
            return null;
    }

    public function AddUser($userRow)
    {
        $validateResult = $this->Validate($userRow);
        if (is_array($validateResult))
            return $validateResult;
        $fields = ['login', 'password', 'firstname', 'lastname', 'adress'];
        $userRowFiltered = Utils::ArrayFilter($userRow, $fields);
        $userRowFiltered['password'] = md5($userRowFiltered['password']);
        \core\Core::getInstance()->getDB()->insert('users', $userRowFiltered);
        return true;
    }

    public function AuthUser($login, $password)
    {
        $password = md5($password);
        $users = \core\Core::getInstance()->getDB()->select('users', "*",
        [
            'login' => $login,
            'password' => $password,
        ]);
        if (count($users) == 1)
        {
            $user = $users[0];
            return $user;
        } else
            return false;
    }

    public function GetUserByLogin($login)
    {
        $rows = \core\Core::getInstance()->getDB()->select('users', '*', ['login'=> $login]);
        if (count($rows) > 0)
            return $rows[0];
        else
            return null;
    }
    public function GetUserById($id)
    {
        $user = \core\Core::getInstance()->getDB()->select('users', '*', ['id'=>$id]);
        if (!empty($user))
            return $user[0];
        else
            return null; 
    }
}