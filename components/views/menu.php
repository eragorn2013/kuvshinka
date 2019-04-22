<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<?= Html::a('О нас', '#'); ?>
<?= Html::a('Условия посещения', '#'); ?>

<?php if($page=='news'): ?>
	<?= Html::a('Новости', '/news', ['class'=>'active']); ?>
<?php else: ?>
	<?= Html::a('Новости', '/news'); ?>
<?php endif; ?>

<?= Html::a('Галерея', '#'); ?>
<?= Html::a('Контакты', '#'); ?>