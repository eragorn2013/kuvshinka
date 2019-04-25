<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<section id='seo'>
	<div class='container'>
		<div class='content'>
			<?php $s=ActiveForm::begin(['action'=>'/admin/update-seo/'.$seo->id]); ?>
				<?= $s->field($seo, 'title')->textInput(['placeholder'=>'title', 'title'=>'title'])->label(''); ?>
				<?= $s->field($seo, 'description')->textInput(['placeholder'=>'description', 'title'=>'description'])->label(''); ?>
				<?= $s->field($seo, 'keywords')->textInput(['placeholder'=>'keywords', 'title'=>'keywords'])->label(''); ?>
				<?= Html::submitButton('Сохранить') ?>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</section>