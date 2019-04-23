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

<?php if($page=='gallery'): ?>
	<?= Html::a('Галерея', '/gallery', ['class'=>'active']); ?>
<?php else: ?>
	<?= Html::a('Галерея', '/gallery'); ?>
<?php endif; ?>

<?= Html::a('Контакты', '#'); ?>