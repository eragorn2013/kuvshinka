<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Gallery;

class GalleryController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
        $gallery=new Gallery;
        $images=Gallery::find()->orderBy('id DESC')->all();
        return $this->render('gallery', [ 
            'images'=>$images,
            'gallery'=>$gallery,       	
        	'admin'=>$this->admin(),
        ]);
    }   
}
