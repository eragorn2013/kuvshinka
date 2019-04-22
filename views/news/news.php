<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;	
	use vova07\imperavi\Widget;	
?>
<section id="newspage">
	<div class='container'>
		<?= Html::tag('h2', 'Новости'); ?>
		<?php if($admin): ?>
			<?= Html::a('Добавить новость', '/admin/news/add-news', ['class'=>'admin-button']); ?>
		<?php endif; ?>		
		<div class='content'>
			<?php if($news): ?>
				<?php foreach($news as $item): ?>

					<div class='item'>
		                <div class='img'>
		                	<?php if($item->img): ?>
		                		 <?= Html::img('@img/news/'.$item->img, ['alt'=>$item->head]); ?>
		                	<?php else: ?>
		                		<?= Html::img('@img/noimg.jpg', ['alt'=>$item->head]); ?>
		                	<?php endif; ?>		                   
		                </div>
		                <div class='head'>
		                    <?= Html::a($item->head, Url::toRoute(['/news/'.$item->id])); ?>
		                </div>
		                <div class='preview'>
		                    <?= $item->preview; ?>
		                </div>
		                <div class='date'>
		                    <?= Yii::$app->formatter->asDate($item->date); ?>
		                </div>
		                <?php if($admin): ?>
		                	<div class='admin-edit'>
		                		<?= Html::a(Html::img('@img/edit.png', ['alt'=>'Редактировать новость', 'title'=>'Редактировать новость', 'data-id'=>$item->id, 'class'=>'edit-news']), '#'); ?>
		                		<?= Html::a(Html::img('@img/delete.png', ['alt'=>'Удалить новость', 'title'=>'Удалить новость']), '/admin/news/drop-news/'.$item->id, ['class'=>'drop-news']); ?>
		                		<?php if($item->active): ?>
		                			<?= Html::tag('span', '', ['class'=>'green', 'title'=>'Новость опубликована']) ?>
		                		<?php else: ?>
		                			<?= Html::tag('span', '', ['class'=>'red', 'title'=>'Новость не опубликована']) ?>
		                		<?php endif; ?>		                		
		                	</div>
		                <?php endif; ?>
		            </div>

				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php if($news && $admin): ?>
	<?php foreach($news as $item): ?>
		<section class='admin-edit-news' id='admin-edit-news-<?= $item->id ?>'>
			<?= Html::img('@img/delete.png', ['alt'=>'Закрыть окно', 'title'=>'Закрыть окно', 'class'=>'close-modal', 'data-id'=>$item->id]); ?>
			<div class='container'>
				<div class='content'>
					<?php $form=ActiveForm::begin(['action'=>'/admin/update-news/'.$item->id, 'options'=>['enctype' => 'multipart/form-data']]); ?>

						<div class='image'>
							<?= Html::a(Html::img('@img/delete.png', ['alt'=>'Удалить фото', 'title'=>'Удалить фото', 'class'=>'deleteImage']), Url::toRoute(['/admin/news/delete-mainimage/'.$item->id])); ?>
							<?php if($item->img): ?>
								<?= Html::img('@img/news/'.$item->img, ['alt'=>$item->head]) ?>
							<?php else: ?>
								<?= Html::img('@img/noimg.jpg', ['alt'=>'Без изображения']) ?>
							<?php endif; ?>									
							<?= $form->field($item, 'img')->fileInput()->label(''); ?>
						</div>

						<div class='fields'>
							<?= $form->field($item, 'head')->textInput(['placeholder'=>'Заголовок новости', 'title'=>'Заголовок новости'])->label(''); ?>
							<?= $form->field($item, 'preview')->textarea(['placeholder'=>'Превью новости', 'title'=>'Превью новости', 'maxlength'=>"200"])->label(''); ?>
							<?= $form->field($item, 'content')->textarea(['class'=>'content-news', 'placeholder'=>'Текст новости', 'title'=>'Текст новости'])->label(''); ?>
							<?= $form->field($item, 'date')->textInput(['placeholder'=>'Дата добавления', 'title'=>'Дата добавления'])->label(''); ?>
							<?php
								if($item->active) $checked=true;
								else $checked=false;								
							?>
							<?= $form->field($item, 'active')->checkbox(['checked '=>$checked]); ?>
							<?= Html::submitButton('Сохранить'); ?>
						</div>
						
					<?php ActiveForm::end(); ?>

					<div class='album'>
						<?php $f=ActiveForm::begin(['action'=>'/admin/news/add-photo/'.$item->id, 'options'=>['enctype' => 'multipart/form-data', 'class'=>'submit-form-photos']]); ?>
							<?= $f->field($images, 'alt')->textInput(['placeholder'=>'Описание изображения'])->label(''); ?>
							<?= $f->field($images, 'img')->fileInput()->label(''); ?>
							<?= Html::submitButton('Добавить'); ?>
						<?php ActiveForm::end(); ?>
						
						<div class='images'>
							<?php if($item->images): ?>																	
									<?php foreach($item->images as $img): ?>
										<div class='item'>
											<div class='layer'>
												<?= Html::a(Html::img('@img/news/'.$img->id_news.'/'.$img->img), '@img/news/'.$img->id_news.'/'.$img->img, ['class'=>'img']); ?>		
											</div>
											<?= Html::img('@img/delete.png', ['class'=>'delete-img', 'data-id'=>$img->id]); ?>
										</div>
									<?php endforeach; ?>									
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>		
	<?php endforeach; ?>
<?php endif; ?>
<?php
if($news && $admin){
	echo \vova07\imperavi\Widget::widget([
	    'selector' => '.content-news',
	    'settings' => [
	        'lang' => 'ru',
	        'minHeight' => 200,
	        'plugins' => [
	            'clips',
	            'fullscreen',
	        ],
	        'clips' => [		            
	            ['red', '<span class="label-red">red</span>'],
	            ['green', '<span class="label-green">green</span>'],
	            ['blue', '<span class="label-blue">blue</span>'],
	        ],
	    ],
	]);		
}
?>
