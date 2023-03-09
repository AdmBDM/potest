<?php

	use common\models\Apple;
	use common\models\Tree;

	/* @var $treeApple Tree */
	/* @var $apples Apple */
	/* @var $applesGood array */
	/* @var $applesDrop array */
	/* @var $applesBad array */

	if (isset($_POST['appID'])) {
		$post = $_POST;
		$apples = Apple::findOne(['id' => $post['appID']]);
// корректируем оставшийся обём
		if ($post['appRemind'] && ($post['appRemind'] > 0)) {
			$apples->reminder -= $post['appRemind'];
		}
// корректируем статус и время
		if (isset($post['appStat']) && $apples->status != $post['appStat']) {
			$apples->status = $post['appStat'];
			if ($apples->status == Apple::GOOD_APPLES) {
				$apples->dropTime = $apples->createTime + Apple::DROP_TIME;
				$apples->ruinTime = $apples->dropTime + Apple::RUIN_TIME;
			}
			if ($apples->status == Apple::DROP_APPLES) {
				$apples->dropTime = time();
				$apples->ruinTime = $apples->dropTime + Apple::RUIN_TIME;
			}
		}
		$apples->save();

// обновляем данные групп яблок
		$applesGood = Apple::getGoodApples();
		$applesDrop = Apple::getDropApples();
		$applesBad = Apple::getBadApples();

		unset($_POST);
		unset($post);
	}

?>

<div class="work-area">

	<div class="ground-area"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;">
		<div class="ground-block">
			<?php foreach ($applesDrop as $apple) {echo $apple->getDivDropApple();} ?>
		</div>
	</div>

	<div class="tree-area-outside"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;
				 height: <?= $treeApple->getTreeHeight(); ?>px;">
		<div class="tree-area">

			<?php foreach ($applesGood as $apple) {echo $apple->getDivAppleOnTree();} ?>

		</div>
	</div>

	<div class="trashcan-area"
		 style="margin-left: <?= $treeApple->xTreeTo + 100; ?>px;">
		<div class="trashcan-block">
			<?php foreach ($applesBad as $apple) {echo $apple->getDivRuinApple();} ?>
		</div>
	</div>

	<div class="form-popup" id="appleForm">
		<form action="" method="post" class="form-container">
			<input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
			<h4>Обработать яблоко <span id="appleID"></span></h4>
			<label for="appRemind"><b>Сколько % съесть?</b></label>
			<input type="number" name="appID" id="appID" value="" hidden>
			<input type="number" placeholder="от 0 до 100" name="appRemind" id="appRemind" min="0" max="100">

			<label for="appStat"><b>Режим</b></label><br>
			<input type="radio" name="appStat" id="appStat" value="0"><span>На дерево</span><br>
			<input type="radio" name="appStat" id="appStat" value="1"><span>Уронить</span><br>
			<input type="radio" name="appStat" id="appStat" value="2"><span>Испортить</span><br>

			<button type="submit" class="btn">Отправить</button>
			<button type="button" class="btn cancel" onclick="closeAppleForm()">Закрыть</button>
		</form>
	</div>

</div>
