<?php

	use yii\helpers\Html;
	use yii\web\YiiAsset;
	use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Деревья', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="tree-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nameTree',
            'border',
            'xTreeFrom',
            'xTreeTo',
            'yTreeFrom',
            'yTreeTo',
        ],
    ]) ?>

</div>
