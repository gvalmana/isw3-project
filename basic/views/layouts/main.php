<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use app\models\Noconformidad;

if (Yii::$app->controller->action->id === 'login' || Yii::$app->controller->route === 'user/recovery/request'){

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else{
    $usuario = Yii::$app->user->identity->username;
}
$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="" class="site_title"></i> <span>SGNC Havanatur</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <?= Html::img('@web/img/havanatur1.jpg', ['alt' => 'My logo', 'class' => 'img-circle profile_img']) ?>
                        <!--<img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">-->
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2><?= Html::encode($usuario)?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Menú</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Inicio", "url" => ['/site/index'], "icon" => "home"],
                                    [
                                        "label" => "No Conformidades",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Auditoría", "url" => ["/noconformidad/create-adt"]],
                                            ["label" => "Producto-Servicio", "url" => ["/noconformidad/create-serv"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Nomencladores",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Agencias",
                                                "url" => "/basic/web/agencia/",
                                            ],
                                            [
                                                "label" => "Mercados",
                                                "url" => "/basic/web/mercado",
                                            ],
                                            [
                                                "label" => "Sucursales",
                                                "url" => "/basic/web/sucursal",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Operadores y Grupos",
                                        "url" => "#",
                                        "icon" => "group",
                                        "visible" =>Yii::$app->authManager->getAssignment('administrador', Yii::$app->user->getId())==true,
                                        "items" => [
                                            [
                                                "label" => "Agregar tareas",
                                                "icon" => "user-plus",
                                                'url' => '/basic/web/admin/route',
                                            ],
                                            [
                                                "label" => "Agregar role",
                                                "icon" => "group",
                                                'url' => '/basic/web/admin/role/create',
                                            ],
                                            [
                                                "label" => "Asignar role",
                                                "icon" => "group",
                                                'url' => '/basic/web/admin/assignment',
                                            ],
                                            [
                                                "label" => "Usuarios",
                                                "icon" => "user",
                                                'url' => '/basic/web/admin/user',
                                            ],
                                            [
                                                "label" => "Roles",
                                                "icon" => "group",
                                                'url' => '/basic/web/admin/role',
                                            ],

                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
      <  <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?= Html::encode($usuario)?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><?= Html::a('Cerrar sesión', ['/site/logout'],
                                ['data-method'=>'post', 'class'=>'fa fa-sign-out pull-right'])?>
                                </li>
                            </ul>
                        </li>
                        <?php $cantidad_nc = Noconformidad::find()->count();?>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-book"></i>
                                <span class="badge bg-green"><?php if($cantidad_nc>0) echo Html::encode($cantidad_nc)?></span>
                            </a>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Havanatur el Especialista de Cuba <a href="https://colorlib.com" rel="nofollow" target="_blank"></a><br />
                Módulo de No Conformidades <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
