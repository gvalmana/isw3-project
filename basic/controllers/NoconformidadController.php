<?php

namespace app\controllers;

use Yii;
use app\models\Noconformidad;
use app\models\NoconformidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\NcAudit;
use app\models\NcProdserv;
use app\models\NcAuditSearch;
use app\models\NcProdservSearch;
use app\models\Agencia;
use app\models\Mercado;
use app\models\User;
use app\models\Sucursal;
use yii\web\UploadedFile;

/**
 * NoconformidadController implements the CRUD actions for Noconformidad model.
 */
class NoconformidadController extends Controller
{
    /**
     * {@inheritdoc}
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
        ];
    }

     public function actionContact() 
    {
    
       Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->user->identity->email)
                ->setTo('to@domain.com')
                ->setSubject('Asunto del mensaje')
                ->setTextBody('Contenido en texto plano')
                ->setHtmlBody('<b>Contenido HTML</b>')
                ->send();
    }


    public function actionListar($codigo)
    {
        $cantidad = Agencia::find()->where(['id_pais'=>$codigo])->count();
        $agencias = Agencia::find()->where(['id_pais'=>$codigo])->all();
        if ($cantidad > 0) {
            echo "<option>  </option>";
            foreach ($agencias as $row){
                echo '<option value="' . $row->id . '">' . $row->nombre . '</option>';
            }
        } else {
            echo "<option> - </option>";
        }
    }
    public function actionMercado($id_mercado)
    {
        $cantidad = Mercado::find()->where(['id'=>$id_mercado])->count();
        $mercado = Mercado::find()->where(['id'=>$id_mercado])->all();
        if ($cantidad > 0) {
            echo "<option>  </option>";
            foreach ($mercado as $row){
                echo '<option value="' . $row->id . '">' . $row->nombre . '</option>';
            }
        } else {
            echo "<option> - </option>";
        }
    }   

    /**
     * Lists all Noconformidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new NoconformidadSearch();
        //SE CREAN DOS INSTANCIAS QUE PERMITEN FILTRAR LOS DATOS DE LA GRID
        $searchAuidtorias = new NcAuditSearch();
        $searchProductos = new NcProdservSearch();
        //ESTOS SON LOS DATA PROVIDERS PARA LAS GRID DE LAS DIFERENTES AUDITORIAS
        $dataProviderAuditoria = $searchAuidtorias->search(Yii::$app->request->queryParams);
        $dataProviderProductos = $searchProductos->search(Yii::$app->request->queryParams);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'searchAuidtorias' => $searchAuidtorias,
            'searchProductos' => $searchProductos,
            'dataProviderAuditoria' => $dataProviderAuditoria,
            'dataProviderProductos' => $dataProviderProductos,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Noconformidad model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (NcProdserv::find($id)->exists()) {
            $hija = NcProdserv::find()->where(['id' => $id])->one();
        }
        if (NcAudit::find($id)->exists()) {
            $hija = NcAudit::find()->where(['id' => $id])->one();
            print_r($hija);die;
            $hija = NcAudit::find()->where(['id' => $id])->one();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'hija'=> $hija,
        ]);
    }

    /**
     * Creates a new Noconformidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Noconformidad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/


    public function actionCreateAdt()
    {
        $model = new Noconformidad();

        $model_1 = new NcAudit();
        $cantidad=NcAudit::find()->count()+1;
        $model->codigo='NCAUD'.$cantidad;
        

        if ($model->load(Yii::$app->request->post()) && $model_1->load(Yii::$app->request->post())) {

            //obtener las intancias de los archivos cargados
            $ncName = $model->codigo;
            $model->file = UploadedFile::GetInstance($model, 'file');
            $model->file->SaveAs( 'uploads/'.$ncName.'.'.$model->file->extension );

            //salvar el path en una columna de la base de datos
            $model->evidencias = 'uploads/'.$ncName.'.'.$model->file->extension;
            $model->fecha_entrada = date('Y-m-d');
            $model->fecha_termino = date('Y-m-d', strtotime('+30d'));
            //lee todas las normas escojidas mandadas por post
            $normas=$_POST['Noconformidad']['normas_afectadas']; 
            $model->normas_afectadas='';
            //recorre todas las normas para ir concatenando
            foreach ($normas as $norma):
                $model->normas_afectadas=$model->normas_afectadas.' '.$norma;
            endforeach;
                               
            if ($model->save()) {
                //si se salva entonces alsigna el ID y salvalo
                $model_1->id = $model->id;
                $model_1->save();
                return $this->redirect(['index', 'id' => $model->id]);
            }            
        }

        return $this->render('create', [
            'model' => $model,
            'model_1' => $model_1,
        ]);
    }

    public function actionCreateServ()
    {
        $model = new Noconformidad();

        $model_1 = new NcProdserv();
        $cantidad=NcProdserv::find()->count()+1; ;   
        $model->codigo='NCPS'.$cantidad;    

        if ($model->load(Yii::$app->request->post()) && $model_1->load(Yii::$app->request->post())) {
            //obtener las intancias de los archivos cargados
            $ncName = $model->codigo;
            $model->file = UploadedFile::GetInstance($model, 'file');
            $model->file->SaveAs( 'uploads/'.$ncName.'.'.$model->file->extension );

            //salvar el path en una columna de la base de datos
            $model->evidencias = 'uploads/'.$ncName.'.'.$model->file->extension;
            $model->fecha_entrada = date('Y-m-d');
            $model->fecha_termino = date('Y-m-d', strtotime('+30d'));
            //lee todas las normas escojidas mandadas por post
            $normas=$_POST['Noconformidad']['normas_afectadas']; 
            $model->normas_afectadas='';
            //recorre todas las normas para ir concatenando
            foreach ($normas as $norma):
                $model->normas_afectadas=$model->normas_afectadas.' '.$norma;
            endforeach;
                               
            if ($model->save()) {
                //si se salva entonces alsigna el ID y salvalo
                $model_1->id = $model->id;
                $model_1->save();
                return $this->redirect(['index', 'id' => $model->id]);
            }            
        }
        return $this->render('createproduct', [
            'model' => $model,
            'model_1' => $model_1,
        ]);
    }
    
    /**
     * Updates an existing Noconformidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Noconformidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Noconformidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Noconformidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Noconformidad::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
