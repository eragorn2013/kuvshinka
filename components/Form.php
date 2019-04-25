<?php

namespace app\components;

use yii\base\Widget;
use Yii;
use app\models\Orders;

class Form extends Widget
{	
    public function run(){ 
    	$orderForm=new Orders;   	
    	return $this->render('form', ['orderForm'=>$orderForm]);
    }
}