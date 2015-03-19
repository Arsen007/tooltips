<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tooltips */

$this->title = 'Update Tooltips: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tooltips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tooltips-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
