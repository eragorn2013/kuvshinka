<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\News;
use app\models\Images;

class NewsController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
    	if($this->admin()){
    		$news=News::find()->orderBy('id DESC')->with('images')->all();
    	}
    	else{
    		$news=News::find()->where(['active'=>1])->orderBy('id DESC')->with('images')->all();
    	}   
    	//return $this->out($news); 	
    	$images=new Images();  	
        return $this->render('news', [ 
        	'images'=>$images,       	
        	'news'=>$news,
        	'admin'=>$this->admin(),
        ]);
    }   
}
