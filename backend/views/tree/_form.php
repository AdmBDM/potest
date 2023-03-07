<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tree-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nameTree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'border')->textInput() ?>

    <?= $form->field($model, 'xTreeFrom')->textInput() ?>

    <?= $form->field($model, 'xTreeTo')->textInput() ?>

    <?= $form->field($model, 'yTreeFrom')->textInput() ?>

    <?= $form->field($model, 'yTreeTo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
