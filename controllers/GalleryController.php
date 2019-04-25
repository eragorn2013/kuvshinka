<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Behaviors;
use app\models\Gallery;
use app\models\Seo;

class GalleryController extends Controller
{ 
	public function behaviors(){
        return [Behaviors::className()];           
    }   
    public function actionIndex()
    {
        $gallery=new Gallery;
        $images=Gallery::find()->orderBy('id DESC')->all();
        $seoData=Seo::findOne(5);
        return $this->render('gallery', [ 
            'seoData'=>$seoData,
            'images'=>$images,
            'gallery'=>$gallery,       	
        	'admin'=>$this->admin(),
        ]);
    }   
}
