<?= $this->extend('layout/' . DEFAULT_TEMPLATE . '/index') ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('page_title') ?>

<h3><i class="fa fa-users"></i> <?= lang('Title.listOfRecords', [lang('Module.user')])?></h3>

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
			<?= form_input('search', $search ?? '', [
				'class' => 'form-control',
				'placeholder' => lang('Label.search'),
			]) ?>
		</div>
		<?= form_close() ?>
	</div>
	<div class="col-md-2 offset-md-7 text-right">
		<a href="<?= base_url('users/new') ?>" class="btn btn-primary">
			<i class="fa fa-plus"></i> <?= lang('Label.add', [lang('Module.user')])?>
		</a>
	</div>
</div>

<table class="table table-hover mt-2">
	<thead>
		<tr>
			<th><?= lang('Label.count') ?></th>
			<th><?= lang('Label.username') ?></th>
			<th><?= lang('Label.firstName') ?></th>
			<th><?= lang('Label.lastName') ?></th>
			<th><?= lang('Label.role') ?></th>
			<th><?= lang('Label.created_at') ?></th>
			<th><?= lang('Label.modified_at') ?></th>
			<th><?= lang('Label.action') ?></th>
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
					<td><?= $record->user_role ?></td>
					<td><?= $record->created_at ?></td>
					<td><?= $record->updated_at ?></td>
					<td class="action">
						<a href="<?= base_url('users/' . $record->id) ?>" class="text-primary">
							<i class="fa fa-search"></i> <?= lang('Label.view') ?>
						</a>
						<a href="<?= base_url('users/' . $record->id . '/edit') ?>" class="text-success">
							<i class="fa fa-pencil"></i> <?= lang('Label.edit') ?>
						</a>
						<?= form_open("users/{$record->id}/delete", [
							'method' => 'post',
							'class' => 'delete-action',
						]) ?>
							<a href="#" class="text-danger">
								<i class="fa fa-ban"></i> <?= lang('Label.delete') ?>
							</a>
						<?= form_close() ?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else : ?>
			<tr>
				<td class="text-center" colspan="8">- <?= lang('Crud.zeroResult') ?> -</td>
			</tr>
		<?php endif ?>
	</tbody>
	<tfoot>
		<tr>
			<th><?= lang('Label.count') ?></th>
			<th><?= lang('Label.username') ?></th>
			<th><?= lang('Label.firstName') ?></th>
			<th><?= lang('Label.lastName') ?></th>
			<th><?= lang('Label.role') ?></th>
			<th><?= lang('Label.created_at') ?></th>
			<th><?= lang('Label.modified_at') ?></th>
			<th><?= lang('Label.action') ?></th>
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
				title: '<?= lang('Label.areYouSure') ?>',
				text: '<?= lang('Crud.onceDeleted') ?>',
				icon: 'warning',
				dangerMode: true,
				buttons: ['<?= lang('Label.no')?>', '<?= lang('Label.yes')?>'],
			})
			.then(will_delete => {
				if (will_delete) {
					$(this).parent().submit()
				}
			});
		})
	})
</script>

<?= $this->endSection() ?>
