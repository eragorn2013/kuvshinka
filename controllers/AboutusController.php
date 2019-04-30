<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Seo;
use app\models\Orders;

class AboutusController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    { 
    	$seoData=Seo::findOne(2); 
        $order=new Orders(['scenario'=>Orders::SCENARIO_ABOUTUS]);   	
        return $this->render('aboutus', [ 
        	'seoData'=>$seoData,       	
        	'admin'=>$this->admin(),
            'formAbout'=>$order,
        ]);
    }   
}
