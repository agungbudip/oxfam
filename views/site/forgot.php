<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'OXFAM - Lupa Password';
app\assets\LoginAsset::register($this);
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a><b>OXFAM</b> Lupa Password</a>
        </div><!-- /.login-logo -->
        <?= $this->render('../partial/_alert'); ?>
        <div class="login-box-body">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'forgot-form',
                        'fieldConfig' => [
                            'template' => '{input}{error}',
                            'options' => ['class' => 'form-group has-feedback']
                        ],
            ]);

            echo $form->field($model, 'email', [
                'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}'
            ])->textInput([
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]);
            ?>
            <div class="row">
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <a href="<?= \yii\helpers\Url::toRoute(['site/login']) ?>" class="btn btn-danger btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.login-box-body -->
    </div>
</div>
