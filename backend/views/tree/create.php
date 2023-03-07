<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */

$this->title = 'Новое Дерево';
$this->params['breadcrumbs'][] = ['label' => 'Деревья', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
