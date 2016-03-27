<?php
$dashboard = '';
$admin = '';
$setting = '';

switch (strtolower($menu)) {
    case 'dashboard':
        $dashboard = 'active';
        break;
    case 'admin':
        $admin = 'active';
        break;
    case 'setting':
        $setting = 'active';
        break;
    default :
        $dashboard = 'active';
}
?>

<li class="<?= $dashboard ?>">
    <a href="<?= yii\helpers\Url::home() ?>">
        <i class="fa fa-dashboard"></i> 
        <span>Beranda</span>
    </a>
</li>
<li class="<?= $admin ?>">
    <a href="<?= yii\helpers\Url::to(['admin/manage']) ?>">
        <i class="fa fa-user"></i>
        <span>Admin</span>
    </a>
</li>
<li class="<?= $setting ?>">
    <a href="#">
        <i class="fa fa-gears"></i>
        <span>Setting</span>
    </a>
</li>