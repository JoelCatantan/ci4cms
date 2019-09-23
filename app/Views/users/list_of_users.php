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
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<i class="input-group-text fa fa-search"></i>
			</div>
			<?= form_input('search', '', ['class' => 'form-control', 'placeholder' => 'Search']) ?>
		</div>
		<?= form_close() ?>
	</div>
	<div class="col-md-2 offset-md-7 text-right">
		<a href="<?= base_url('users/new') ?>" class="btn btn-primary">
			<i class="fa fa-plus"></i> Add User
		</a>
	</div>
</div>

<table class="table table-hover mt-2">
	<thead>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Role</th>
			<th>Created At</th>
			<th>Modified At</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($record_list) : ?>
			<?php foreach ($record_list as $index => $record) : ?>
				<tr>
					<td><?= $record_offset + $index + 1 ?></td>
					<td><?= $record->username ?></td>
					<td><?= $record->first_name ?></td>
					<td><?= $record->last_name ?></td>
					<td><?= $record->role ?></td>
					<td><?= $record->created_at ?></td>
					<td><?= $record->updated_at ?></td>
					<td class="action">
						<a href="<?= base_url('users/' . $record->id) ?>" class="text-primary">
							<i class="fa fa-search"></i> View
						</a>
						<a href="<?= base_url('users/' . $record->id . '/edit') ?>" class="text-success">
							<i class="fa fa-pencil"></i> Edit
						</a>
						<?= form_open("users/{$record->id}/delete", ['method' => 'post', 'class' => 'delete-action']) ?>
							<a href="#" class="text-danger">
								<i class="fa fa-ban"></i> Delete
							</a>
						<?= form_close() ?>
					</td>
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
			<th>#</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Role</th>
			<th>Created At</th>
			<th>Modified At</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<div class="text-center mt-5">
	<?= $pager->links() ?>
</div>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('js_script') ?>

<script>
	$(function() {
		$('[name="search"]').on('keypress', function(e) {
			if (e.which == 13) {
				$('.list-of-users-search').submit()
			}
		})
		$('.delete-action a').click(function(e) {
			e.preventDefault()
			swal({
				title: "Are you sure?",
				text: 'Once deleted, you will not be able to recover the record.',
				icon: 'warning',
				dangerMode: true,
				buttons: ['No', 'Yes'],
			})
			.then((willDelete) => {
				if (willDelete) {
					$(this).parent().submit()
				}
			});
		})
	})
</script>

<?= $this->endSection() ?>
