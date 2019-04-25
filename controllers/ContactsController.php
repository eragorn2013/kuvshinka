<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Orders;
use app\models\Seo;

class ContactsController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {   
    	$order=new Orders(['scenario'=>Orders::SCENARIO_CONTACTS]); 	
        $seoData=Seo::findOne(6);
        return $this->render('contacts', [ 
            'seoData'=>$seoData,       	
        	'admin'=>$this->admin(),
        	'order'=>$order,
        ]);
    }   
}
