<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sucursal */

$this->title = 'Registrar Sucursal';
$this->params['breadcrumbs'][] = ['label' => 'Sucursal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sucursal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
