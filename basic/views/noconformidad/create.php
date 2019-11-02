<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Noconformidad */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Noconformidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noconformidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_1' => $model_1,
    ]) ?>

</div>
