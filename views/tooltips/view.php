<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\models\PrLang;
use \app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Tooltips */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tooltips', 'url' => ['index']];
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
    <pre><code class="<?= mb_strtolower(PrLang::findOne($model->pr_lang_id)->name)?>"><?= $model->code;?></code></pre>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=> 'Language',
                'value' => PrLang::findOne($model->pr_lang_id)->name
            ],
            [
                'label'=> 'Category',
                'value' => Categories::findOne($model->category_id)->name
            ],
        ],
    ]) ?>

</div>
