<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля Chat
 */
class Chat extends Controller
{
	protected $user;
	protected $tovarModel;
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new \models\Users();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		$title = 'Чат';
        return $this->render('index', [
			'MainTitle' => $title,
			'PageTitle' => null,
		]);

	}
};