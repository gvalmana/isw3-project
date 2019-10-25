<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pais') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'dir_agencia') ?>

    <?php // echo $form->field($model, 'id_mercado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
