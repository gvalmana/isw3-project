<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NoconformidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'No conformidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noconformidad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //ESTOS SON LOS BOTONES PARA INSERTAR UNAS NUEVAS NO CONFORMIDADES?>
        <?= Html::a('Insertar no conformidad Auditoría', ['create-adt'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Insertar no conformidad Producto-Servicio', ['create-serv'], ['class' => 'btn btn-success']) ?>
    </p>    

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProviderAuditoria,
        'filterModel' => $searchAuidtorias,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //AQUI SE CREA LA COLUMNA PARA MOSTRAR EL ATRIBUTO DE LAS NO CONFORMIDADES
            //DEBES PONER UN VALUE, UN ATRIBUTE QUE SIEMPRE DEBE SER LA LLAVE FORANEA
            //Y UN LABEL PARA QUE SE VEA COMO ETIQUETA DE LA COLUMNA
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.codigo',//COMO VEN SE PONE NOMBRE DE LA RELACION.ATRIBUTO DEL MODELO RELACIONADO
                'label'=>'Código'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_identificacion',
                'label'=>'Fecha de identificación'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.tipo_nc',
                'label'=>'Tipo de no conformidad'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.normas_afectadas',
                'label'=>'Normas afectadas'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_entrada',
                'label'=>'Fecha de entrada'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_termino',
                'label'=>'Fecha de término'
            ],              
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.id_areainterna',
                'label'=>'Área interna'
            ],             
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{upate}'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php Pjax::begin(); ?>
        <?= GridView::widget([
        'dataProvider' => $dataProviderProductos,
        'filterModel' => $searchProductos,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.codigo',//COMO VEN SE PONE NOMBRE DE LA RELACION.ATRIBUTO DEL MODELO RELACIONADO
                'label'=>'Código'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_identificacion',
                'label'=>'Fecha de identificación'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.tipo_nc',
                'label'=>'Tipo de no conformidad'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.normas_afectadas',
                'label'=>'Normas afectadas'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_entrada',
                'label'=>'Fecha de entrada'
            ],
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.fecha_termino',
                'label'=>'Fecha de término'
            ],              
            [
                'attribute'=>'noconformidad',
                'value'=>'noconformidad.id_areainterna',
                'label'=>'Área interna'
            ],
            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{upate}'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
