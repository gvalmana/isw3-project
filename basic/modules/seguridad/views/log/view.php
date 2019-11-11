<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view box box-primary">
    <div class="box-header">
    <?= Html::a('Atras', ['/log/index'],['class' => 'btn btn-primary btn-flat']) ?> 
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix:ntext',
                'message:ntext',
            ],
        ]) ?>
    </div>
</div>
