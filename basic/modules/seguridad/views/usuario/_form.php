<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'username')->textInput(['disabled'=>$model->scenario==='update']) ?>
		<?= $form->field($model, 'email') ?>
		<?= $form->field($model, 'password')->widget(PasswordInput::classname()); ?>
		<?= $form->field($model, 'retypePassword')->passwordInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Create', ['class' =>'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
