<?php

	use common\models\Tree;


	/* @var $treeApple Tree */
	/* @var $apples array */


?>

<div class="work-area">

	<div class="tree-area-outside"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;
				 height: <?= $treeApple->getTreeHeight(); ?>px;">
		<div class="tree-area">

			<?php foreach ($apples as $apple) {echo $apple->getDivAppleOnTree();} ?>

		</div>
	</div>

	<div class="ground-area"
		 style="margin-left: <?= $treeApple->xTreeFrom; ?>px;
				 width: <?= $treeApple->getTreeWidth(); ?>px;">

	</div>

	<div class="trashcan-area"
		 style="margin-left: <?= $treeApple->xTreeTo + 100; ?>px;">
	</div>


</div>
