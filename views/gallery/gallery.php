<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;	
	use app\components\SeoData;

	$this->title=$seoData->title;
    $this->registerMetaTag(['name' => 'description', 'content' => $seoData->description]); 
    $this->registerMetaTag(['name' => 'keywords', 'content' => $seoData->keywords]);		
?>
<section id='gallery'>
	<div class='container'>
		<?= Html::tag('h1', 'Галерея'); ?>
		<?php if($admin): ?>
			<?php if(Yii::$app->session->hasFlash('message')): ?>
				<p id='message'><?= Yii::$app->session->getFlash('message'); ?></p>
			<?php endif; ?>
		<?php endif; ?>
		<?php if($admin): ?>
			<?php $form=ActiveForm::begin(['action'=>'/admin/gallery/add-img', 'options'=>['enctype' => 'multipart/form-data']]); ?>
				<?= $form->field($gallery, 'alt')->textInput(['placeholder'=>'Описание к изображению'])->label(''); ?>
				<?= $form->field($gallery, 'name')->fileInput()->label(''); ?>
				<?= Html::submitButton('Добавить', ['class'=>'admin-button']); ?>					
			<?php ActiveForm::end(); ?>
		<?php endif; ?>	
		<div class='content <?php if(!$admin): ?>gallery<?php endif; ?>'>			
			<?php if($images): ?>
				<?php foreach($images as $img): ?>
					<?php if($admin): ?>
						<div class='item'>
							<a class='item-link-admin' target='_blank' href='/web/img/gallery/<?= $img->name ?>'>
								<?= Html::img('@img/gallery/'.$img->name, ['alt'=>$img->alt, 'title'=>$img->alt, 'class'=>'img']); ?>				
							</a>							
							<a class='delete' href="/admin/gallery/delete-image/<?= $img->id ?>">
								<?= Html::img('@img/delete.png', ['alt'=>'Удалить изображение','title'=>'Удалить изображение']); ?>
							</a>						
						</div>	
					<?php else: ?>
						<a class='item-link' href='/web/img/gallery/<?= $img->name ?>'>
							<?= Html::img('@img/gallery/'.$img->name, ['alt'=>$img->alt, 'title'=>$img->alt, 'class'=>'img']); ?>						
						</a>
					<?php endif; ?>									
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php if($admin): ?>
    <?= SeoData::widget(['id'=>5]); ?>
<?php endif; ?>