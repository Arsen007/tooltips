<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\PrLang;
use \app\models\Categories;


/* @var $this yii\web\View */
/* @var $model app\models\Tooltips */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tooltips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pr_lang_id')->dropDownList(ArrayHelper::map(PrLang::find()->all(), 'id', 'name'),['prompt'=>'Select Language']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name'),['prompt'=>'Select category']) ?>

    <?= $form->field($model, 'code')->textarea(['rows' => 15]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
