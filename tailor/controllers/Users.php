<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля User
 */
class Users extends Controller
{
    protected $usersModel;
    function __construct()
    {
       $this->usersModel = new \models\Users(); 
    }
    
    function actionLogout()
    {
        $title = 'Вихід з аккаунту';
        unset($_SESSION['user']);
        return $this->renderMessage('warning', 'Ви вийшли з вашого аккаунту...', null,
            [
                'MainTitle' => $title,
                'PageTitle' => '',
            ]); 
    }

    function actionLogin()
    {
        $title = 'Вхід на сайт';
        if(isset($_SESSION['user']))
            return $this->renderMessage('warning', 'Ви вже увійшли на сайт...', null,
                [
                    'MainTitle' => $title,
                    'PageTitle' => '',
                ]); 
        if ($this->isPost())
        {
            $user = $this->usersModel->AuthUser($_POST['login'], $_POST['password']);
            if (!empty($user))
            {
                $_SESSION['user'] = $user;
                return $this->renderMessage('ok', 'Ви успішно увійшли на сайт!', null,
                    [
                        'MainTitle' => $title,
                        'PageTitle' => '',
                    ]);  
            } else {
                return $this->render('login', null,
                    [
                        'MainTitle' => $title,
                        'PageTitle' => '',
                        'MessageText' => 'Неправильний логін або пароль :(',
                        'MessageClass' => 'danger',
                    ]);
            }
        } else {
            return $this->render('login', null,
                [
                    'MainTitle' => $title,
                    'PageTitle' => '',
                ]);
        }
    }

    function actionRegister()
    {
        if ($this->isPost())
        {
            $result = $this->usersModel->AddUser($_POST);
            if ($result === true) {
                return $this->renderMessage('ok', 'Користувача успішно додано', null,
                    [
                        'MainTitle' => 'Реєстрація на сайті',
                        'PageTitle' => '',
                    ]);
            } else 
            {

                $message = implode('</br> ', $result);
                return $this->render('register', null,
                    [
                        'MainTitle' => 'Реєстрація на сайті',
                        'PageTitle' => '',
                        'MessageText' => $message,
                        'MessageClass' => 'danger',
                    ]);
            }
        } else {
            return $this->render('register', null,
                [
                    'MainTitle' => 'Реєстрація на сайті',
                    'PageTitle' => '',
                ]);
        }
    }
}