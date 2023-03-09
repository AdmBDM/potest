<?php

	use yii\helpers\Html;
	use yii\web\YiiAsset;
	use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Apple $model */

$this->title = 'Яблоко' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Яблоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

YiiAsset::register($this);
?>
<div class="apple-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tree_id',
			[
				'attribute' => 'createTime',
				'format' => ['date', 'php:d.m.Y H:i:s'],
			],
			[
				'attribute' => 'dropTime',
				'format' => ['date', 'php:d.m.Y H:i:s'],
			],
			[
				'attribute' => 'ruinTime',
				'format' => ['date', 'php:d.m.Y H:i:s'],
			],
            'coordX',
            'coordY',
            'radius',
            'color',
            'reminder',
            'status',
        ],
    ]) ?>

</div>
