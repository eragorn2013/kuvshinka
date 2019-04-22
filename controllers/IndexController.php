<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;

class IndexController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
        return $this->render('index', [
        	'admin'=>$this->admin(),
        ]);
    }   
}
