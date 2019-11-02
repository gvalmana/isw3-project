<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NcProdservSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nc-prodserv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'modalidad_turistica') ?>

    <?= $form->field($model, 'procedencia') ?>

    <?= $form->field($model, 'producto') ?>

    <?= $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'mercado') ?>

    <?php // echo $form->field($model, 'agencia') ?>

    <?php // echo $form->field($model, 'nombre_cliente') ?>

    <?php // echo $form->field($model, 'no_reserva') ?>

    <?php // echo $form->field($model, 'no_pax') ?>

    <?php // echo $form->field($model, 'costo_nocalidad') ?>

    <?php // echo $form->field($model, 'receptor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
