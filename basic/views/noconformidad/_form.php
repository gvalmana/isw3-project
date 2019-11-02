<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;
use app\models\User;
use app\models\Sucursal;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Noconformidad */
/* @var $form yii\widgets\ActiveForm */

$dt_ElAnioPasado = date('Y-m-d', strtotime('-1 year')) ;
//print_r($dt_Hoy);die;
$list = [
    'ISO 9001' => 'ISO 9001',
    'ISO 14001' => 'ISO 14001',
    'OSHAS 18001' => 'OSHAS 18001',
    'ISO 27005' => 'ISO 27005',
    'ISO 17025' => 'ISO 17025',
    'ISO 13485' => 'ISO 13485',
    'ISO 22000' => 'ISO 22000',
];
?>

<div class="noconformidad-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data', 'type'=>ActiveForm::TYPE_HORIZONTAL]]); ?>

    <div class="container">
        <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registrar auditoría</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-1">
                        <?= $form->field($model, 'fecha_identificacion')->widget(
                            DatePicker::classname(), [
                                'attribute'=>'fecha_identificacion',
                                'language' => 'es',
                                'options' => ['readonly' => true],
                                'pluginOptions'=>[
                                    'startDate' => $dt_ElAnioPasado,
                                    'endDate' => "1d",
                                    'timePicker'=>false,
                                    'timePickerIncrement'=>30,
                                    'todayHighlight'=>true,
                                    'autoclose'=>true,
                                    'daysOfWeekDisabled'=>[0,6],
                                    'orientation'=>'bottom right',
                                    'format'=>'yyyy-mm-dd',]
                        ]); ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-1">
                        <?= $form->field($model_1, 'gravedad')->widget(Select2::classname(), [
                                'data' => ['Crítica'=>'Crítica','Mayor'=>'Mayor'],
                                'language' => 'es',
                                'options' => ['placeholder' => 'Afectación presente...',],
                        ]);?>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Normas ISO</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-ms-12 col-sm-12 col-xs-12">
                        <?= $form->field($model, 'normas_afectadas')->checkboxList($list);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalles de no conformidad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <?= $form->field($model, 'descripcion')->textarea(['rows' => 4]) ?> 
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?= $form->field($model, 'tipo_nc')->widget(Select2::classname(), [
                            'data' => ['Sistema de calidad'=>'Sistema de calidad','Calidad a los procesos'=>'Calidad a los procesos'],
                            'language' => 'es',
                            'options' => ['placeholder' => 'Tipo de Auditoría...',
                                ],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                </div>
                <div class="x_content">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?= $form->field($model_1, 'personal_detecta')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(User::find()->all(),'id','username'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Auditor ...',],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?= $form->field($model_1, 'auditor_jefe')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(User::ListarUsuariosPorRol('Auditor Jefe'),'id','username'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Jefe de Auditoría...',],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?= $form->field($model, 'id_areainterna')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Sucursal::find()->all(), 'id','nombre'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Seleccione la Sucursal ...',],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Evidencias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-ms-12 col-sm-12 col-xs-12">
                        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                            'options' => ['multiple' => false],
                            'pluginOptions' => [ 'previewFileType' => 'image',
                            'showUpload' => false ], ]); ?>     
                    </div>
                </div>
            </div>
        </div>
    
    <div class="form-group col-md-offset-10">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
