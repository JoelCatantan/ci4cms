<?= $this->extend('layout/' . DEFAULT_TEMPLATE . '/index') ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('page_title') ?>

<h3>
    <i class="fa fa-user"></i>
    <?= lang('Title.fullDetail', [lang('Module.user')]) ?>
</h3>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('content') ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label text-right">
            <?= lang('Label.username') ?>
        </label>
        <div class="col-md-6">
            <div class="form-control form-value">
                <?= $user->username ?>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 col-form-label text-right">
            <?= lang('Label.emailAddress') ?>
        </label>
        <div class="col-md-6">
            <div class="form-control form-value">
                <?= $user->email_address ?>
            </div>
        </div>
    </div>


    <div class="form-group row mb-5">
        <label class="col-md-3 col-form-label text-right">
            <?= lang('Label.role') ?>
        </label>
        <div class="col-md-6">
            <div class="form-control form-value">
                <?= $user->role->display_name ?>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 col-form-label text-right">
            <?= lang('Label.firstName') ?>
        </label>
        <div class="col-md-6">
            <div class="form-control form-value">
                <?= $user->first_name ?>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 col-form-label text-right">
            <?= lang('Label.lastName') ?>
        </label>
        <div class="col-md-6">
            <div class="form-control form-value">
                <?= $user->last_name ?>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="offset-md-3 col-md-6">
            <a href="<?= base_url("users/{$user->id}/edit") ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i> <?= lang('Label.edit') ?>
            </a>
            <a href="<?= base_url('users') ?>" class="btn btn-secondary">
                <i class="fa fa-mail-reply"></i> <?= lang('Label.goToList') ?>
            </a>
        </div>
    </div>

<?= $this->endSection() ?>
