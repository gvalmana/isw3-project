<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\widgets\Select2;
use kartik\checkbox\CheckboxX;
use app\models\User;
use yii\helpers\ArrayHelper;
use app\models\Paises;
use app\models\Sucursal;
use app\models\cliente;

/* @var $this yii\web\View */
/* @var $model app\models\Noconformidad */
/* @var $form yii\widgets\ActiveForm */


$dt_ElAnioPasado = date('Y-m-d', strtotime('-1 year')) ;
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
    
    <?php $form = ActiveForm::begin(); ?>

        <div class="container">
            <div class="col-md-2 col-xs-2">
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    </div>
                </div>
            </div>
             <div class="col-md-8 col-xs-8 col-md-offset-2">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <?= $form->field($model_1, 'producto')->widget(Select2::classname(), [
                        'data'=>[
                            'Programas de recorridos turísticos con Circuitos fijos y combinados'=>'Programas de recorridos turísticos con Circuitos fijos y combinados',
                            'Opcionales, giras, paseos y excursiones por toda Cuba'=>'Opcionales, giras, paseos y excursiones por toda Cuba',
                            'Programas a la medida' => 'Programas a la medida',
                            'Programas Combinados para viajes de estancia' => 'Programas Combinados para viajes de estancia',
                            'Estancias en hoteles con valores añadidos' => 'Estancias en hoteles con valores añadidos',
                            'Viajes Multidestinos hacia otros países del Caribe, Centroamérica, América del Sur y Europa' => 'Viajes Multidestinos hacia otros países del Caribe, Centroamérica, América del Sur y Europa',
                            'Paquetes para la prática del Turismo Especializado (Buceo, Ecoturismo, Salud' => 'Paquetes para la prática del Turismo Especializado (Buceo, Ecoturismo, Salud',
                            'Programas de Eventos y Viajes de incentivo' => 'Programas de Eventos y Viajes de incentivo',
                            'Programas de Turismo Sociopolítico' => 'Programas de Turismo Sociopolítico',
                            'Programas de Turismo para Estudiantes' =>'Programas de Turismo para Estudiantes',
                            'Boletería aérea nacional e internacional (vuelos domésticos e internacionales)' => 'Boletería aérea nacional e internacional (vuelos domésticos e internacionales)',
                            'Viajes de bodas y lunas de miel' => 'Viajes de bodas y lunas de miel',
                            'Traslados colectivos, traslados exclusivos y privados' => 'Traslados colectivos, traslados exclusivos y privados',
                            'Alquiler y renta de autos' => 'Alquiler y renta de autos',
                            'Servicios aeronáuticos, de aviación general y de carga aérea' => 'Servicios aeronáuticos, de aviación general y de carga aérea',
                            'Productos Náuticos (Buceo, Golf)' => 'Productos Náuticos (Buceo, Golf)',
                            'Productos de sol y playa' => 'Productos de sol y playa',
                            'Servicios a la carta' => 'Servicios a la carta',
                            'Servicios médicos' => 'Servicios médicos',],
                        'language' => 'es',
                        'options' => ['placeholder' => 'Tipo de NC ...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                    </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <?= $form->field($model_1, 'procedencia')->widget(Select2::classname(), [
                        'data' => [
                            'Queja' => 'Queja',
                            'Reclamación' => 'Reclamación',
                            'Incidencia' => 'Incidencia'],
                            'language' => 'es',
                            'options' => ['placeholder' => 'Procedencia...',
                            ],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2">
                        <?= $form->field($model, 'tipo_nc')->widget(Select2::classname(), [
                        'data'=>['Ir'=>'Interna real (Ir)','Ip'=>'Interna potencial (Ip)', 'E' => 'Externa (E)'],
                        'language' => 'es',
                        'options' => ['placeholder' => 'Tipo de NC ...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="container">
             <div class="col-md-3 col-xs-3">
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?= $form->field($model, 'fecha_identificacion')->widget(DatePicker::classname(), [
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
                </div>
            </div>
            <div class="col-md-8 col-xs-12 col-md-offset-1">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalles de No Conformidad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <?= $form->field($model_1, 'pais')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Paises::find()->all(), 'Codigo','Pais'),
                                    'language' => 'es',
                                    'options' => ['placeholder' => 'Seleccione el pais ...',
                                    'onChange' => '$.post("listar?codigo=' . '"+$(this).val(), function(data) {$( "select#ncprodserv-agencia" ).html(data );});',],
                                    'pluginOptions' => [
                                    'allowClear' => true],
                                ]);?>
                            </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <?= $form->field($model_1, 'agencia')->widget(Select2::classname(), [
                                    'data'=>[],
                                    'language' => 'es',
                                    'options' => ['placeholder' => 'Seleccione la agencia ...',
                                    'onChange' => '$.post("mercado?id_mercado=' . '"+$(this).val(), function(data) {$( "select#ncprodserv-mercado" ).html(data );});',],
                                    'pluginOptions' => [
                                    'allowClear' => true,],
                                ]);?>  
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <?= $form->field($model_1, 'mercado')->widget(Select2::classname(), [
                                    'data'=>[],
                                    'language' => 'es',
                                    'options' => ['placeholder' => 'Seleccione el mercado ...'],]);?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?= $form->field($model, 'descripcion')->textarea(['rows' => 4]) ?>
                        </div>
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-ms-4 col-sm-4 col-xs-4">
                        <?= $form->field($model_1, 'nombre_cliente')->textInput(['maxlength' => true,'maxlength'=> 50]) ?>   
                    </div>
                    <div class="col-ms-4 col-sm-4 col-xs-4">
                        <?= $form->field($model_1, 'no_reserva')->textInput(['maxlength' => true, 'maxlength'=>11]) ?>
                    </div>
                    <div class="col-ms-4 col-sm-4 col-xs-4">
                        <?= $form->field($model_1, 'no_pax')->textInput(['maxlength' =>2]) ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Afectaciones</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-xs-12">
                        <?= $form->field($model_1, 'modalidad_turistica')->widget(Select2::classname(), [
                        'data'=>['Excursiones'=> [
                                    'Convencionales'=>[
                                        'Excursiones Terrestres'=> 'Excursiones Terrestres',
                                        'Excursiones Aèreas'=> 'Excursiones Aereas',
                                        'Excursiones Marìtimas'=> 'Excursiones Marìtimas'],
                                    'Opcionales'=>[
                                        'Mercado Interno'=>'Mercado Interno', 
                                        'Otras Ventas'=>'Otras Ventas']],
                                 'Receptivo'=>[
                                        'Circuitos, Programas y Recorridos'=>'Circuitos, Programas y Recorridos',
                                        'Turismo especializado'=>'Turismo especializado',
                                        'Cruceros y Megayates'=>'Cruceros y Megayates',
                                        'Eventos'=>'Eventos',
                                        'Incentivos'=>'Incentivos',
                                        'Estancia'=>'Estancia',
                                        'Transfer'=>'Transfer',
                                        'Asistencia (Comisiones x Representaciòn Exclusiva)'=>'Asistencia (Comisiones x Representaciòn Exclusiva)',
                                        'Otras Ventas'=>[
                                            'Salòn Vip'=>'Salòn Vip',
                                            'Vuelos Demorados'=>'Vuelos Demorados',
                                            'Poliza'=>'Poliza',
                                            'Comisiòn por cambio de Servicio'=>'Comisiòn por cambio de Servicio',
                                            'Tarjeta de turista'=>'Tarjeta de turista',
                                            'Boletería Lìneas Aèreas'=>'Boletería Lìneas Aèreas',
                                            'Servicio de Guìa'=>'Servicio de Guìa',
                                            'Renta de autos'=>'Renta de autos',
                                            'Viajes multidestinos'=>'Viajes multidestinos',
                                            'Tràmites Funcionarios'=>'Tràmites Funcionarios',
                                            'Boletería Bahamas'=>'Boletería Bahamas'],
                                        'Operaciòn Aèrea de Celimar'=>[
                                            'Ventas Cuba Boletos Celimar'=>'Ventas Cuba Boletos Celimar',
                                            'Comisiòn de Boletos'=>'Comisiòn de Boletos',
                                            'Hangling fee'=>'Hangling fee',
                                            'Combustible'=>'Combustible',
                                            'Seguro'=>'Seguro',
                                            'Mascotas'=>'Mascotas']
                                        ]

                                        ],
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccione la modalidad turística ...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                    </div>
                    <div class="col-md-8 col-xs-8">
                        <?= $form->field($model_1, 'costo_nocalidad')->widget(MaskMoney::classname(), [
                                    'value' => null,
                                    'options' => [
                                        'placeholder' => 'Registre costo implicado...'],
                                    'pluginOptions' => [
                                        'prefix' => '',
                                        'suffix' => 'CUC',
                                        'affixesStay' => true,
                                        'thousands' => ',',
                                        'decimal' => '.',
                                        'precision' => 2,
                                        'disabled' => true, 
                                        'allowZero' => false,
                                        'allowNegative' => false,]                                    
                                ]);
                        ?>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <?= $form->field($model, 'id_areainterna')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Sucursal::find()->all(), 'id','nombre'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Seleccione la Sucursal ...',],
                            'pluginOptions' => [
                            'allowClear' => true],
                        ]);?>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <?= $form->field($model_1, 'receptor')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(User::ListarUsuariosPorRol('Especialista Calidad'),'id','username'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Seleccione al especialista de calidad a notificar...',]
                        ]);?> 
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-4">
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
                    <div class="col-md-12 col-xs-12">
                       <?= $form->field($model, 'normas_afectadas')->checkboxList($list);?>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
    
    <?php if (!Yii::$app->request->isAjax){ ?>
    <div class="form-group">
        <?= Html::button('Cancelar!', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>    
        
    </div>
<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
