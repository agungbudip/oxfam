<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
?>

<!-- Main content -->
<section class="content">
    <div class="error-page">
        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i><b> <?= $exception->statusCode; ?></b> <?= nl2br(Html::encode($exception->getMessage())) ?></h3>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
</section><!-- /.content -->

