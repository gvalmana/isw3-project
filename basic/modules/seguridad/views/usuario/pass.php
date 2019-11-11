<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = 'Cambiar contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form col-md-6">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'old_pass')->passwordInput() ?>
        <?= $form->field($model, 'password')->widget(PasswordInput::classname()); ?>
        <?= $form->field($model, 'retypePassword')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Cambiar', ['class' => 'btn btn-flat btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
</div>