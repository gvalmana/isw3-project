<?php

namespace app\modules\seguridad\controllers;

use Yii;
use app\modules\seguridad\models\Usuario;
use app\modules\seguridad\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
//use mdm\admin\models\form\Signup;
use app\modules\seguridad\models\RegistroForm;
use app\modules\seguridad\models\PassForm;
use app\modules\seguridad\models\Perfil;
use yii\helpers\ArrayHelper;
/**
 * UsuarioController implements the CRUD actions for User model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }*/
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'estado' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $controller = Yii::$app->controller->id;
                            $route = "/" . Yii::$app->controller->route;
                            if (Yii::$app->user->can("/$controller/*") || Yii::$app->user->can("/*"))
                                return true;
                            if (Yii::$app->user->can($route))
                                return true;
                        }
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Usuario #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-danger btn-flat pull-left','data-dismiss'=>"modal"]).
                            Html::a('Actualizar',['update','id'=>$id],['class'=>'btn btn-flat btn-primary','role'=>'modal-remote'])
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new User model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new RegistroForm(['scenario' => 'create']);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Registrar nuevo usuario",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Cancelar',['class'=>'btn btn-danger btn-flat pull-left','data-dismiss'=>"modal"]).
                                Html::button('Guardar',['class'=>'btn btn-primary btn-flat','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->validate()){
                    $user = new Usuario();
                    $user->username = $model->username;
                    $user->email = $model->email;
                    $user->status = 10;
                    $user->setPassword($model->password);
                    $user->generateAuthKey();                    
                if ($user->save()) {
                    $profile = new Perfil();
                    $profile->id = $user->id;
                    $profile->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Registrar nuevo usuario",
                        'content'=>'<span class="text-success">Usuaio registrado correctamente</span>',
                        'footer'=> Html::button('Cancelar',['class'=>'btn btn-danger btn-flat pull-left','data-dismiss'=>"modal"]).
                                Html::a('Registrar otro',['create'],['class'=>'btn btn-primary btn-flat','role'=>'modal-remote'])

                    ];
                }

            }else{
                return [
                    'title'=> "Registrar nuevo usuario",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Cancelar',['class'=>'btn btn-flat btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Guardar',['class'=>'btn btn-primary btn-flat','type'=>"submit"])

                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $user= $model->signup()) {
                return $this->redirect(['view', 'id' => $user->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $user = Usuario::findOne($id);
        $model = new RegistroForm(['scenario' => 'update']);
        $model->username = $user->username;
        $model->email = $user->email;

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Actualizar usuario #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Cancelar',['class'=>'btn btn-flat btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Actualizar',['class'=>'btn btn-flat btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->validate()){
                $user->username = $model->username;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if ($user->save()) {
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "User #".$id,
                        'content'=>$this->renderAjax('view', [
                            'model' => $user,
                        ]),
                        'footer'=> Html::button('Cerrar',['class'=>'btn btn-flat btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::a('Editar',['update','id'=>$id],['class'=>'btn btn-flat btn-primary','role'=>'modal-remote'])
                    ];
                }
            }else{
                 return [
                    'title'=> "Actualizar usuario #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Cancelar',['class'=>'btn btn-flat btn-danger pull-left','data-dismiss'=>"modal"]).
                                Html::button('Actualizar',['class'=>'btn btn-flat btn-primary','type'=>"submit"])
                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                $user->username = $model->username;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if ($user->save()) {
                    return $this->redirect(['view', 'id' => $user->id]);
                }

            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionEstado($id)
    {
        $request = Yii::$app->request;
        $model=$this->findModel($id);

        if($model->username!=='sysadmin'){
            $model->status==10?$model->status=0:$model->status=10;
        }else{
            Yii::$app->session->setFlash('error', 'El usuario administrador del sistema no puede ser desactivado');
            return $this->redirect(['index']);
        }
        if ($model->save()) {
            if ($model->status==10) {
                Yii::$app->session->setFlash('success', 'El usuario ha sido activado correctamente');
            }else{
                Yii::$app->session->setFlash('warning', 'El usuario ha sido desactivado correctamente');
            }            
        }else{
            Yii::$app->session->setFlash('error', 'Ha habido un error al cambiar el estado del usuario');
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    public function actionChangepass()
    {
        //print_r(Yii::$app->user->identity->password_hash);die;
        $model = new PassForm();
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->security->validatePassword($model->old_pass,Yii::$app->user->identity->password_hash)) {
                $user = Usuario::findOne(Yii::$app->user->identity->id);
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if ($user->save()) {
                    Yii::$app->session->setFlash('success', 'La contraseña ha sido actualziada correctamente.');
                    return $this->redirect(['index']);
                }else{
                    Yii::$app->session->setFlash('error', 'Ha habido un error al la contraseña.');
                }
            }else{
                Yii::$app->session->setFlash('error', 'La contraseña actual no es correcta.');
            }
        }
        return $this->render('pass',['model'=>$model]);
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
