<?php use yii\helpers\Html; ?>
<div class="body-content">

    <div class="row">
        <div class="col-lg-4">
            <h2>Logs del sistema</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><?= Html::a('Logs &raquo;',['/seguridad/log/'],['class'=>'btn btn-success']) ?></p>
        </div>
        <div class="col-lg-4">
            <h2>Auditorias del sistema</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><?= Html::a('Auditorias &raquo;',['/seguridad/modelhistory/'],['class'=>'btn btn-success']) ?></p>
        </div>
        <div class="col-lg-4">
            <h2>Salva Restauras</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><?= Html::a('Salvas y Restauras &raquo;',['//db-manager/'],['class'=>'btn btn-success']) ?></p>
        </div>
    </div>

</div>
