<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'OXFAM - Login';
app\assets\LoginAsset::register($this);
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

            echo $form->field($model, 'email', [
                'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}'
            ])->textInput([
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]);

            echo $form->field($model, 'password', [
                'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}'
            ])->passwordInput(['class' => 'form-control', 'placeholder' => 'Password']);
            ?>
            <div class="form-group has-feedback field-loginform-rememberme">
                <div class="checkbox">
                    <input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" class="chk" name="LoginForm[rememberMe]" value="1">
                    <label for="loginform-rememberme">Remember Me</label>
                    <p class="help-block help-block-error"></p>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <a href="<?= \yii\helpers\Url::toRoute(['site/forgotpassword']) ?>" class="btn btn-danger btn-block btn-flat">Lupa Password</a>
                </div><!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.login-box-body -->
    </div>
</div>
