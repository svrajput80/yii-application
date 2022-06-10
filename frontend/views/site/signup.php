<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'email') ?>

                <?php 
                    $country = \common\models\Country::find()->all(); 
                    $listData=ArrayHelper::map($country,'id','country_name'); 
                ?>    
                <?= $form->field($model, 'country_id')->dropDownList($listData,['prompt'=>'Choose...']) ?>

                <?php //foreach ($data as $post): ?>

                    <?//= $form->field($model, "countryes")->dropDownList( [$post->country_name=>$post->country_name]) ?>

                <?php //endforeach; ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
