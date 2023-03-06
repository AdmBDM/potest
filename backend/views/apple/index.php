<?php

use common\models\Apple;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Яблоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новое яблоко', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			[
				'class' => ActionColumn::className(),
				'header' => 'Действия',
				'options' => ['width' => '200px'],
				'template' => '{view} {update} {drop} {eat}',
				'buttons' => [
					'drop' => function ($url, $model, $key) {
						$icon = Html::tag('span', 'Уронить');
						return $model->status === 0 ? Html::a($icon, $url) : '';
					},
					'eat' => function ($url, $model, $key) {
						$icon = Html::tag('span', 'Съесть');
						return $model->status === 0 ? Html::a($icon, $url) : '';
					},
				],
				'urlCreator' => function ($action, Apple $model, $key, $index, $column) {
					return Url::toRoute([$action, 'id' => $model->id]);
				}
			],
//            'id',
//            'tree_id',
//            'createTime',
			[
				'attribute' => 'createTime',
				'format' => ['date', 'php:d.m.Y H:i:s'],
				'options' => ['width' => '200px'],
			],
//            'dropTime',
			[
				'attribute' => 'dropTime',
				'format' => ['date', 'php:d.m.Y H:i:s'],
				'options' => ['width' => '200px'],
			],
//            'coordX',
//            'coordY',
//            'radius',
			[
				'attribute' => 'radius',
				'options' => ['width' => '100px'],
			],
//            'color',
//            'reminder',
			[
				'attribute' => 'reminder',
				'options' => ['width' => '100px'],
			],
//            'status',
			[
				'label' => 'Статус',
				'options' => ['width' => '170px'],
				'value' => function($model) {
					if ($model->reminder === 0) return 'съедено';
					if ($model->status === 1) return 'упало на землю';
					if ($model->status === 2) return 'гнилое';
					return 'висит на дереве';
				},
			],
// пустая колонка для выравнивания
			[
				'label' => '',
				'format' => 'text',
				'contentOptions' => ['style'=>'white-space: normal;'],
				'value' => function() {return '';},
			],
        ],
    ]); ?>


</div>
