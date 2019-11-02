<?php
use mdm\admin\components\MenuHelper;
use mdm\admin\components\Helper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
    <!--<div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
                <?php $items= [
                    ['label' => 'Mercancías', 'icon' => 'mail-forward', 'url' => ['#'],
                        'items'=>[
                            ['label' => 'Contenedores', 'icon' => 'ship', 'url' => ['/mercancia/contenedor']],
                            ['label' => 'Cargas Agrupadas', 'icon' => 'cubes', 'url' => ['/mercancia/cargas']],
                            ['label' => 'Guías Aereas', 'icon' => 'plane', 'url' => ['/mercancia/guias']],
                        ]
                    ],
                    ['label' => 'Informaciones', 'icon' => 'mail-forward', 'url' => ['#'],
                        'items'=>[
                            ['label' => 'Ventas', 'icon' => 'usd', 'url' => ['/informacion/venta']],
                            ['label' => 'Transportación', 'icon' => 'truck', 'url' => ['/informacion/transportacion']],
                            ['label' => 'Incidencias', 'icon' => 'tasks', 'url' => ['/informacion/incidencias']],
                        ]
                    ],
                    ['label' => 'Nomencladores', 'icon' => 'mail-forward', 'url' => ['#'],
                        'items'=>[
                            ['label' => 'Clientes y empresas', 'icon' => 'institution', 'url' => ['/nomencladores/empresa']],
                        ]
                    ],
                    ['label' => 'Seguridad', 'icon' => 'key','url' => ['#'],
                        'items'=>[
                            ['label' => 'Auditorías del sistema', 'icon' => 'search', 'url' => ['/seguridad/modelhistory']],
                            ['label' => 'Logs del sistema', 'icon' => 'clock-o', 'url' => ['/seguridad/log']],
                            ['label' => 'Salva-Restaura', 'icon' => 'clock-o', 'url' => ['/db-manager']],
                        ]
                    ],
                    ['label' => 'Control de usuarios', 'icon' => 'users','url' => ['#'],
                        'items'=>[
                            ['label' => 'Usuarios', 'icon' => 'user', 'url' => ['/seguridad/usuario']],
                            ['label' => 'Control de acceso', 'icon' => 'mail-forward', 'url' => ['#'],
                                'items'=>[
                                    ['label' => '1- Rutas', 'icon' => 'check', 'url' => ['/admin/route']],
                                    ['label' => '2- Roles', 'icon' => 'check', 'url' => ['/admin/role']],
                                    ['label' => '3- Asignar', 'icon' => 'check', 'url' => ['/admin/assignment']],
                                    ['label' => '4- Reglas', 'icon' => 'check', 'url' => ['/admin/rule']],
                                    ['label' => '5- Permisos', 'icon' => 'check', 'url' => ['/admin/permission']],
                                    ['label' => '6- Menús', 'icon' => 'check', 'url' => ['/admin/menu']],
                                ]
                            ],
                        ]
                    ],
                    ['label' => 'Salir', 'icon' => 'power-off','url' =>'#','options'=>['class'=>'salirLink']]
                ];
                //$items = Helper::filter($items);
                ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $items,
            ]
        ) ?>

    </section>

</aside>
