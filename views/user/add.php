<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use \yii\helpers\BaseUrl;

app\assets\CommonAsset::register($this);
$this->registerJsFile(BaseUrl::base() . '/js/bootstrap-filestyle.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(BaseUrl::base() . '/js/inputfile/inputfile.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("$(':file').filestyle({buttonBefore: true});", yii\web\View::POS_END, 'my-options');

$title = $model->isNewRecord ? 'Tambah Admin' : 'Ubah Admin';
$this->title = 'OXFAM - ' . $title;
?>
<section class="content-header">
    <h1>
        Pengguna
        <small><?= $title ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php Url::home() ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Pengguna</li>
        <li class="active"><?= $title ?></li>
    </ol>
</section>

<section class="content">
    <?= $this->render('../partial/_alert'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-6">

                    <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Email'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']]); ?>
                    <?= $form->field($model, 'password', ['inputOptions' => ['placeholder' => $model->isNewRecord ? 'Password' : 'BIARKAN KOSONG JIKA TIDAK ADA PERUBAHAN'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']])->passwordInput(); ?>
                    <hr>
                    <?= $form->field($model, 'nama', ['inputOptions' => ['placeholder' => 'Nama'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']]); ?>
                    <?= $form->field($model, 'alamat', ['inputOptions' => ['placeholder' => 'Alamat'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']])->textarea(); ?>
                    <?= $form->field($model, 'nomor_telpon', ['inputOptions' => ['placeholder' => 'Nomor Telpon'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']]); ?>
                    <?= $form->field($model, 'tim', ['inputOptions' => ['placeholder' => 'Tim'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']])->dropDownList($list_tim, ['prompt' => '--Tim--']); ?>
                    <?= $form->field($model, 'role', ['inputOptions' => ['placeholder' => 'Role'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']])->dropDownList($list_role, ['prompt' => '--Role--']); ?>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <img id="profile_picture" class="profile-user-img img-responsive img-bordered pull-left" src="<?= yii\helpers\BaseUrl::base() . $model->gambar ?>" alt="User profile picture" style="width: 200px">
                        </div>
                    </div>
                    <?= $form->field($model, 'file', ['inputOptions' => ['id' => 'file_input', 'class' => 'form-control', 'onchange' => 'readURL(this)'], 'horizontalCssClasses' => ['wrapper' => 'col-sm-9']])->fileInput()->label(false) ?>
                </div>
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php if (!$model->isNewRecord) { ?>
                <a href="<?= Url::to(['user/' . $model->role]) ?>" class="btn btn-danger pull-right">Batal</a>
            <?php } ?>
        </div><!-- /.box-footer -->

        <?php ActiveForm::end(); ?>
    </div>
</section>