<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrLang */

$this->title = 'Create Pr Lang';
$this->params['breadcrumbs'][] = ['label' => 'Pr Langs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pr-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
