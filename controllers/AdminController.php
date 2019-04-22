<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use app\models\User;
use app\components\Behaviors;
use app\models\News;
use app\models\Images;

class AdminController extends Controller
{
	public function behaviors(){
        return [Behaviors::className()];           
    }  		
    public function actionIndex()
    {
    	$user=new User();
    	if(!Yii::$app->user->isGuest) return Yii::$app->response->redirect(['/']);			
		if($user->load(Yii::$app->request->post()) && $user->validate()){		
			if(!Yii::$app->user->isGuest) return Yii::$app->response->redirect(['/']);				
		}
        return $this->render('admin', ['form'=>$user]);
    } 
    public function actionAddNews(){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']); 

        $news=new News();
        $news->img='';
        $news->head='Заголовок новости';
        $news->content='Текст новости';
        $news->preview='Превью новости';
        $news->date=date('Y-m-d');
        $news->active=0;
        $news->save();

        return Yii::$app->response->redirect(['/news']); 
    } 

    public function actionDropNews($id){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']);

        $id=(int)$id;
        $news=News::findOne($id);
        if($news){
            if($news->img){
                $mainImg=$_SERVER['DOCUMENT_ROOT'].'/web/news/'.$news->img;
                if(file_exists($mainImg)) unlink($mainImg);
            }
            $images=Images::find()->where(['id_news'=>$id])->all();
            if($images){
                foreach($images as $image){
                    $img=$_SERVER['DOCUMENT_ROOT'].'/web/news/'.$id.'/'.$image->img;
                    if(file_exists($img)) inlink($img);
                    $image->delete();
                }
            } 
            $news->delete();           
        }
        return Yii::$app->response->redirect(['/news']);
    } 

    public function actionUpdateNews($id){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']);

        $id=(int)$id;
        $news=News::findOne($id);
        $oldImg=$news->img; 
        if(!$news) return Yii::$app->response->redirect(['/news']);

        if($news->load(Yii::$app->request->post()) && $news->validate())
        {               
            $news->img = UploadedFile::getInstance($news, 'img');
            if($news->img){
                $path=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/';                       
                if($oldImg){                   
                    if(file_exists($path.$oldImg)) unlink($path.$oldImg);
                }
                $news->img->saveAs($path.$id.'-'.md5($news->img->name).'.jpg'); 
                $news->img=$id.'-'.md5($news->img->name).'.jpg';                       
            }
            else $news->img=$oldImg;           
            $news->update();            
        }
        return Yii::$app->response->redirect(['/news']);
    }

    public function actionDeleteMainimage($id){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']);

        $id=(int)$id;
        $news=News::findOne(['id'=>$id]);
        $path=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/';
        if($news->img){
            if(file_exists($path.$news->img)) unlink($path.$news->img);
        }
        $news->img='';
        $news->update();
        return Yii::$app->response->redirect(['/news']);
    }
}