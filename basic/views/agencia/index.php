<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AgenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Agencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pais',
            'nombre',
            'direccion:ntext',
            'dir_agencia',
            //'id_mercado',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{upate}'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
