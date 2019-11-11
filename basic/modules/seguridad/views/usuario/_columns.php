<?php
use yii\helpers\Url;
use yii\helpers\Html;
use mdm\admin\components\Helper;
return [
    /*[
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],*/
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'width' => '30px',
        'dropdown' => false,
        'header'=>'',
        'template' => '{perfil}',
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
                return Url::to([$action,'id'=>$key]);
        },
        'buttons'=>[
            'perfil' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-user"></span>', ['/seguridad/perfil/view', 'id'=>$model->id]);
            }
        ],
    ],    
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'auth_key',
    ],*/
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'password_hash',
    ],*/
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'password_reset_token',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'filter'=>['10'=>'Activado','0'=>'Desactivado'],
        'value' => function ($model,$key,$index,$column) { 
                        if ($model->status==10) {
                            return 'Activado';
                        }
                        return 'Desactivado';
                    },          
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'created_at',
        //'format'=>'raw',
        'value' => function ($model,$key,$index,$column) { 
                        return date('d-m-Y',$model->created_at);
                    },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'updated_at',
        'value' => function ($model,$key,$index,$column) { 
                        return date('d-m-Y',$model->updated_at);
                    },        
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => Helper::filterActionColumn('{estado}{view}{update}'),
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'buttons'=>[
            'estado' => function ($url, $model, $key) {
                if ($model->status==10 && $model->username!=='sysadmin'){
                    return Html::a('<span class="glyphicon glyphicon-remove"></span> ', ['estado', 'id'=>$model->id],['data' => ['confirm' => '¿Está seguro que desea cambiar desactivar el estado?','method' => 'post',],'title'=>'Desactivar']);
                }elseif($model->status==0 && $model->username!=='sysadmin'){
                    return Html::a('<span class="glyphicon glyphicon-ok"></span> ', ['estado', 'id'=>$model->id],['data' => ['confirm' => '¿Está seguro que desea cambiar activar el estado?','method' => 'post',],'title'=>'Activar']);
                }else{
                    return "";
                }                
            }
        ],        
        'viewOptions'=>['role'=>'modal-remote','title'=>'Ver','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Editar', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   