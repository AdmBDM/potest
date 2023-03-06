<?php

namespace backend\controllers;

use common\models\Apple;
use common\models\Tree;
use yii\web\Controller;
use yii\web\ErrorAction;

class PotstController extends Controller
{
	const HOW_APPLES = 7;
	/**
	 * @return array[]
	 */
	public function actions()
	{
		return [
				'error' => [
						'class' => ErrorAction::class,
				],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{

// "создаём" яблоню
//		$treeApple = new Tree();
		$treeApple = Tree::findOne(['id' => 1]);

// "создаём" яблоки
		$apples = [
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
		];

// размещаем яблоки на яблоне
		foreach ($apples as $apple) {
			$apple->setAppleOnTree($treeApple);
		}

		return $this->render('index', [
				'treeApple' => $treeApple,
				'apples' => $apples,
		]);
	}

}
