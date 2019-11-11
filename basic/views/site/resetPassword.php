<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$this->title = 'Resetear contraseña';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>
<div class="login-box">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="login-box-msg">Por favor escriba su nueva contraseña:</p>

        <div class="login-box-body">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password',$fieldOptions1)->widget(PasswordInput::classname()); ?>
                <div class="row">
                  <div class="col-xs-4">
                      <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                  </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
</div>
