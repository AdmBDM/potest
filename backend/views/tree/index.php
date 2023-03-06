<?php

use common\models\Tree;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Деревья';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p readonly="readonly">
        <?= Html::a('Новое дерево', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			[
				'class' => ActionColumn::className(),
				'options' => ['width' => '70px'],
				'template' => '{view} {update}',
				'urlCreator' => function ($action, Tree $model, $key, $index, $column) {
					return Url::toRoute([$action, 'id' => $model->id]);
				}
			],
            'id',
            'nameTree',
//            'border',
            'xTreeFrom',
            'xTreeTo',
            'yTreeFrom',
            'yTreeTo',
        ],
    ]); ?>


</div>
