<h1>Регистрация</h1>
<?php if (isset($warning))
    echo "<div class=\"alert alert-warning\" role=\"alert\">".$warning." <button class=\"btn-default\" onclick=\"location.href='index.php?r=site/logout'\">Выйти</button></div>";
?>
<h2><?=isset($referer) ? 'вы пришли от пользователя '.$referer->login : null ?></h2>
<?php
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>

<?php $form = ActiveForm::begin();?>

<?= $form->field($model,'email')->textInput()?>

<?= $form->field($model,'password')->passwordInput()->label("Пароль")?>
<?= $form->field($model,'repeatPassword')->passwordInput()->label("Повторить пароль")?>

<div>
    <button class="btn btn-success" type="submit">Зарегистрироваться</button>
</div>
<br>
<?= \yii\helpers\Html::a( 'На главную', Yii::$app->homeUrl) ?>

<?php $form = ActiveForm::end();?>