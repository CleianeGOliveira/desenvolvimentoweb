<?php

namespace app\controllers;

use app\models\Itenscompra;
use app\models\ItenscompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItenscompraController implements the CRUD actions for Itenscompra model.
 */
class ItenscompraController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Itenscompra models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItenscompraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Itenscompra model.
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_compra, $id_produto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_compra, $id_produto),
        ]);
    }

    /**
     * Creates a new Itenscompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new Itenscompra();
        $model->id_compra = $id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['compra/view', 'id' => $model->id_compra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,            
        ]);
    }

    /**
     * Updates an existing Itenscompra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_compra, $id_produto)
    {
        $model = $this->findModel($id_compra, $id_produto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['compra/view', 'id' => $model->id_compra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Itenscompra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_compra, $id_produto)
    {
        $this->findModel($id_compra, $id_produto)->delete();

        return $this->redirect(['compra/view','id' => $id_compra]);        
    }

    /**
     * Finds the Itenscompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return Itenscompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_compra, $id_produto)
    {
        if (($model = Itenscompra::findOne(['id_compra' => $id_compra, 'id_produto' => $id_produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
