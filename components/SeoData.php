<?php

namespace app\components;

use yii\base\Widget;
use app\models\Seo;
use Yii;

class SeoData extends Widget
{ 
	public $id; 	
    public function run(){    
    	$id=(int)$this->id;
    	$seo=Seo::findOne($id);    	
    	return $this->render('seo', ['seo'=>$seo]);
    }
}