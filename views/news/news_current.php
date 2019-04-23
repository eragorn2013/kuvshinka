<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;	

	$this->title=$news->head;
	$this->registerMetaTag(['name' => 'description', 'content' => $news->preview]);	

	$this->registerJsFile('@js/owlcarousel/docs/assets/owlcarousel/owl.carousel.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	$this->registerCssFile('@js/owlcarousel/docs/assets/owlcarousel/assets/owl.carousel.css');
	$this->registerCssFile('@js/owlcarousel/docs/assets/owlcarousel/assets/owl.theme.green.css');
?>
<section id='newscurrent'>
	<div class='container'>
		<div class='content'>
			<?= Html::tag('h1', $news->head) ?>
			<div class='date'><?= Yii::$app->formatter->asDate($news->date); ?></div>
			<?php if($news->img): ?>
				<?= Html::img('@img/news/'.$news->img, ['alt'=>$news->head, 'title'=>$news->head, 'class'=>'main-img']); ?>
			<?php endif; ?>
			<div class='text'>
				<?= $news->content; ?>
			</div>
			<div class='date'><?= Yii::$app->formatter->asDate($news->date); ?></div>
			<?php if($news->images): ?>
				<div class='images owl-carousel-5 owl-theme'>
					<?php foreach($news->images as $image): ?>
						<?= Html::a(Html::img('@img/news/'.$news->id.'/'.$image->img, ['alt'=>$image->alt, 'title'=>$image->alt]), '@img/news/'.$news->id.'/'.$image->img); ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?= Html::a('Назад к списку', Url::toRoute('/news'), ['class'=>'back-list']); ?>
	</div>
</section>