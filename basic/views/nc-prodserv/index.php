<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NcProdservSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nc Prodservs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nc-prodserv-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nc Prodserv', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'modalidad_turistica',
            'procedencia',
            'producto',
            'pais',
            //'mercado',
            //'agencia',
            //'nombre_cliente',
            //'no_reserva',
            //'no_pax',
            //'costo_nocalidad',
            //'receptor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
