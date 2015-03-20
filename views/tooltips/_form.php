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

    <?= $form->field($model, 'code')->textarea(['rows' => 15,'style'=>'display:none'])->label('') ?>
    <pre id="editor" style="height: 400px;"><?= Html::encode($model->code)?></pre>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$js = <<<JS
        ace.require("ace/ext/chromevox");
        ace.require("ace/ext/emmet");

        var editor = ace.edit("editor");
        if($('#tooltips-pr_lang_id option:selected').val() != ''){
            editor.session.setMode({path:"ace/mode/"+$('#tooltips-pr_lang_id option:selected').text().toLowerCase(), inline:true});
        }

        editor.setTheme("ace/theme/tomorrow");
        $(document).on('change','#tooltips-pr_lang_id',function(){
            var selectedElement = $(this).find(':selected');
            if(selectedElement.val() != ''){
                editor.session.setMode({path:"ace/mode/"+selectedElement.text().toLowerCase(), inline:true});
            }
        });

        $(document).on('keyup','#editor',function(){
            $('#tooltips-code').text(editor.getSession().getValue());
        });

        $('#tooltips-code');
JS;
$this->registerJs($js);
?>