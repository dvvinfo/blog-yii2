<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);
/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form" >

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?//= $form->field($model, 'description')->textarea(['rows' => 6, ]) ?>
    <?php
//    echo $form->field($model, 'description')->widget(CKEditor::class,[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
//    ]);
    echo $form->field($model, 'description')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);
    ?>
    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?php
//    echo $form->field($model, 'content')->widget(CKEditor::class,[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
//    ]);
    echo $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);
    ?>

    <?= $form->field($model, 'date')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
