<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Noconformidad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Noconformidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="noconformidad-view">

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
            'codigo',
            'fecha_identificacion',
            'descripcion:ntext',
            'tipo_nc',
            'normas_afectadas:ntext',
            'fecha_entrada',
            'fecha_termino',
            'evidencias:ntext',
            'id_areainterna',
        ],
    ]) ?>

    <?php 
    if (isset($hija)) {
        echo DetailView::widget([
            'model' => $hija,
        ]);        # code...
    }  
 ?>   

</div>
