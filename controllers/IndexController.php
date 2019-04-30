<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\News;
use app\models\Seo;

class IndexController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
        $fixedNews=News::find()->where(['fixed'=>1])->one();
        if($fixedNews){
            $news=News::find()->orderBy('id DESC')->where(['active'=>1, 'fixed'=>0])->limit(2)->all();
        }
        else{
            $news=News::find()->orderBy('id DESC')->where(['active'=>1])->limit(3)->all();
        }    	
        $seoData=Seo::findOne(1);

        //return $this->out($fixedNews);
        return $this->render('index', [            
            'seoData'=>$seoData,
        	'news'=>$news,
            'fixedNews'=>$fixedNews,
        	'admin'=>$this->admin(),
        ]);
    }   
}
