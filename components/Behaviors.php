<?php

namespace app\components;

use yii\base\Behavior;
use Yii;

class Behaviors extends Behavior
{
    public function admin(){
        if(!Yii::$app->user->isGuest) return true;
        else return false;
    }
    public function out($var){
        return '<pre>'.print_r($var, true).'<pre>';
    }
}