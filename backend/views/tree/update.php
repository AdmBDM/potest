<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */

$this->title = 'Update Tree: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tree-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
