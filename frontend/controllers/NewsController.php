<?php


namespace frontend\controllers;


use common\models\News;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex(){
        $newsDataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['status'=>1]),
            'pagination'=>[
                'pageSize'=>5
            ]
        ]);

        return $this->render('index', [
            'newsDataProvider'=>$newsDataProvider,
        ]);
    }

    public function actionSingle($slug){
        $model = News::findOne(['url'=>$slug]);
        return $this->render('single', compact('model'));
    }

}