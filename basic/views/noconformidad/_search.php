<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoconformidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noconformidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'fecha_identificacion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'tipo_nc') ?>

    <?php // echo $form->field($model, 'normas_afectadas') ?>

    <?php // echo $form->field($model, 'fecha_entrada') ?>

    <?php // echo $form->field($model, 'fecha_termino') ?>

    <?php // echo $form->field($model, 'evidencias') ?>

    <?php // echo $form->field($model, 'id_areainterna') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
