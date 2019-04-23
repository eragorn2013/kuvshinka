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
    	$images=new Images();  	
        return $this->render('news', [ 
        	'images'=>$images,       	
        	'news'=>$news,
        	'admin'=>$this->admin(),
        ]);
    }
    public function actionNewsCurrent($id){
        $id=(int)$id;
        $news=News::find()->where(['id'=>$id, 'active'=>1])->with('images')->one();
        if(!$news) return Yii::$app->response->redirect(['/news']);        
        return $this->render('news_current', [
            'news'=>$news,
        ]);
    }   
}
