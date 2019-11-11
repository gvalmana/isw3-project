<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use mdm\admin\models\User;
use app\modules\seguridad\models\Usuario;
$usuario = Usuario::findIdentity(Yii::$app->user->identity->id);
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::img("@web/img/perfiles/sysadmin.jpg",['class'=>'user-image','alt'=>'User Image'])?>
                        <span class="hidden-xs"><?=$usuario->username?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                        <!--    <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>-->
                        <?= Html::img("@web/img/perfiles/sysadmin.jpg",['class'=>'img-circle','alt'=>'User Image'])?>
                            <p>
                                <?=$usuario->perfil->nombre.' '.$usuario->perfil->primer_apellido.' '.$usuario->perfil->segundo_apellido?> <br/>
                                <?php foreach ( Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()) as $role ):?>
                                        <?= Html::encode($role->name) ?>
                                    <?php endforeach;?>
                                <small>Miembro desde <?php echo date("M. Y",$usuario->created_at)?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Perfil',
                                    ['/seguridad/perfil/view','id'=>$usuario->id],
                                    ['class' => 'btn btn-info btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Salir',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<?php //Estos son todos los modals a mostrar desde la pantalla principal?>
    <?php Modal::begin([
        'header' => '<h4>Salir</h4>',
        'id'=>'modalsalir',
        'footer'=>Html::beginForm(['/site/logout'], 'post')
            . Html::Button('Cancelar',['class' => 'btn btn btn-danger btn-flat','data-dismiss'=>'modal'])
            . Html::submitButton('Aceptar',['class' => 'btn btn btn-primary btn-flat'])
            . Html::endForm(),
        //'size'=>'modal-lg',
    ]);?>
        <div id="modalContent"><h3>Esta seguro que desea salir?</h3></div>
    <?php Modal::end();
?>
