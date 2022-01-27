<?php

namespace backend\controllers;

use common\models\Gallery;
use common\models\search\GallerySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Lists all Gallery models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Gallery();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $images = UploadedFile::getInstances($model,'images');
                if(!empty($images)){

                    $mas = [];
                    $i = 0;
                    foreach ($images as $image){
                        $mas[] = $image->baseName."{$i}.".$image->extension;
                        $image->saveAs(Yii::getAlias('@frontend').'/web/img/gallery/'.$image->baseName."{$i}.".$image->extension, true);
                        $i++;
                    }
                    $model->images = implode(',', $mas);
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    Yii::$app->session->setFlash('warning', 'Rasm maydoni bo\'sh bo\'lmasin!');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $images = UploadedFile::getInstances($model,'images');

            if(!empty($images)){
                $mas = [];
                $i = 0;
                foreach ($images as $image){
                    $mas[] = $image->baseName."{$i}.".$image->extension;
                    $image->saveAs(Yii::getAlias('@frontend').'/web/img/gallery/'.$image->baseName."{$i}.".$image->extension, true);
                    $i++;
                }
                $model->images = implode(',', $mas);
            }else{
                $model->images = $model->getOldAttribute('images');
            }

            $model->update();
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $images = explode(',', $model->images);
        for ($i = 0; $i < count($images); $i++){
            unlink(Yii::getAlias('@frontend').'/web/img/gallery/'.$images[$i]);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
