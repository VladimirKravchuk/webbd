<?php

namespace controllers;
use core\Controller;

/**
 * Контроллер для модуля Tovar
 */
class Tovars extends Controller
{
	protected $user;
	protected $tovarModel;
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new \models\Users();
		$this->tovarModel = new \models\Tovars();
		$this->user = $this->userModel->GetCurrentUser();
	}

	/**
	 * Відображення початкової сторінки модуля
	 */
	public function actionIndex()
	{
		global $Config;
		$title = 'Товари';
		$lastTovar = $this->tovarModel->GetLastTovar($Config['TovarCount']);
		return $this->render('index', ['lastTovar'=>$lastTovar], [
			'MainTitle' => $title,
			'PageTitle' => $title,
		]);
	}

	/**
	 * Перегляд товару
	 */
	public function actionView()
	{
		$id = $_GET['id'];
		$tovar = $this->tovarModel->GetTovarById($id);
		$title = $tovar['title'];
		return $this->render('view', ['model' => $tovar],
		[
			'MainTitle' => $title,
			'PageTitle' => $title,
		]);
	}

	/**
	 * Додавання товару
	 */
	public function actionAdd()
	{
		if (empty($this->user))
		{
			$titleForbidden = 'Доступ заборонено';
			return $this->render('forbidden', null,
				[
					'MainTitle' => $titleForbidden,
					'PageTitle' => $titleForbidden,
				]); 
		}
		$title = 'Додавання товару';
		if($this->isPost())
		{ 
			$result = $this->tovarModel->AddTovar($_POST);
			if ($result['error'] === false) {
				$allowed_types = ['image/png', 'image/jpeg'];
				if (is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types)) {
					switch ($_FILES['file']['tmp_name']){
						case 'image/png':
							$extension = 'png';
							break;
						default :
							$extension = 'jpg';
					}
					$name = $result['id'].'_'.uniqid().'.'.$extension;
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/tovar/'.$name);
					$this->tovarModel->ChangePhoto($result['id'], $name);
				}
				return $this->renderMessage('ok', 'Товар успішно додано', null,
					[
						'PageTitle' => $title,
						'MainTitle' => $title
					]); 
			} else
			{
				$message = implode('<br/>', $result['messages']);
					return $this->render('form', ['model' => $_POST], [
						'PageTitle' => $title,	
						'MainTitle' => $title,
						'MessageText' => $message,
						'MessageClass' => 'danger'
				]); 
			}
		} else {
			return $this->render('form', ['model' => $_POST],
				[
					'MainTitle' => $title,
					'PageTitle' => $title
				]); 
			}
	}

	/**
	 * Редагування товару
	 */
	public function actionEdit()
	{
		$id = $_GET['id'];
		$tovar = $this->tovarModel->GetTovarById($id);
		$titleForbidden = 'Доступ заборонено';
		if (empty($this->user) || $tovar['user_id'] != $this->userModel->GetCurrentUser()['id'] && $this->userModel->GetCurrentUser()['access'] != 1)
		{
			return $this->render('forbidden', null,
				[
					'MainTitle' => $titleForbidden,
					'PageTitle' => $titleForbidden,
				]); 
		}
		$title = 'Редагування товару';
		if($this->isPost())
			{
				$result = $this->tovarModel->UpdateTovar($_POST, $id);
				if ($result === true) {
					$allowed_types = ['image/png', 'image/jpeg'];
				if (is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types)) {
					switch ($_FILES['file']['tmp_name']){
						case 'image/png':
							$extension = 'png';
							break;
						default :
							$extension = 'jpg';
					}
					$name = $id.'_'.uniqid().'.'.$extension;
					move_uploaded_file($_FILES['file']['tmp_name'], 'files/tovar/'.$name);
					$this->tovarModel->ChangePhoto($id, $name);
				}
				return $this->renderMessage('ok', 'Товар редаговано', null,
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
					]); 
				} else {
					$message = implode('<br/>', $result);
					return $this->render('form', ['model' => $tovar],
						[
							'MainTitle' => $title,
							'PageTitle' => $title,
							'MessageText' => $message,
							'MessageClass' => 'ok',
						]); 
				}
			} else {
				return $this->render('form',  ['model' => $tovar],
					[
						'MainTitle' => $title,
						'PageTitle' => $title,
					]); 
				}
	}

	/**
	 * Видалення товару
	 */
	public function actionDelete()
	{
		$title = 'Видалення товару';
		$id = $_GET['id'];
		if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
		{
			if($this->tovarModel->DeleteTovar($id))
			{
				header('Location: /tovars/');
			} else {
				return $this->renderMessage('error', 'Помилка видалення товару', null,
				[
					'MainTitle' => $title,
					'PageTitle' => $title,
				]);
			}
		} else {
			$tovar = $this->tovarModel->GetTovarById($id);
			return $this->render('delete', ['model' => $tovar],
			[
				'MainTitle' => $title,
				'PageTitle' => $title,
			]);
		}
	}

	/**
	 * Відображення списку новин
	 */
	public function actionList()
	{
		echo "actionList";
	}
}