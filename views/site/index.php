<?php


$this->title = 'Главная страница';

?>
<h1> Главная страница пользователя <?=$user->login?></h1>
<h2><?php if (isset($refererUser)) echo "Пользователь зарегистрирован от ".$refererUser->login; ?></h2>
<div class="container">
    <h2>Реферальная ссылка:</h2>
    <h4><?=yii\helpers\Url::to(Yii::$app->homeUrl.'?r=site/register&referer='.$user->referer, true)?></h4>
    <?php if (!empty($referrals)) echo "<h3>Рефералы</h3>" ?>
    <ul><?php if (isset($referrals)) foreach ($referrals as $ref) echo "<li>".$ref->login."</li>"; ?></ul>
    <button class="btn-default" onclick="location.href='index.php?r=site/logout'">Выйти</button>

</div>
