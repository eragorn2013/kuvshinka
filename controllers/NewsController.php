<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\News;

class NewsController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
    	if($this->admin()){
    		$news=News::find()->orderBy('id DESC')->all();
    	}
    	else{
    		$news=News::find()->where(['active'=>1])->orderBy('id DESC')->all();
    	}
        return $this->render('news', [        	
        	'news'=>$news,
        	'admin'=>$this->admin(),
        ]);
    }   
}
