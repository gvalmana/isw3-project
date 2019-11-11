<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\seguridad\models\PerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute'=>'id',
                    'value'=>'usuario.username',
                ],                
                'nombre',
                'primer_apellido',
                'segundo_apellido',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{view}{update}'),
                ],
            ],
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default btn-flat', 'title'=>'Reiniciar Grid']).
                    '{toggleData}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary',
                'options'=>['class'=>'box box-primary'], 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Perfiles de usuarios',
                'before'=>'<em>* Reajusta las columnas como una hoja de cálculo desplazando los bordes.</em>',
                'headingOptions'=>['class'=>'box-header with-border'],
            ]
        ])?>
    </div>
</div>
</div>
