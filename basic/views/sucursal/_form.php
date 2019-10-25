<?php

use yii\helpers\Html;
//use app\models\User;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use app\models\User;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Sucursal */
/* @var $form yii\widgets\ActiveForm */

$directores = ArrayHelper::map(User::find()->all(), 'id','username');
?>

<div class="sucursal-form">

    <?php $form = ActiveForm::begin([
    	'id' => 'login-form-vertical',
    	'type' => ActiveForm::TYPE_VERTICAL]);
    	?>

     <div class="x_panel">
              <div class="x_title">
              	 <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
              	 <div class="row">
    				<div class="col-md-6">
    					<?= $form->field($model, 'nombre')->textInput() ?>

    					<?= $form->field($model, 'dir_sucursal')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(User::ListarUsuariosPorRol('Director Sucursal'),'id','username'),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Seleccione al director de la sucursal...',]
    ]); ?>
    				</div>
         
     				<div class="col-md-4 col-md-offset-1">
    					<?= $form->field($model, 'direccion')->textarea(['rows' => 2]) ?>

    					<?= $form->field($model, 'provincia')->widget(Select2::classname(), [
                    'data' => [
                      'Pinar del Río'=>'Pinar del Río',
                      'Artemisa'=>'Artemisa',
                      'La Habana'=>'La Habana',
                      'Mayabeque'=>'Mayabeque',
                      'Matanzas'=>'Matanzas',
                      'Cienfuegos'=>'Cienfuegos',
                      'Villa Clara'=>'Villa Clara',
                      'Sancti Spíritus'=>'Sancti Spíritus',
                      'Ciego de Ávila'=>'Ciego de Ávila',
                      'Camagüey'=>'Camagüey',
                      'Las Tunas'=>'Las Tunas',
                      'Granma'=>'Granma',
                      'Holguín'=>'Holguín',
                      'Santiago de Cuba'=>'Santiago de Cuba',
                      'Guantánamo'=>'Guantánamo',
                      'Isla de la Juventud'=>'Isla de la Juventud',
                  ],
                    'language' => 'es',
                    'options' => ['placeholder' => 'Seleccione al director de la sucursal...',]
    ]); ?>
    				</div>

    </div></div>

    	<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
