<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tooltips */

$this->title = 'Create Tooltips';
$this->params['breadcrumbs'][] = ['label' => 'Tooltips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tooltips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
