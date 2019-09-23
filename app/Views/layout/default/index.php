<?= view('layout/default/header') ?>

<div class="page-title">
    <?= $this->renderSection('page_title') ?>
</div>
<div class="content mt-4">
    <?= $this->renderSection('content') ?>
</div>

<?= view('layout/default/footer') ?>
