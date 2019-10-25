<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agencia */

$this->title = 'Registrar Agencia';
$this->params['breadcrumbs'][] = ['label' => 'Agencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
