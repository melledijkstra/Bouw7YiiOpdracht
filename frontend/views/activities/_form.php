<?php

use common\models\Category;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList($model->getActivityTypes(),['prompt'=>'Kies activiteits type']) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'categories')->checkboxList(ArrayHelper::map(Category::find()->asArray()->all(),'id','name')) ?>

    <?= $form->field($model, 'image')->fileInput(['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Aanmaken' : 'Aanpassen', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
