<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Seo;

class AboutusController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    { 
    	$seoData=Seo::findOne(2);   	
        return $this->render('aboutus', [ 
        	'seoData'=>$seoData,       	
        	'admin'=>$this->admin(),
        ]);
    }   
}
