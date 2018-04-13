<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ShoppingList;
use frontend\models\ShoppingListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShoppingListController implements the CRUD actions for ShoppingList model.
 */
class ShoppingListController extends Controller
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
        ];
    }

    /**
     * Lists all ShoppingList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoppingListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShoppingList model.
     * @param integer $list_id
     * @param integer $events_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($list_id, $events_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($list_id, $events_id),
        ]);
    }

    /**
     * Creates a new ShoppingList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShoppingList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'list_id' => $model->list_id, 'events_id' => $model->events_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ShoppingList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $list_id
     * @param integer $events_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($list_id, $events_id)
    {
        $model = $this->findModel($list_id, $events_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'list_id' => $model->list_id, 'events_id' => $model->events_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShoppingList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $list_id
     * @param integer $events_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($list_id, $events_id)
    {
        $this->findModel($list_id, $events_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShoppingList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $list_id
     * @param integer $events_id
     * @return ShoppingList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($list_id, $events_id)
    {
        if (($model = ShoppingList::findOne(['list_id' => $list_id, 'events_id' => $events_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
