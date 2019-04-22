<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Behaviors;
use Yii;

class ExitAdmin extends Widget
{  
	public function behaviors(){
        return [Behaviors::className()];           
    }		
    public function run(){
    	if($this->admin()){
    		return Html::a('Выход', Url::toRoute(['/admin/exit']), ['id'=>'exit-admin']);
    	} 
    	else{
    		return '';
    	}    	
    	
    }
}