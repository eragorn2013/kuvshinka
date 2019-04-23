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
use app\models\Gallery;

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
                $mainImg=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/'.$news->img;
                if(file_exists($mainImg)) unlink($mainImg);
            }            
            $images=Images::find()->where(['id_news'=>$id])->all();
            if($images){
                foreach($images as $image){
                    $img=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/'.$id.'/'.$image->img;
                    if(file_exists($img)) unlink($img);
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

    public function actionAddPhotoNews($id){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']);

        $id=(int)$id;        
        $image=new Images();

        if($image->load(Yii::$app->request->post()) && $image->validate())
        {
            $image->img = UploadedFile::getInstance($image, 'img');           
            if($image->img)
            {               
                $nameFile=$id.'-'.md5($image->img->name).'.jpg';
                $fullPathDir=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/'.$id;
                $fullPathFile=$fullPathDir.'/'.$nameFile;
                $relativePathFile='/web/img/news/'.$id.'/'.$nameFile;
                if(!file_exists($fullPathDir)) FileHelper::createDirectory($fullPathDir);
                $img=Images::findOne(['id_news'=>$id, 'img'=>$nameFile]);
                if($img) exit(json_encode(['error'=>true, 'message'=>'Файл с таким названием уже существует']));
                $image->img->saveAs($fullPathFile);
                $image->img=$nameFile;
                $image->id_news=$id;
                $image->save();
            }
        }
        exit(json_encode(['error'=>false, 'img'=>$relativePathFile]));
    }

    public function actionDeletePhotoNews(){
        if(!$this->admin()) return Yii::$app->response->redirect(['/news']);        

        if(!Yii::$app->request->isAjax) exit(json_encode(['error'=>true, 'message'=>'Запрос отправлен как-то неправильно']));
        $id=(int)Yii::$app->request->post('id');
        $image=Images::findOne($id);

        $fullPathDir=$_SERVER['DOCUMENT_ROOT'].'/web/img/news/'.$image->id_news;
        $fullPathFile=$fullPathDir.'/'.$image->img;        

        if(file_exists($fullPathFile)) unlink($fullPathFile);
        $image->delete();

        exit(json_encode(['error'=>false]));
    }

    public function actionExit(){
        Yii::$app->user->logout();
         return Yii::$app->response->redirect(['/']);
    }

    public function actionAddImage(){
        if(!$this->admin()) return Yii::$app->response->redirect(['/gallery']);

        $gallery=new Gallery();

        if($gallery->load(Yii::$app->request->post()) && $gallery->validate())
        {           
            $gallery->name = UploadedFile::getInstance($gallery, 'name');           
            if($gallery->name)
            {               
                $nameFile=md5($gallery->name).'.jpg';
                $fullPathDir=$_SERVER['DOCUMENT_ROOT'].'/web/img/gallery';
                $fullPathFile=$fullPathDir.'/'.$nameFile;                
                $img=Gallery::findOne(['name'=>$nameFile]);
                if($img){
                    Yii::$app->session->setFlash('message', 'Файл с таким именем уже существует');
                    return Yii::$app->response->redirect(['/gallery']);
                }
                $gallery->name->saveAs($fullPathFile);
                $gallery->name=$nameFile;               
                $gallery->save();
            }
        }
        return Yii::$app->response->redirect(['/gallery']);
    }
    public function actionDeleteImage($id){
        if(!$this->admin()) return Yii::$app->response->redirect(['/gallery']);
        $id=(int)$id;
        $image=Gallery::findOne($id);

        $fullPathDir=$_SERVER['DOCUMENT_ROOT'].'/web/img/gallery';
        $fullPathFile=$fullPathDir.'/'.$image->name;

        if(file_exists($fullPathFile)) unlink($fullPathFile);

        $image->delete();

        return Yii::$app->response->redirect(['/gallery']);
    }
}