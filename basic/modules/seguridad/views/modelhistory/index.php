<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
use app\modules\seguridad\models\Usuario;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModelhistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auditoría del sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="box-body table-responsive no-padding">
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
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
            'rowOptions'=>function($model,$key,$index){
                if ($model->type==2){
                    return ['class'=>'danger'];
                }
            },
            'panel' => [
                'type' => 'primary',
                'options'=>['class'=>'box box-primary'],
                'heading' => '<i class="glyphicon glyphicon-list"></i> Auditorias del sistema',
                'headingOptions'=>['class'=>'box-header with-border'],
                'before'=>'<em>* Reajusta las columnas como una hoja de cálculo desplazando los bordes.</em>',
            ],
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{view}'),
                ],
                'date',
                [
                    'attribute'=>'user_id',
                    'value' => function ($model, $key, $index, $widget) {
                        return Usuario::findIdentity($model->user_id)->username;
                    }
                ],
                [
                    'attribute'=>'type',
                    'value' => function ($model, $key, $index, $widget) {
                        switch ($model->type) {
                            case 0:
                                return 'Creado';
                                break;
                            case 1:
                                return 'Actualizado';
                                break;
                            case 2:
                                return 'Eliminado';
                                break;
                            default:
                                return 'Otro';
                                break;
                        }
                    }
                ],
                'table',
                'field_name',
                'field_id',
                'old_value:ntext',
                'new_value:ntext',
                'type',
            ],
        ]); ?>
