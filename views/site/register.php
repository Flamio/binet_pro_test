<h1>Регистрация</h1>
<h2><?=isset($referer) ? 'вы пришли от пользователя '.$referer->login : null ?></h2>
<br>
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
<?= \yii\helpers\Html::a( 'Назад', Yii::$app->request->referrer) ?>

<?php $form = ActiveForm::end();?>