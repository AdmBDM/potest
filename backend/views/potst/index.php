<?php

	use common\models\Tree;


	/* @var $treeApple Tree */
	/* @var $apples array */


?>

<div class="work-area">

	<div class="tree-area" style="width: <?= $treeApple->getTreeWidth(); ?>px; height: <?= $treeApple->getTreeHeight(); ?>px;">

		<div class="apple-area">
		</div>
		<?php foreach ($apples as $apple) {echo $apple->getApple();} ?>

	</div>

</div>
