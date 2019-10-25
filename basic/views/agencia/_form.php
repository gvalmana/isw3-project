<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Paises;
use app\models\User;
use app\models\Mercado;

/* @var $this yii\web\View */
/* @var $model app\models\Agencia */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="agencia-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        'enableClientValidation' => true,
    ]); ?>

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
                            <?= $form->field($model, 'id_pais')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Paises::find()->all(), 'Codigo','Pais'),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione el pais ...',],
                                'pluginOptions' => [
                                    'allowClear' => true
                                      ],
                                ]) ?>

                            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>
                    </div>
                     
                     <div class="col-md-4 col-md-offset-1">   
                            <?= $form->field($model, 'dir_agencia')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(User::ListarUsuariosPorRol('Director de Agencia'),'id','username'),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione el director de agencia ...',],
                                'pluginOptions' => [
                                    'allowClear' => true
                                      ],
                                ])?>

                            <?= $form->field($model, 'id_mercado')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mercado::find()->all(), 'id','nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione el mercado ...',],
                                'pluginOptions' => [
                                    'allowClear' => true
                                      ],
                                ])?>
                     </div>
                 </div></div>
                

            <div class="row">
                <div class="form-group col-md-12">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                </div></div>

    <?php ActiveForm::end(); ?>

</div>
