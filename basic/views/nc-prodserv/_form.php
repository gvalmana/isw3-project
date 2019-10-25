<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NcProdserv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nc-prodserv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'modalidad_turistica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'procedencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mercado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agencia')->textInput() ?>

    <?= $form->field($model, 'nombre_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_reserva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_pax')->textInput() ?>

    <?= $form->field($model, 'costo_nocalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receptor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
