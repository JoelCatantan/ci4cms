<?= $this->extend("layout/$default_template/index") ?>

<?= $this->section('page_title') ?>
    <h1><?= $is_add ? 'Create' : 'Update' ?> User</h1>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="form">
        <?= form_open(base_url('users')) ?>
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-right" for="username">Username *</label>
                <div class="col-md-6">
                    <?= form_input([
                        'name' => 'username',
                        'value' => set_value('username'),
                        'class' => 'form-control' .
                            ($validation->hasError('username') ? ' border border-danger' : '')
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
                        'class' => 'form-control' .
                            ($validation->hasError('email_address') ? ' border border-danger' : '')
                    ]) ?>
                </div>
                <?= view('form_error_template', ['error' => $validation->getError('email_address')]) ?>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-right" for="first_name">First Name *</label>
                <div class="col-md-6">
                    <?= form_input([
                        'name' => 'first_name',
                        'value' => set_value('first_name'),
                        'class' => 'form-control' .
                            ($validation->hasError('first_name') ? ' border border-danger' : '')
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
                        'class' => 'form-control' .
                            ($validation->hasError('last_name') ? ' border border-danger' : '')
                    ]) ?>
                </div>
                <?= view('form_error_template', ['error' => $validation->getError('last_name')]) ?>
            </div>
            <br>
            <div class="row">
                <div class="offset-md-2 col-md-10">
                    <?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => "btn btn-primary"]) ?>
                </div>
            </div>
        <?= form_close() ?>
    </div>
<?= $this->endSection() ?>
