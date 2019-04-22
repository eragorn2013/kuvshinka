<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\components\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <header>
        <div class='container'>
            <div class='content info'>
                <div class='item logo'>
                    <?= Html::a(Html::img('@img/logo-color.png', ['alt'=>'Домашний детский клуб кувшинка', 'title'=>'Переход на главную']), Url::toRoute(['/'])); ?>
                </div>
                <div class='layer'>
                    <div class='item phone'>
                        <?= Html::a('8 (916) 721-84-85', 'tel:79167218485', ['class'=>'telephone']) ?>
                        <?= Html::tag('span', '&laquo;У нас хорошо, как дома&raquo;', ['class'=>'tagline']) ?>
                    </div>
                    <div class='item social'>
                        <div class='point question'>
                            <?= Html::a('Задать вопрос', '#'); ?>
                        </div>
                        <div class='point links'>
                            <?= Html::a(Html::img('@img/inst-color.png', ['alt'=>'Ссылка на социальную сеть Инстаграм', 'title'=>'Ссылка на социальную сеть инстаграм']), '#'); ?>
                            <?= Html::a(Html::img('@img/vk-color.png', ['alt'=>'Ссылка на социальную сеть Вконтакте', 'title'=>'Ссылка на социальную сеть Вконтакте']), '#'); ?>
                            <?= Html::a(Html::img('@img/fb-color.png', ['alt'=>'Ссылка на социальную сеть Фэйсбук', 'title'=>'Ссылка на социальную сеть Фэйсбук']), '#'); ?>
                        </div>
                    </div>
                </div>                
            </div>
            <div class='content menu'>
                <?= Html::img('@img/menu.png', ['alt'=>'Мобильное меню', 'title'=>'Мобильное меню', 'id'=>'menu']); ?>
            </div>
            <div class='content nav'>                
                <?= Menu::widget(['page'=>Yii::$app->request->pathInfo]); ?>
            </div>
        </div>
    </header>

    <?= $content ?> 

    <footer>
        <div class='container'>
            <div class='content'>
                <div class='item logo'>
                    <?= Html::img('@img/logo-white.png', ['alt'=>'Поступление в "Кувшинку" возможно в любой период календарного года при наличии мест']); ?>
                </div>
                <div class='item nav'>
                    <?= Html::a('О нас', '#'); ?>
                    <?= Html::a('Условия посещения', '#'); ?>
                    <?= Html::a('Новости', '#'); ?>
                    <?= Html::a('Галерея', '#'); ?>
                    <?= Html::a('Контакты', '#'); ?>
                </div>
                <div class='item contacts'>
                    <?= Html::a('8 (916) 721-84-85', 'tel:79167218485', ['class'=>'telephone']) ?>
                    <span class='time'>Время работы ПН-ПТ с <b>08:00</b> до <b>19:00</b></span>
                    <span class='weekends'>СБ-ВС выходной</span>
                </div>
                <div class='item social'>
                    <?= Html::a(Html::img('@img/inst-white.png', ['alt'=>'Ссылка на социальную сеть Инстаграм', 'title'=>'Ссылка на социальную сеть инстаграм']), '#'); ?>
                    <?= Html::a(Html::img('@img/vk-white.png', ['alt'=>'Ссылка на социальную сеть Вконтакте', 'title'=>'Ссылка на социальную сеть Вконтакте']), '#'); ?>
                    <?= Html::a(Html::img('@img/fb-white.png', ['alt'=>'Ссылка на социальную сеть Фэйсбук', 'title'=>'Ссылка на социальную сеть Фэйсбук']), '#'); ?>
                </div>
            </div>
        </div>
    </footer>    
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
