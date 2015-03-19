<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\models\PrLang;
use \app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Tooltips */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Tooltips', 'url' => ['index']];
if($model->pr_lang_id){
    $this->params['breadcrumbs'][] = ['label' => PrLang::findOne($model->pr_lang_id)->name, 'url' => ['index','pr_lang_id'=>$model->pr_lang_id]];
}
if($model->category_id){
    $this->params['breadcrumbs'][] = ['label' => Categories::findOne($model->category_id)->name, 'url' => ['index','category_id'=>$model->category_id]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tooltips-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1><?= $model->title ?></h1>
    <button class="copy-btn" data-clipboard-text="<?= $model->code;?>" title="Click to copy"></button>
    <pre><code class="<?= mb_strtolower(PrLang::findOne($model->pr_lang_id)->name)?>"><?= $model->code;?></code></pre>
    <?php
    $language = PrLang::findOne($model->pr_lang_id);
    $category = Categories::findOne($model->category_id);
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=> 'Language',
                'value' => $language?$language->name:''
            ],
            [
                'label'=> 'Category',
                'value' => $category?$category->name:''
            ],
        ],
    ]) ?>

</div>
<?php

$js = <<<JS
        var client = new ZeroClipboard($('.copy-btn'));
        client.on("ready", function (readyEvent) {
            client.on("aftercopy", function (event) {
                //showCopied(event.target);
            });
        });

JS;
$this->registerJs($js);
?>
