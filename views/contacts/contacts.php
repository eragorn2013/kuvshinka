<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
	use app\components\SeoData;

	$this->title=$seoData->title;
    $this->registerMetaTag(['name' => 'description', 'content' => $seoData->description]); 
    $this->registerMetaTag(['name' => 'keywords', 'content' => $seoData->keywords]);

?>
<section id='contacts'>
	<div class='container'>
		<?= Html::tag('h1', 'Контакты'); ?>
		<?php if(Yii::$app->session->hasFlash('message')): ?>
			<p class='message'><?= Yii::$app->session->getFlash('message') ?></p>
		<?php endif; ?>
		<div class='content'>

			<div class='item form'>
				<?php $form=ActiveForm::begin(['action'=>'/admin/send-order']); ?>
					<?= Html::tag('h3', 'Запись в детский клуб'); ?>
					<?= $form->field($order, 'name')->textInput(['placeholder'=>'Имя родителя'])->label(''); ?>
					<?= $form->field($order, 'phone')->textInput(['placeholder'=>'Номер телефона'])->label(''); ?>
					<?= $form->field($order, 'email')->textInput(['placeholder'=>'E-mail'])->label(''); ?>
					<?= $form->field($order, 'city')->textInput(['placeholder'=>'Ваш населенный пункт'])->label(''); ?>
					<?= $form->field($order, 'age')->textInput(['placeholder'=>'Имя и возраст ребенка'])->label(''); ?>
					<?= $form->field($order, 'comment')->textarea(['placeholder'=>'Комментарий'])->label(''); ?>
					<?= $form->field($order, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label('') ?>
					<?= Html::submitButton('Отправить'); ?>
				<?php ActiveForm::end(); ?>
			</div>

			<div class='item text'>
				<p><b>Домашний</b> детский клуб "Кувшинка" в Алабино</p>
				<p>Московская область, Наро-фоминский район, дер. Алабино, ул. Санаторная, дом 37 (Киевской шоссе)</p>
				<p>тел. <span class='bold'>+7 916 721 84 85</span></p>
				<p>detsad.kuvshinka@gmail.com</p>
				<p><?= Html::a('vk.com/kuvshinkaclub', 'https://vk.com/kuvshinkaclub', ['target'=>'_blank']); ?></p>
				<p><?= Html::a('@kuvshinkaclub', 'https://www.instagram.com/kuvshinkaclub/', ['target'=>'_blank']); ?></p>
				<p><b>В целях безопасности</b> детей экскурсии для родителей по детскому саду проводятся по заранее согласованной договоренности с руководителем</p>
			</div>

		</div>
	</div>
</section>
<section id='map'>
    <?= Html::tag('h2', 'Мы находимся'); ?>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aac180fddbd66b8e2e0cbfa617b62edc8791dcf9317893aa0964a411dc237dcc7&amp;source=constructor" width="100%" frameborder="0"></iframe>
</section>
<?php if($admin): ?>
    <?= SeoData::widget(['id'=>6]); ?>
<?php endif; ?>