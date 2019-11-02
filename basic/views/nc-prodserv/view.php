<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NcProdserv */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nc Prodservs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nc-prodserv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'modalidad_turistica',
            'procedencia',
            'producto',
            'pais',
            'mercado',
            'agencia',
            'nombre_cliente',
            'no_reserva',
            'no_pax',
            'costo_nocalidad',
            'receptor',
        ],
    ]) ?>

</div>
