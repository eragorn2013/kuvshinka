<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<?php if($page=='aboutus'): ?>
	<?= Html::a('О нас', '/aboutus', ['class'=>'active']); ?>
<?php else: ?>
	<?= Html::a('О нас', '/aboutus'); ?>
<?php endif; ?>

<?php if($page=='conditions'): ?>
	<?= Html::a('Условия посещения', '/conditions', ['class'=>'active']); ?>
<?php else: ?>
	<?= Html::a('Условия посещения', '/conditions'); ?>
<?php endif; ?>

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

<?php if($page=='contacts'): ?>
	<?= Html::a('Контакты', '/contacts', ['class'=>'active']); ?>
<?php else: ?>
	<?= Html::a('Контакты', '/contacts'); ?>
<?php endif; ?>
