<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\seguridad\models\Perfil */

$this->title = 'Create Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
