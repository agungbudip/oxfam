<?php

$message = '';
if (Yii::$app->getSession()->hasFlash('success')) {
    $class = 'alert-success';
    $message = Yii::$app->getSession()->getFlash('success');
} else if (Yii::$app->getSession()->hasFlash('error')) {
    $class = 'alert-danger';
    $message = Yii::$app->getSession()->getFlash('error');
} else if (Yii::$app->getSession()->hasFlash('warning')) {
    $class = 'alert-warning';
    $message = Yii::$app->getSession()->getFlash('warning');
}
if (!empty($message)) {
    echo '<div class="alert ' . $class . ' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ' . $message . '
                  </div>';
}