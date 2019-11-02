<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MercadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mercados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mercado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Mercado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre:ntext',
            'jefe_mercado',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{upate}'],
        
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
