<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Agencia;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
$agencias = ArrayHelper::map(Agencia::find()->all(),'id','nombre');
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

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
                                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    
                                <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'agencia')->dropdownList($agencias, ['prompt'=>'Seleccione la agencia...']) ?>

                                <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>            
                           </div>
    
                        <div class="col-md-4 col-md-offset-1">
                            <?= $form->field($model, 'dni')->textInput(['style' => 'width: 70%']) ?>

                            <?= $form->field($model, 'numero_pasaporte')->textInput(['style' => 'width: 70%']) ?>

                            <?= $form->field($model, 'telefono')->textInput(['style' => 'width: 70%']) ?>

                            <?= $form->field($model, 'numero_reserva')->textInput(['style' => 'width: 70%']) ?> 
                        </div>
                    </div></div>
    
                <div class="row">
                <div class="form-group col-md-12">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                </div>        
                </div>   

    <?php ActiveForm::end(); ?>

</div>
