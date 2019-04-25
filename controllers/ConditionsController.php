<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Seo;

class ConditionsController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {  
    	$seoData=Seo::findOne(3);    	
        return $this->render('conditions', [  
        	'seoData'=>$seoData,       	
        	'admin'=>$this->admin(),
        ]);
    }   
}
