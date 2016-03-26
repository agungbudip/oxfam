<section class="content-header">
    <h1>
        Admin
        <small>Tambah Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php yii\helpers\Url::home() ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Admin</li>
        <li class="active">Tambah Admin</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="Nama" class="form-control" id="inputEmail3" placeholder="Judul">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Alamat"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>Prov</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>Kota</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Durasi</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Durasi">
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control">
                                    <option>Jam</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Target</label>
                            <div class="col-sm-3">
                                <input type="Email" class="form-control" id="inputEmail3" placeholder="Target">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">User</label>
                            <div class="col-sm-4">
                                <select multiple="" class="form-control">
                                    <option>User 1</option>
                                    <option>User 2</option>
                                    <option>User 3</option>
                                </select>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <select multiple="" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger pull-right">Batal</button>
            </div><!-- /.box-footer -->
        </form>
    </div>
</section>