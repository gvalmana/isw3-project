<?php

namespace app\modules\seguridad\controllers;

use Yii;
use app\modules\seguridad\models\Modelhistory;
use app\modules\seguridad\models\ModelhistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ModelhistoryController implements the CRUD actions for Modelhistory model.
 */
class ModelhistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
     * Lists all Modelhistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelhistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modelhistory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Modelhistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modelhistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modelhistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
