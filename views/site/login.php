<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a><b>OXFAM</b> Login</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => '{input}{error}',
                            'options' => ['class' => 'form-group has-feedback']
                        ],
            ]);
            
            echo $form->field($model, 'username', [
                'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}'
            ])->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Username'
            ]);
            
            echo $form->field($model, 'password', [
                'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}'
            ])->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])
            ?>
            <div class="row">
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-danger btn-block btn-flat">Lupa Password</button>
                </div><!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.login-box-body -->
    </div>
</div>
