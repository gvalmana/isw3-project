<?php

/* @var $this yii\web\View */
//use yiister\gentelella\widgets\Panel;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Havanatur</h1>

        <p class="lead">El especialista de Cuba.</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost/basic/web/noconformidad/">Registrar No conformidad</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Servicio de Boletería</h2>

                <?= Html::img('@web/img/boletos.jpg', ['alt' => 'My logo']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Servicio de Transfer</h2>

                <?= Html::img('@web/img/transfer.jpg', ['alt' => 'My logo', 'width'=>'299px',
                 'height' => '168px']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Servicio de Recreación</h2>

                <?= Html::img('@web/img/hotel.jpg', ['alt' => 'My logo', 'width'=>'250px',
                 'height' => '168px']) ?>

            </div>
        </div>

    </div>
</div>
