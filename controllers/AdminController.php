<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class AdminController extends Controller
{ 		
    public function actionIndex()
    {
    	$user=new User();
    	if(!Yii::$app->user->isGuest) return Yii::$app->response->redirect(['/']);			
		if($user->load(Yii::$app->request->post()) && $user->validate()){		
			if(!Yii::$app->user->isGuest) return Yii::$app->response->redirect(['/']);				
		}
        return $this->render('admin', ['form'=>$user]);
    }   
}