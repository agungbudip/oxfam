<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'OXFAM - Admin';
app\assets\CommonAsset::register($this);
?>
<?php
$form = ActiveForm::begin([
            'id' => 'formfilter',
            'action' => Url::toRoute(Yii::$app->controller->id . '/' . Yii::$app->controller->action->id)]);
?>
<?php ActiveForm::end(); ?>
<section class="content-header">
    <h1>
        Admin
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php yii\helpers\Url::home() ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Admin</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-2">
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
                <div class="col-xs-3">
                    <?= \yii\bootstrap\Html::dropDownList('order', '', ['' => 'Sortir Berdasarkan...', 'id' => 'ID', 'username' => 'Username', 'nama' => 'Nama'], ['class' => 'form-control', 'options' => ['' => ['disabled' => true]]]) ?>
                </div>
                <div class="col-xs-7 pull-right">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div><br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 35px;">
                            <input type="checkbox" id="selectall" class="chk"/>
                            <label for="selectall"></label>
                        </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Jenis</th>
                        <th style="width: 95px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">
                            data kosong
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div><!-- /.box -->
</section>