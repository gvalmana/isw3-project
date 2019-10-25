<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NcAudit */

$this->title = 'Create Nc Audit';
$this->params['breadcrumbs'][] = ['label' => 'Nc Audits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nc-audit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
