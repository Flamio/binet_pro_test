<h1>Зарегистрируйтесь</h1>
<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?>

<?= $form->field($model,'email')->textInput()?>

<?= $form->field($model,'password')->passwordInput()?>
<?= $form->field($model,'repeatPassword')->passwordInput()?>

<div>
    <button class="btn btn-success" type="submit">Зарегистрироваться</button>
    <?= \yii\helpers\Html::a( 'Назад', Yii::$app->request->referrer) ?>
</div>

<?php $form = ActiveForm::end();?>