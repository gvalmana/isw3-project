<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NcAudit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nc-audit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'gravedad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personal_detecta')->textInput() ?>

    <?= $form->field($model, 'auditor_jefe')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
