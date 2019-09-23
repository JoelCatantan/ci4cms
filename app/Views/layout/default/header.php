<?= doctype() ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Joel Catantan">
    <title>PIZZAo6 System</title>
    <?= link_tag('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= link_tag('node_modules/font-awesome/css/font-awesome.min.css') ?>
    <?= link_tag('assets/jo/jo-menus/jo-menus.css') ?>
    <?= link_tag('assets/css/datatables.css') ?>
    <?= link_tag('assets/css/admin.css') ?>
</head>

<body class="cool-scroll">
    <div class="container-fluid">
        <?= view('layout/default/left_side_nav') ?>
        <main>
            <div class="header">
                <button class="left-menu-toggle">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="top-nav-part">
                    <li class="app-version">PIZZAo6 Template V1.0</li>
                    <li>
                        <a href="<?= route_to('logout') ?>">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="body">
