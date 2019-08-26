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
    <body class="cool-scroll">
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
            <div class="right-nav">
                <ul class="right-nav-part-icon">
                    <li>
                        <a href="#" class="fa fa-bell" data-target-container="notification"></a>
                    </li>
                    <li>
                        <a href="#"class="fa fa-envelope" data-target-container="message"></a>
                    </li>
                    <li>
                        <a href="#" class="fa fa-cogs" data-target-container="settings"></a>
                    </li>
                </ul>
                <div class="right-nav-container">
                    <div class="right-nav-content cool-scroll">
                        <div class="notification-container">
                            <div class="right-nav-container--header">
                                Notification
                            </div>
                            <div class="right-nav--content">
                                <a class="card" href="#">
                                    <div class="card--header">
                                        Lorem Ipsum
                                    </div>
                                    <div class="card--content">
                                        Maecenas euismod massa eget neque cursus viverra. Vestibulum placerat ex metus, ac
                                    </div>
                                </a>
                                <a class="card" href="#">
                                    <div class="card--header">
                                        Lorem Ipsum
                                    </div>
                                    <div class="card--content">
                                        Maecenas euismod massa eget neque cursus viverra. Vestibulum placerat ex metus, ac
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="message-container">
                            <div class="right-nav-container--header">
                                Messages
                            </div>
                            <div class="right-nav--content">
                                Maecenas euismod massa eget neque cursus viverra. Vestibulum placerat ex metus, ac blandit justo fringilla hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sollicitudin nisi tortor, et ullamcorper sapien gravida id. Mauris sit amet neque consequat, sollicitudin eros eget, gravida nunc. Sed in tempus odio. In sed odio at felis rhoncus luctus a in purus. Cras porttitor turpis eget orci tincidunt finibus
                            </div>
                        </div>
                        <div class="settings-container">
                            <div class="right-nav-container--header">
                                Settings
                            </div>
                            <div class="right-nav--content">
                                Proin eget tellus diam. Maecenas pharetra finibus arcu, vel varius enim mattis ut. Fusce cursus quis sem vel vehicula. In hac habitasse platea dictumst. Vivamus in quam aliquet, laoreet elit a, pretium orci. In hac habitasse platea dictumst. Nullam vitae commodo turpis, eu placerat mi. Integer elit quam, consectetur vehicula nisi vitae, porta pulvinar nisl. Mauris porta justo a est volutpat, in accumsan nunc fringilla. Ut id lorem id nisl blandit sagittis et a quam. Aenean ex augue, ornare et mollis vitae, ornare in neque. Integer luctus consectetur porttitor. Vestibulum nisi justo, efficitur eget ornare at, feugiat quis quam. Vivamus leo neque, rutrum sed turpis in, consectetur pellentesque arcu. Pellentesque tempus, nibh id porttitor elementum, tellus justo ullamcorper risus, in tempus elit velit eget eros.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?= script_tag('assets/vendor/jquery-3.4.1.min.js') ?>
    <?= script_tag('assets/vendor/bootstrap/js/bootstrap.min.js') ?>
    <?= script_tag('assets/jo/jo-menus/jo-menus.js') ?>
    <?= script_tag('assets/js/admin.js') ?>
</html>
