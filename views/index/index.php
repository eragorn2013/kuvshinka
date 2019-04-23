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
<?php if($news): ?>
<section id='news'>
    <?= Html::tag('h2', 'Последние новости'); ?>
    <div class='container'>
        <div class='content'>

            <?php foreach($news as $item): ?>
                <div class='item'>                    
                    <div class='img'>
                        <?php if($item->img): ?>
                            <?= Html::img('@img/news/'.$item->img, ['alt'=>$item->head, 'title'=>$item->head]); ?>
                        <?php else: ?>
                            <?= Html::img('@img/noimg.jpg', ['alt'=>$item->head, 'title'=>$item->head]); ?>
                        <?php endif; ?>
                    </div>
                    <div class='head'>
                        <?= Html::a(mb_strimwidth($item->head, 0, 41, '...'), '/news/'.$item->id); ?>
                    </div>
                    <div class='preview'>
                        <?= $item->preview ?>
                    </div>
                    <div class='date'>
                        <?= Yii::$app->formatter->asDate($item->date); ?>
                    </div>
                </div>
            <?php endforeach; ?>       
        </div>
    </div>
</section>
<?php endif; ?>
<section id='map'>
    <?= Html::tag('h2', 'Мы находимся'); ?>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aac180fddbd66b8e2e0cbfa617b62edc8791dcf9317893aa0964a411dc237dcc7&amp;source=constructor" width="100%" frameborder="0"></iframe>
</section>
