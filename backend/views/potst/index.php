<?php

	use common\models\Apple;
	use common\models\Tree;

	/* @var $treeApple Tree */
	/* @var $apples Apple */
	/* @var $applesGood array */
	/* @var $applesDrop array */
	/* @var $applesBad array */

?>

<div class="work-area">

	<div class="tree-area-outside"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;
				 height: <?= $treeApple->getTreeHeight(); ?>px;">
		<div class="tree-area">

			<?php foreach ($applesGood as $apple) {echo $apple->getDivAppleOnTree();} ?>

		</div>
	</div>

	<div class="ground-area"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;">

		<?php foreach ($applesDrop as $apple) {echo $apple->getDivDropApple();} ?>

	</div>

	<div class="trashcan-area"
		 style="margin-left: <?= $treeApple->xTreeTo + 100; ?>px;">
		<?php foreach ($applesBad as $apple) {echo $apple->getDivAppleOnTree();} ?>
	</div>


</div>
