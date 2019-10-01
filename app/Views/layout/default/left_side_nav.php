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
                    <i class="fa fa-dashboard"></i>
                    <label class="primary-menu-label"><?= lang('Module.dashboard') ?></label>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <label class="primary-menu-label"><?= lang('Label.maintenance') ?></label>
                </a>
                <ul>
                    <li>
                        <a href="#"><?= lang('Label.module', [lang('Module.user')]) ?></a>
                        <ul>
                            <li>
                                <a href="<?= base_url('users/new') ?>">
                                    <?= lang('Label.addNew') ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('users') ?>">
                                    <?= lang('Label.listOfRecords', [lang('Module.user')]) ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><?= lang('Label.module', [lang('Module.role')]) ?></a>
                        <ul>
                            <li>
                                <a href="<?= base_url('roles') ?>">
                                    <?= lang('Label.listOfRecords', [lang('Module.role')]) ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
