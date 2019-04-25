<?php 
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
?>
<section id='modal-form'>
	<?= Html::img('@img/delete-white.png', ['alt'=>'Закрыть форму', 'class'=>'close-modal']); ?>
	<div class='container'>
		<div class='content'>
			<?php $f=ActiveForm::begin(['action'=>'/admin/send-order']); ?>				
				<?= $f->field($orderForm, 'name')->textInput(['placeholder'=>'Имя родителя'])->label(''); ?>
				<?= $f->field($orderForm, 'phone')->textInput(['placeholder'=>'Номер телефона'])->label(''); ?>
				<?= $f->field($orderForm, 'email')->textInput(['placeholder'=>'E-mail'])->label(''); ?>
				<?= $f->field($orderForm, 'city')->textInput(['placeholder'=>'Ваш населенный пункт'])->label(''); ?>
				<?= $f->field($orderForm, 'age')->textInput(['placeholder'=>'Возраст ребенка'])->label(''); ?>
				<?= $f->field($orderForm, 'comment')->textarea(['placeholder'=>'Комментарий'])->label(''); ?>
				<?= $f->field($orderForm, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label('') ?>
				<?= Html::submitButton('Отправить'); ?>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</section>