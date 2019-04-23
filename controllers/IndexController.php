<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\News;

class IndexController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
    	$news=News::find()->orderBy('id DESC')->where(['active'=>1])->limit(3)->all();
        return $this->render('index', [
        	'news'=>$news,
        	'admin'=>$this->admin(),
        ]);
    }   
}
