<section id='order'>
	<div class='container'>
		<h1 style='background: #80166f; text-transform: uppercase; color: #fefefe; padding: 20px; margin: 0'>Новый заказ обратного звонка с сайта</h1>
		<div style='
			background-color: #f9f9f9; 
			padding: 20px; 
			margin: 0 auto;			
		' class='content'>			
			<p><b>Заказ №:</b> <?= $id ?></p>
			<p><b>Имя родителя:</b> <?= $name ?></p>
			<p><b>Телефон:</b> <?= $phone ?></p>
			<p><b>Email:</b> <?= $email ?></p>
			<p><b>Населенный пункт:</b> <?= $city ?></p>
			<p><b>Имя и возраст ребенка:</b> <?= $age ?></p>
			<p><b>Комментарий:</b> <?= $comment ?></p>
			<p style='margin-top: 15px; font-weight: bold;'>Чтобы получить список истории заказов, обратитесь к разработчику вашего сайта</p>
		</div>
	</div>
</section>