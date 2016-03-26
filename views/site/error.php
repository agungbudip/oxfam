<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
?>

<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a><i class="fa fa-warning text-red"></i><b> <?= $exception->statusCode; ?></b> <?= nl2br(Html::encode($exception->getMessage())) ?></a>
        </div>
        <p class="login-box-msg">
            <a href="<?= \yii\helpers\Url::home()?>" class="btn btn-link">Kembali kehalaman utama</a>
        </p>
    </div>
</div>
