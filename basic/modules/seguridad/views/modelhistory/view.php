<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modelhistory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Auditoría del sistema', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelhistory-view box box-primary">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'date',
                'table',
                'field_name',
                'field_id',
                'old_value:ntext',
                'new_value:ntext',
                'type',
                'user_id',
            ],
        ]) ?>
    </div>
</div>
