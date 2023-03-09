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

// считываем дерево
		$treeApple = Tree::findOne(['id' => 1]);

// считываем яблоки
		$applesGood = Apple::getGoodApples();
		$applesDrop = Apple::getDropApples();
		$applesBad = Apple::getBadApples();

// размещаем яблоки на дереве
		foreach ($applesGood as $apple) {
			if ($apple->coordX < 0 || $apple->coordY < 0) {
				$apple->setAppleOnTree($treeApple);
				$apple->save();
			}
		}

		return $this->render('index', [
				'treeApple' => $treeApple,
				'applesGood' => $applesGood,
				'applesDrop' => $applesDrop,
				'applesBad' => $applesBad,
		]);
	}


	public function actionDrop() {
		if (isset($_POST['appID'])) {
//			myDebug($_POST);
		}

		return $this->render('/potst/index', [
				'treeApple' => Tree::findOne(['id' => 1]),
				'applesGood' => Apple::getGoodApples(),
				'applesDrop' => Apple::getDropApples(),
				'applesBad' => Apple::getBadApples(),
		]);
	}
}
