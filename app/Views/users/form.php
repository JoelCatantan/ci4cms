<?= $this->extend("layout/$default_template/index") ?>

<?= $this->section('page_title') ?>
    <h1><?= $is_add ? 'Create' : 'Update' ?> User</h1>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row form">
        <div class="col-md-7">
            <?= form_open('users') ?>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-right" for="username">Username *</label>
                    <div class="col-md-9">
                        <?= form_input('username', set_value('username'), 'class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-right" for="email_address">Email Address *</label>
                    <div class="col-md-9">
                        <?= form_input('email_address', set_value('email_address'), 'class="form-control"') ?>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-right" for="first_name">First Name *</label>
                    <div class="col-md-9">
                        <?= form_input('first_name', set_value('first_name'), 'class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-right" for="last_name">Last Name *</label>
                    <div class="col-md-9">
                        <?= form_input('last_name', set_value('last_name'), 'class="form-control"') ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="offset-md-3 col-md-9">
                        <?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => "btn btn-primary"]) ?>
                    </div>
                </div>
            <?= form_close() ?>
        </div>
    </div>
<?= $this->endSection() ?>
