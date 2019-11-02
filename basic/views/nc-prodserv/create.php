<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NcProdserv */

$this->title = 'Create Nc Prodserv';
$this->params['breadcrumbs'][] = ['label' => 'Nc Prodservs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nc-prodserv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
