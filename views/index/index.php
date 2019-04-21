<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<section id='offer'>
    <div class='container'>
        <div class='content'>
            <h1>Домашний детский клуб &ldquo;Кувшинка&rdquo; - <span>единственное в Наро-фоминском районе детское дошкольное учреждение с концепцией мягкой социализации ребенка.</span></h1>
            <?= Html::a('Записаться в кувшинку', '#', ['class'=>'call']); ?>            
        </div>
        <?= Html::img('@img/children.png', ['alt'=>'Домашний детский клуб "Кувшинка"', 'title'=>'Домашний детский клуб "Кувшинка"']); ?>
    </div>
</section>
<section id='advantages'>
    <div class='container'>
        <div class='content img'>
            <?= Html::img('@img/child.jpg', ['alt'=>'единственное в Наро-фоминском районе детское дошкольное учреждение с концепцией мягкой социализации ребенка', 'title'=>'единственное в Наро-фоминском районе детское дошкольное учреждение с концепцией мягкой социализации ребенка']) ?>
        </div>
        <div class='content items'>
            <?= Html::tag('h2', 'Наши преимущества'); ?>
            <div class='layer'>

                <div class='item'>
                    <div class='image'><?= Html::img('@img/1.png', ['alt'=>'Гарантированный результат адаптации ребенка за месяц']); ?></div>
                    <p>Гарантированный результат адаптации ребенка за месяц</p>
                </div>

                <div class='item'>
                    <div class='image'><?= Html::img('@img/2.png', ['alt'=>'Удобные формы оплаты, включая оплату картой']); ?></div>
                    <p>Удобные формы оплаты, включая оплату картой</p>
                </div>

                <div class='item'>
                    <div class='image'><?= Html::img('@img/3.png', ['alt'=>'Организованный досуг воспитанников, праздники']); ?></div>
                    <p>Организованный досуг воспитанников, праздники</p>
                </div>

                <div class='item'>
                     <div class='image'><?= Html::img('@img/4.png', ['alt'=>'Удобное расположение, комфортное пребывание в клубе']); ?></div>
                    <p>Удобное расположение, комфортное пребывание в клубе</p>
                </div>

            </div>
        </div>
    </div>
</section>
<section id='news'>
    <?= Html::tag('h2', 'Последние новости'); ?>
    <div class='container'>
        <div class='content'>

            <div class='item'>
                <div class='img'>
                    <?= Html::img('@img/news/1.jpg', ['alt'=>'Юные кулинары приготовили печенье']); ?>
                </div>
                <div class='head'>
                    <?= Html::a('Юные кулинары приготовили печение', '#'); ?>
                </div>
                <div class='preview'>
                    Ребята "Кувшинки" сегодня почувствовали себя настоящими кондитерами:  у нас в клубе состоялся полезный и творческий кулинарный мастер-класс.
                </div>
                <div class='date'>
                    21.04.2019
                </div>
            </div>

            <div class='item'>
                <div class='img'>
                    <?= Html::img('@img/news/1.jpg', ['alt'=>'Юные кулинары приготовили печенье']); ?>
                </div>
                <div class='head'>
                    <?= Html::a('Юные кулинары приготовили печение', '#'); ?>
                </div>
                <div class='preview'>
                    Ребята "Кувшинки" сегодня почувствовали себя настоящими кондитерами:  у нас в клубе состоялся полезный и творческий кулинарный мастер-класс.
                </div>
                <div class='date'>
                    21.04.2019
                </div>
            </div>

            <div class='item'>
                <div class='img'>
                    <?= Html::img('@img/news/1.jpg', ['alt'=>'Юные кулинары приготовили печенье']); ?>
                </div>
                <div class='head'>
                    <?= Html::a('Юные кулинары приготовили печение', '#'); ?>
                </div>
                <div class='preview'>
                    Ребята "Кувшинки" сегодня почувствовали себя настоящими кондитерами:  у нас в клубе состоялся полезный и творческий кулинарный мастер-класс.
                </div>
                <div class='date'>
                    21.04.2019
                </div>
            </div>

        </div>
    </div>
</section>
<section id='map'>
    <?= Html::tag('h2', 'Мы находимся'); ?>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aac180fddbd66b8e2e0cbfa617b62edc8791dcf9317893aa0964a411dc237dcc7&amp;source=constructor" width="100%" frameborder="0"></iframe>
</section>
