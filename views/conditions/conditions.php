<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use app\components\SeoData;

	$this->title=$seoData->title;
    $this->registerMetaTag(['name' => 'description', 'content' => $seoData->description]); 
    $this->registerMetaTag(['name' => 'keywords', 'content' => $seoData->keywords]);
?>
<section id='conditions'>
	<div class='container'>
		<div class='content'>
			<?= Html::tag('h1', 'Условия посещения') ?>
			<p class="info">"Кувшинка" работает круглый год 5 дней в неделю кроме выходных и государственных праздников с 8 до 19 часов</p>
			<?= Html::img('@img/conditions.jpg', ['alt'=>'Условия посещения', 'title'=>'Условия посещения']); ?>

			<?= Html::tag('h2', 'Условия приема') ?>
			<p class="bold">В детский сад принимаются малыши с 2-х лет (индивидуально может быть рассмотрен вариант с 1 года 10 месяцев).</p>
			<p>Для поступления необходимо получить медицинские документы:</p>
			<ul>
				<li>
					Результаты анализов:
					<ul>
						<li>яйце-глист;</li>
						<li>энтеробиоз</li>
					</ul>
				</li>
				<li>Справка от педиатра</li>
				<li>Выписка из прививочной карты</li>
			</ul>
			<p>Родитель предоставляет копии документов для заключения договора. Подписание договора означает согласие с Правилами детского сада.</p>

			<hr>

			<?= Html::tag('h2', 'Условия пребывания') ?>
			<ul>
				<li>Отдельная игровая комната;</li>
				<li>Санузел, оборудованный горшочками и накладками на унитаз для каждого ребенка, личным полотенцем для рук;</li>
				<li>Спальня;</li>
				<li>Раздевалка с индивидуальным шкафчиком для каждого ребенка;</li>
				<li>Обеденная зона</li>
			</ul>

			<hr>

			<?= Html::tag('h2', 'Почему мы?') ?>
			<ul>
				<li>Расположение в хорошо обустроенном частном коттедже;</li>
				<li>Удобная транспортная доступность;</li>
				<li>Собственная огороженная территория с двумя детскими комплексами, песочницами, стационарной верандой-навесом;</li>
				<li>Небольшие группы, индивидуальный подход;</li>
				<li>Разнообразное домашнее детское меню,  продукты высокого качества;</li>
				<li>Использование при приготовлении пищи воды, фильтрованной по системе "обратный осмос" (США);</li>
				<li>Просторная игровая комната;</li>
				<li>Использование встроенной системы пылеудаления (встроенного пылесоса), разработанного для аллергиков;</li>
				<li>Реализация программы профилактики простудных заболеваний (в холодное время года);</li>
			</ul>

			<hr>

			<?= Html::tag('h2', 'Формы посещения') ?>
			<div class='forms'>
				<div class="item">
					<?= Html::tag('h3', 'ПОЛНЫЙ ДЕНЬ (8 - 19 часов)'); ?>
					<p class="bold">Входит:</p>
					<ul>
						<li>5-ти разовое питание (основные приемы пищи + второй завтрак и полдник)</li>
						<li>участие в детских тематических, сезонных праздниках, днях рождения; просмотр спектаклей театральных коллективов, анимационных программ.</li>
						<li>дневной сон</li>
						<li>2 прогулки в день на свежем воздухе </li>
						<li>организация досуга, развитие</li>
					</ul>
				</div>
				<div class="item">
					<?= Html::tag('h3', 'СОКРАЩЕННЫЙ ДЕНЬ (8 - 16:30 часов)'); ?>
					<p class="bold">Входит:</p>
					<ul>
						<li>4-х разовое питание (основные приемы пищи + второй завтрак и полдник)</li>
						<li>участие в детских тематических, сезонных праздниках, днях рождения; просмотр спектаклей театральных коллективов, анимационных программ.</li>
						<li>дневной сон</li>
						<li>1 прогулка в день на свежем воздухе</li>
						<li>организация досуга, развитие</li>
					</ul>
				</div>
				<div class="item">
					<?= Html::tag('h3', 'ПОЛОВИНА ДНЯ (8 - 12:30 часов)'); ?>
					<p class="bold">Входит:</p>
					<ul>
						<li>3-х разовое питание (завтрак, второй завтрак, обед)</li>
						<li>участие в детских тематических, сезонных праздниках, днях рождения; просмотр спектаклей театральных коллективов, анимационных программ.</li>
						<li>1 прогулка в день на свежем воздухе под присмотром воспитателя и няни.</li>
						<li>организация досуга, развитие</li>
					</ul>
					<p class='bold italic'>Данная форма посещения действует только на летний период.</p>
				</div>
				<div class="item">
					<h3>АБОНЕМЕНТНАЯ СИСТЕМА <span class='small'>(только для детей с 4-х лет)</span></h3>
					<p>Абонемент на необходимое вам количество дней в месяце:</p>
					<ul>
						<li>12 посещений</li>
						<li>16 посещений</li>
						<li>20 посещений</li>
					</ul>
					<p class='bold italic'>Данная форма посещения возможна только для детей с 4-х лет. До этого возраста для успешной адаптации ребенка к детскому учреждению мы предлагаем только систематическое ежедневное посещение.</p>
				</div>
			</div>

			<hr>

			<?= Html::tag('h2', 'Наши правила') ?>
			<ul>
				<li>Самое главное правило: заболевший ребенок должен остаться дома. В случае болезни необходимо сообщить нам об этом</li>
				<li>Возвращение после болезни - только со справкой от педиатра</li>
				<li>Для ребенка важно, чтобы его забирали вовремя. Если вы не успеваете забрать малыша ко времени закрытия садика, вы можете воспользоваться услугой "дополнительный час" (за оплату)</li>
				<li>У ребенка в шкафу должно быть несколько комплектов сменной одежды (колготы, трусики, носочки)</li>
				<li>Каждый малыш должен иметь удобную сменную обувь.</li>
				<li>В клубе разрешены домашние игрушки только на период адаптации (привыкания) ребенка.</li>
			</ul>
		</div>
	</div>
</section>
<?php if($admin): ?>
    <?= SeoData::widget(['id'=>3]); ?>
<?php endif; ?>