<h1>Войдите</h1>
<?php
use yii\widgets\ActiveForm;

$this->title = "Авторизация";
?>
<?php $form = ActiveForm::begin();?>

<?= $form->field($model,'email')->textInput()?>

<?= $form->field($model,'password')->passwordInput()?>

<div>
    <button class="btn btn-success" type="submit">Войти</button>
</div>
<br>
<?= yii\helpers\Html::a('Зарегистрироваться', 'index.php?r=site/register' ) ?>

<?php $form = ActiveForm::end();?>