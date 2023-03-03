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
		$treeApple = new Tree();
		$apples = [];

//		for ($i=1; self::HOW_APPLES; $i++) {
//			$apples[] = new Apple();
//		}

		$apples = [
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
			new Apple(),
		];

		return $this->render('index', [
				'treeApple' => $treeApple,
				'apples' => $apples,
		]);
	}

}
