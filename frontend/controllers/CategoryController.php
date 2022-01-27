<?php


namespace frontend\controllers;


use common\models\Brand;
use common\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(){
        $category = Category::findAll(['status'=>true]);
        $brand = Brand::findAll(['status'=>true]);

        return $this->render('index', [
            'category'=>$category,
            'brand'=>$brand
        ]);
    }

}