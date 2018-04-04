<?php


$this->title = 'Главная страница';

?>
<h1> Главная страница!</h1>
<div class="site-index">
    <?=yii\helpers\Url::to(Yii::$app->homeUrl.'?r=site/register&referer='.$user->referer, true)?>
    <button class="btn-default" onclick="location.href='index.php?r=site/logout'">Выйти</button>
</div>
