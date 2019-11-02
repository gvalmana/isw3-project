<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
//use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Mercado */
/* @var $form yii\widgets\ActiveForm */

$jefe_mercado = ArrayHelper::map(User::ListarUsuariosPorRol('Jefe Mercado'),'id','username');
?>

<div class="mercado-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="x_panel">
              <div class="x_title">
              	 <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                      <div class="col-md-6">
                            <?= $form->field($model, 'nombre')->textInput(['style' => 'width: 75%']) ?>
                      </div>
                      <div class="col-md-6">
                            <?= $form->field($model, 'jefe_mercado')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(User::ListarUsuariosPorRol('Jefe Mercado'),'id','username'),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione el pais ...',],
                                'pluginOptions' => [
                                    'allowClear' => true],
                                ]
                                    )?>
                      </div>
               </div>
                  
                 
              <div class="row">
                <div class="form-group col-md-12">
                   <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                </div></div>
    <?php ActiveForm::end(); ?>

</div>
