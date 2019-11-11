<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs del sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'exportConfig'=>[
                GridView::PDF=>true,
                GridView::EXCEL=>true,
            ],
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-flat btn-default', 'title'=>'Reiniciar Grid']).
                    '{toggleData}'
                ],
            ],
            'panel' => [
                'type' => 'primary',
                'options'=>['class'=>'box box-primary'],
                'heading' => '<i class="glyphicon glyphicon-list"></i> Logs del sistema',
                'headingOptions'=>['class'=>'box-header with-border'],
                'before'=>'<em>* Reajusta las columnas como una hoja de cálculo desplazando los bordes.</em>',
            ],
            'rowOptions'=>function($model,$key,$index){
                if ($model->level==1){
                    return ['class'=>'danger'];
                }
            },
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{view}'),
                ],
                'level',
                'category',
                'log_time:date',
                //'prefix:ntext',
                //'message:ntext',
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
