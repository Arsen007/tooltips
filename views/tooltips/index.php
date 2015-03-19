<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Block;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TooltipsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tooltips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tooltips-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tooltips', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Block::begin(array('id' => 'sidebar')); ?>
    <div class="col-sm-3 col-md-12 sidebar">
        <form action="">
            <?php
            $params = Yii::$app->request->getQueryParams();
            foreach($params as $name=>$value){
                if($name == 'title')
                    continue;

                echo Html::hiddenInput($name,$value);
            }
            ?>
            <input type="text" class="form-control" placeholder="Title.." name="title" value="<?= Yii::$app->request->getQueryParam('title')?>">

        </form>
        <h2>Pr. Languages</h2>
        <ul class="nav nav-sidebar">
            <?php
            $pr_langs = \app\models\PrLang::find()->all();
            $category_id = Yii::$app->request->getQueryParam('category_id');
            $pr_lang_id = Yii::$app->request->getQueryParam('pr_lang_id');
            $title = Yii::$app->request->getQueryParam('title');

            foreach ($pr_langs as $lang) {
                if ($pr_lang_id == $lang->id) {
                    ?>
                    <li class="active"><?= Html::a($lang->name, '', ['class' => 'col-md-10 disabled']) ?><?= Html::a('X', ['tooltips/index', 'category_id' => $category_id ? $category_id : '','title' => $title], ['class' => 'remove-filter col-md-2']) ?></li>
                <?php } else { ?>
                    <li class=""><?= Html::a($lang->name, ['tooltips/index', 'category_id' => $category_id ? $category_id : '', 'pr_lang_id' => $lang->id,'title' => $title], ['class' => 'col-md-12']) ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
        <h2>Categories</h2>

        <ul class="nav nav-sidebar">
            <?php

            $categories = \app\models\Categories::find()->all();
            foreach ($categories as $category) {
                if ($category_id == $category->id) {
                    ?>
                    <li class="active"><?= Html::a($category->name, '', ['class' => 'col-md-10 disabled']) ?><?= Html::a('X', ['tooltips/index', 'pr_lang_id' => $pr_lang_id ? $pr_lang_id : ''], ['class' => 'remove-filter col-md-2']) ?></li>
                <?php } else { ?>
                    <li class=""><?= Html::a($category->name, ['tooltips/index', 'category_id' => $category->id, 'pr_lang_id' => $pr_lang_id ? $pr_lang_id : ''], ['class' => 'col-md-12']) ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    <?php Block::end(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function($data){
                    return Html::a($data->title,['tooltips/view','id'=>$data->id]);
                }
            ],
            [
                'label' => 'Language',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->category ? $data->category->name:'';
                }
            ],
            [
                'label' => 'Category',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->category?$data->category->name:'';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} &nbsp{update} &nbsp{delete}'
            ],
        ],
    ]); ?>

</div>
