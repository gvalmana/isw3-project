<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resetear contraseña';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>
<div class="login-box">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="login-box-msg">Por favor escriba su correo. Enviaremos un enlace para resetear la contraseña.</p>

    <div class="login-box-body">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email',$fieldOptions1)->textInput(['autofocus' => true]) ?>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <?= Html::submitButton('Aceptar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>
                    <!-- /.col -->
                </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
