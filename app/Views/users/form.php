<?= $this->extend('layout/' . DEFAULT_TEMPLATE . '/index') ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('page_title') ?>

<h3><i class="fa fa-user"></i> <?= $is_add ? 'Create' : 'Update' ?> User</h3>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('content') ?>

<div class="form">
    <?= form_open(base_url('users')) ?>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-right" for="username">Username *</label>
        <div class="col-md-6">
            <?= form_input([
                'name' => 'username',
                'value' => set_value('username'),
                'class' => 'form-control' . ($validation->hasError('username') ? ' border border-danger' : ''),
            ]) ?>
        </div>
        <?= view('form_error_template', ['error' => $validation->getError('username')]) ?>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-right" for="email_address">Email Address *</label>
        <div class="col-md-6">
            <?= form_input([
                'name' => 'email_address',
                'value' => set_value('email_address'),
                'class' => 'form-control' . ($validation->hasError('email_address') ? ' border border-danger' : ''),
            ]) ?>
        </div>
        <?= view('form_error_template', ['error' => $validation->getError('email_address')]) ?>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-right" for="email_address">Role *</label>
        <div class="col-md-6">
            <?= form_dropdown([
                'name' => 'role_id',
                'options' => $options['roles'],
                'selected' => set_value('role_id'),
                'class' => 'form-control' . ($validation->hasError('role_id') ? ' border border-danger' : ''),
            ]) ?>
        </div>
        <?= view('form_error_template', ['error' => $validation->getError('role_id')]) ?>
    </div>

    <div class="form-group row mt-5">
        <label class="col-md-2 col-form-label text-right" for="first_name">First Name *</label>
        <div class="col-md-6">
            <?= form_input([
                'name' => 'first_name',
                'value' => set_value('first_name'),
                'class' => 'form-control' . ($validation->hasError('first_name') ? ' border border-danger' : ''),
            ]) ?>
        </div>
        <?= view('form_error_template', ['error' => $validation->getError('first_name')]) ?>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-right" for="last_name">Last Name *</label>
        <div class="col-md-6">
            <?= form_input([
                'name' => 'last_name',
                'value' => set_value('last_name'),
                'class' => 'form-control' . ($validation->hasError('last_name') ? ' border border-danger' : ''),
            ]) ?>
        </div>
        <?= view('form_error_template', ['error' => $validation->getError('last_name')]) ?>
    </div>

    <div class="row mt-5">
        <div class="offset-md-2 col-md-6">
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Submit
            </button>
            <a href="<?= base_url('users') ?>" class="btn btn-secondary">
                <i class="fa fa-mail-reply"></i> Go to list
            </a>
        </div>
    </div>
    <?= form_close() ?>
</div>

<?= $this->endSection() ?>
