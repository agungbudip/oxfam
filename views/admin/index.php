<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Html;
use app\models\MyFunction;

$this->title = 'OXFAM - Admin';
app\assets\CommonAsset::register($this);
$this->registerJsFile(yii\helpers\BaseUrl::base() . '/js/filter/filter.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

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
    <?= $this->render('../partial/_alert'); ?>

    <div class="box">
        <div class="box-body">
            <?php $filter = ActiveForm::begin(['id' => 'filter', 'method' => 'GET', 'action' => Url::toRoute(Yii::$app->controller->id . '/' . Yii::$app->controller->action->id)]); ?>
            <input type="hidden" name="search" id="filter_search" value="<?= $search ?>">
            <input type="hidden" name="show" id="filter_show" value="<?= $show ?>">
            <input type="hidden" name="page" id="filter_page" value="<?= $page ?>">
            <input type="hidden" name="order" id="filter_order" value="<?= $order ?>">
            <?php ActiveForm::end(); ?>
            
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-xs-2">
                    <input type="text" id="form_search" class="form-control" placeholder="Cari..." value="<?= $search ?>">
                </div>
                <div class="col-xs-3">
                    <?=
                    Html::dropDownList('order', $order, [
                        'id DESC' => 'Sortir Berdasarkan...',
                        'email ASC' => 'Email A-Z',
                        'nama ASC' => 'Nama A-Z',
                        'tim ASC' => 'Tim A-Z',
                        'nomor_telpon ASC' => 'Nomor Telpon A-Z',
                        'email DESC' => 'Email Z-A',
                        'nama DESC' => 'Nama Z-A',
                        'tim DESC' => 'Tim Z-A',
                        'nomor_telpon DESC' => 'Nomor Telpon Z-A',
                            ], ['class' => 'form-control', 'id' => 'form_order'])
                    ?>
                </div>
                <div class="col-xs-7 pull-right">
                    <div class="btn-group pull-right">
                        <a href="<?= Url::to(['admin/add']) ?>" class="btn btn-primary">Tambah</a>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin akan menghapus semua data ini?')">Hapus</button>
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
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Nomor Telpon</th>
                        <th style="width: 95px">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($model) == 0) { ?>
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($model as $m) { ?>
                        <tr>
                            <td>
                                <input type="checkbox" id="<?= 'chk' . $m->id ?>" class="chk" name="id[]" value="<?= $m->id ?>"/>
                                <label for="<?= 'chk' . $m->id ?>"></label>
                            </td>
                            <td><?= $m->email ?></td>
                            <td><?= $m->nama ?></td>
                            <td><?= $m->tim ?></td>
                            <td><?= $m->nomor_telpon ?></td>
                            <td>
                                <?= Html::beginForm(['/admin/delete/' . $m->id], 'post'); ?>
                                <div class="btn-group pull-right">
                                    <a href="<?= Url::to(['admin/edit/' . $m->id]) ?>" class="btn btn-primary" data-toggle="tooltip" title="Ubah"><i class="fa fa-gear"></i></a>
                                        <?=
                                        Html::submitButton(
                                                '<i class="fa fa-trash"></i>', [
                                            'class' => 'btn btn-primary',
                                            'data-toggle' => 'tooltip',
                                            'title' => 'Hapus',
                                            'onclick' => 'return confirm("Yakin akan menghapus data ini?")'
                                        ]);
                                        ?>
                                </div>
                                <?= Html::endForm(); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            $page = $page;
            $last_page = $totalpage;
            $url = '#';
            $onclick = 'pagination(:p);return false';
            echo MyFunction::generatePagination($page, $last_page, $url, $onclick);
            ?>

            <?php ActiveForm::end(); ?>
        </div><!-- /.box-body -->

    </div><!-- /.box -->
</section>