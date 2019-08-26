<?= doctype() ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Joel Catantan">
        <title>PIZZAo6 System</title>
        <?= link_tag('assets/vendor/bootstrap/css/bootstrap.min.css') ?>
        <?= link_tag('assets/vendor/Font-Awesome-4.7.0/css/font-awesome.min.css') ?>
        <?= link_tag('assets/jo/jo-menus/jo-menus.css') ?>
        <?= link_tag('assets/css/admin.css') ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="left-nav">
                <div class="profile-part">
                    <?= img('assets/img/default-avatar-min.png') ?>
                    <ul class="profile-info">
                        <li>Joel Catantan</li>
                        <li class="profile-info--toggle-nav">Administrator
                            <i class="fa fa-chevron-down"></i>
                            <ul class="profile-info--nav">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-key"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cog"></i> Settings
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="left-nav-part jo-menu">
                    <ul>
                        <li>
                            <a>
                                <i class="fa fa-dashboard"></i> <label class="primary-menu-label">Dashboard</label>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-users"></i> <label class="primary-menu-label">Users</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sitemap"></i> <label class="primary-menu-label">Roles</label>
                            </a>
                            <ul>
                                <li><a>Priveleges</a></li>
                                <li><a>Account</a></li>
                                <li><a href="#">Profile</a>
                                    <ul>
                                        <li><a>Change password</a></li>
                                        <li><a>Content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cog"></i> <label class="primary-menu-label">Settings</label>
                            </a>
                            <ul>
                                <li><a href="#">Priveleges</a>
                                    <ul>
                                        <li><a>Change password</a></li>
                                        <li><a>Content</a></li>
                                    </ul>
                                </li>
                                <li><a>Account</a></li>
                                <li><a href="#">Profile</a>
                                    <ul>
                                        <li><a>Change password</a></li>
                                        <li><a>Content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main>
                <div class="header">
                    <button class="left-menu-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="top-nav-part">
                        <li class="app-version">PIZZAo6 Template V1.0</li>
                        <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
                <div class="body"></div>
                <div class="footer"></div>
            </main>
            <div class="right-nav"></div>
        </div>
    </body>
    <?= script_tag('assets/vendor/jquery-3.4.1.min.js') ?>
    <?= script_tag('assets/vendor/bootstrap/js/bootstrap.min.js') ?>
    <?= script_tag('assets/jo/jo-menus/jo-menus.js') ?>
    <?= script_tag('assets/js/admin.js') ?>
</html>
