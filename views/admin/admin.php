<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php $this->registerCssFile('@css/login.css'); ?>
<section id='login'>
	<div class='container'>
		<div class='content'>
			<?php $f=ActiveForm::begin() ?>
				<?= $f->field($form, 'login')->textInput(['placeholder'=>'Логин'])->label(''); ?>
				<?= $f->field($form, 'password')->passwordInput(['placeholder'=>'Пароль'])->label(''); ?>
				<?= Html::submitButton('Войти'); ?>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</section>