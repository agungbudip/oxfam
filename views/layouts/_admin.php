<?php
$dashboard = '';
$pengguna = '';
$pengguna_pewawancara = '';
$pengguna_analis = '';
$pengguna_manajer = '';
$proyek = '';
$kuisioner = '';

switch (strtolower($menu)) {
    case 'dashboard':
        $dashboard = 'active';
        break;
    case 'pengguna':
        $pengguna = 'active';
        break;
    case 'proyek':
        $proyek = 'active';
        break;
    case 'kisioner':
        $kuisioner = 'active';
        break;
    default :
        $dashboard = 'active';
}

switch (strtolower($submenu)) {
    case 'pewawancara':
        $pengguna_pewawancara = 'active';
        break;
    case 'analis':
        $pengguna_analis = 'active';
        break;
    case 'manajer':
        $pengguna_manajer = 'active';
        break;
}
?>

<li class="<?= $dashboard ?>">
    <a href="<?= yii\helpers\Url::home() ?>">
        <i class="fa fa-dashboard"></i> 
        <span>Beranda</span>
    </a>
</li>
<li class="treeview <?= $pengguna ?>">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>Pengguna</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="<?= $pengguna_pewawancara ?>"><a href="<?= yii\helpers\Url::to(['user/pewawancara']) ?>"><i class="fa fa-circle-o"></i> Pewawancara</a></li>
        <li class="<?= $pengguna_analis ?>"><a href="<?= yii\helpers\Url::to(['user/analis']) ?>"><i class="fa fa-circle-o"></i> Analis</a></li>
        <li class="<?= $pengguna_manajer ?>"><a href="<?= yii\helpers\Url::to(['user/manajer']) ?>"><i class="fa fa-circle-o"></i> Manajer</a></li>
    </ul>
</li>
<li class="<?= $proyek ?>">
    <a href="#">
        <i class="fa fa-folder-open-o"></i>
        <span>Proyek</span>
    </a>
</li>
<li class="<?= $kuisioner ?>">
    <a href="#">
        <i class="fa fa-file-text-o"></i>
        <span>Kuisioner</span>
    </a>
</li>