<?php

namespace backend\controllers;

use common\models\Brand;
use common\models\Category;
use common\models\search\BrandSearch;
use common\models\search\CategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $category = $searchModel->search($this->request->queryParams);


        $searchModel1 = new BrandSearch();
        $brand = $searchModel1->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel'=>$searchModel,
            'searchModel1'=>$searchModel1,
            'category'=>$category,
            'brand'=>$brand
        ]);
    }


    public function actionCreateCategory(){
     $model = new Category();

        if($this->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;

            $content['status'] = false;

            if ($model->load($this->request->post()) && $model->save()) {
                $content['status'] = true;
                return $content;
            }

            $content['content'] = $this->renderAjax('_form', [
                'model' => $model,
            ]);
            return $content;
        }

        return $this->render('_form', compact('model'));
    }

    public function actionUpdateCategory($id){
        $model = Category::findOne(['id'=>$id]);

        if($this->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;

            $content['status'] = false;

            if ($model->load($this->request->post()) && $model->save()) {
                $content['status'] = true;
                return $content;
            }

            $content['content'] = $this->renderAjax('_form', [
                'model' => $model,
            ]);
            return $content;
        }

        return $this->render('_form', compact('model'));
    }

    public function actionDeleteCategory($id){
        $model = Category::findOne(['id'=>$id]);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionCreateBrand(){
        $model = new Brand();
        if($this->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;

            $content['status'] = false;

            if ($model->load($this->request->post()) && $model->save()) {
                $content['status'] = true;
                return $content;
            }

            $content['content'] = $this->renderAjax('form_brand', [
                'model' => $model,
            ]);
            return $content;
        }
        return $this->render('form_brand', compact('model'));
    }


    public function actionUpdateBrand($id){
        $model = Brand::findOne(['id'=>$id]);
        if($this->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;

            $content['status'] = false;

            if ($model->load($this->request->post()) && $model->save()) {
                $content['status'] = true;
                return $content;
            }

            $content['content'] = $this->renderAjax('form_brand', [
                'model' => $model,
            ]);
            return $content;
        }
        return $this->render('form_brand', compact('model'));
    }



    public function actionDeleteBrand($id){
        $model = Brand::findOne(['id'=>$id]);
        $model->delete();
        return $this->redirect(['index']);
    }

}
