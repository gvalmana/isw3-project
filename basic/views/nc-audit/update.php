<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NcAudit */

$this->title = 'Update Nc Audit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nc Audits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nc-audit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
