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
                <div class="left-nav-part">
                    <ul>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-users"></i> Users
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sitemap"></i> Roles
                            </a>
                            <ul>
                                <li><a href="#">Priveleges</a></li>
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Profile</a>
                                    <ul>
                                        <li><a href="#">Change password</a></li>
                                        <li><a href="#">Content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cog"></i> Settings
                            </a>
                            <ul>
                                <li><a href="#">Priveleges</a>
                                    <ul>
                                        <li><a href="#">Change password</a></li>
                                        <li><a href="#">Content</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Profile</a>
                                    <ul>
                                        <li><a href="#">Change password</a></li>
                                        <li><a href="#">Content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main>
                <div class="header"></div>
                <div class="body"></div>
                <div class="footer"></div>
            </main>
            <div class="right-nav"></div>
        </div>
    </body>
    <?= script_tag('assets/vendor/jquery-3.4.1.min.js') ?>
    <?= script_tag('assets/vendor/bootstrap/js/bootstrap.min.js') ?>
    <?= script_tag('assets/js/admin.js') ?>
</html>
