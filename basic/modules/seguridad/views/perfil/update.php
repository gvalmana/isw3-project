<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\seguridad\models\Perfil */

$this->title = 'Actualizar perfil de usuario: ' .$model->usuario->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfil-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
