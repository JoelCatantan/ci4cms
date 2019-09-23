<?= $this->extend('layout/' . DEFAULT_TEMPLATE . '/index') ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('page_title') ?>

<h3><i class="fa fa-users"></i> List of Users</h3>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('content') ?>

<div class="row">
	<div class="col-md-3">
		<?= form_open('', ['method' => 'GET', 'class' => 'list-of-users-search']) ?>
		<?= form_input('search', '', ['class' => 'form-control', 'placeholder' => 'Search']) ?>
		<?= form_close() ?>
	</div>
	<div class="col-md-2 offset-md-7 text-right">
		<a href="<?= base_url('users/new') ?>" class="btn btn-primary">
			<i class="fa fa-plus"></i> Add User
		</a>
	</div>
</div>

<table class="table table-hover mt-3">
	<thead>
		<tr>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Role</th>
			<th>Created At</th>
			<th>Modified At</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($record_list) : ?>
			<?php foreach ($record_list as $record) : ?>
				<tr>
					<td><?= $record->username ?></td>
					<td><?= $record->first_name ?></td>
					<td><?= $record->last_name ?></td>
					<td><?= $record->role ?></td>
					<td><?= $record->created_at ?></td>
					<td><?= $record->updated_at ?></td>
				</tr>
			<?php endforeach ?>
		<?php else : ?>
			<tr>
				<td class="text-center" colspan="6">- Zero result -</td>
			</tr>
		<?php endif ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Role</th>
			<th>Created At</th>
			<th>Modified At</th>
		</tr>
	</tfoot>
</table>

<div class="text-center mt-3">
	<?= $pager->links() ?>
</div>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('js_sccript') ?>

<script>
	$(function() {
		$('[name="search"]').on('keypress', function(e) {
			if (e.which == 13) {
				$('.list-of-users-search').submit()
			}
		})
	})
</script>

<?= $this->endSection() ?>
