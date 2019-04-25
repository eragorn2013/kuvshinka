<?php

namespace app\components;

use yii\base\Widget;
use Yii;
use app\models\Orders;

class Form extends Widget
{	
    public function run(){ 
    	$orderForm=new Orders(['scenario'=>Orders::SCENARIO_POPUP]);   	
    	return $this->render('form', ['orderForm'=>$orderForm]);
    }
}