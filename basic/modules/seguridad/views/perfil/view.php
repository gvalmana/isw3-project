<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\seguridad\models\Perfil */

$this->title = 'Perfil de usuario: '.$model->usuario->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-view box box-primary">
    <div class="box-header">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php
        if ($model->id==Yii::$app->user->getId()) {
           echo Html::a('Cambiar contraseña', ['/seguridad/usuario/changepass', 'id' => Yii::$app->user->getId()], ['class' => 'btn btn-warning btn-flat']);
        }
        ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'usuario.username',
                'nombre',
                'primer_apellido',
                'segundo_apellido',
            ],
        ]) ?>
    </div>
    <div class="box-footer">
    <?php
        if (Yii::$app->user->can('/seguridad/perfil')) {
            echo Html::a('Perfiles', ['/seguridad/perfil'], ['class' => 'btn btn-success btn-flat']);
        }
        if (Yii::$app->user->can('/seguridad/usuario')) {
            Html::a('Usuarios', ['/seguridad/usuario'], ['class' => 'btn btn-info btn-flat']);
        }
    ?>
    </div>
</div>
