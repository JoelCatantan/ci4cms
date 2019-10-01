<?= $this->extend('layout/' . DEFAULT_TEMPLATE . '/index') ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('page_title') ?>

<h3><i class="fa fa-sitemap"></i> <?= lang('Title.listOfRecords', [lang('Module.role')]) ?></h3>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('content') ?>

<table class="table table-hover mt-2">
	<thead>
		<tr>
			<th><?= lang('Label.count') ?></th>
			<th><?= lang('Label.displayName') ?></th>
			<th><?= lang('Label.description') ?></th>
			<th><?= lang('Label.createdAt') ?></th>
			<th><?= lang('Label.modifiedAt') ?></th>
			<th><?= lang('Label.action') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($record_list) : ?>
			<?php foreach ($record_list as $index => $record) : ?>
				<tr>
					<td><?= (int) $index + 1 ?></td>
					<td><?= $record->display_name ?></td>
					<td><?= $record->description ?></td>
					<td><?= $record->created_at ?></td>
					<td><?= $record->updated_at ?></td>
					<td class="action">
						<?= form_open("roles/{$record->id}/delete", [
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
				<td class="text-center" colspan="6">- <?= lang('Crud.zeroResult') ?> -</td>
			</tr>
		<?php endif ?>
	</tbody>
	<tfoot>
		<tr>
			<th><?= lang('Label.count') ?></th>
			<th><?= lang('Label.displayName') ?></th>
			<th><?= lang('Label.description') ?></th>
			<th><?= lang('Label.createdAt') ?></th>
			<th><?= lang('Label.modifiedAt') ?></th>
			<th><?= lang('Label.action') ?></th>
		</tr>
	</tfoot>
</table>

<?= $this->endSection() ?>

--------------------------------------------------------------------------------------------------

<?= $this->section('js_script') ?>

<script>
	$(function() {
		$('[name="search"]').on('keypress', function(e) {
			if (e.which == 13) {
				$('.list-of-roles-search').submit()
			}
		})
		$('.delete-action a').click(function(e) {
			e.preventDefault()
			swal({
					title: '<?= lang('Label.areYouSure') ?>',
					text: '<?= lang('Crud.onceDeleted') ?>',
					confirmButtonColor: '#f77581',
					cancelButtonColor: '#9fa2a5',
					icon: 'warning',
					dangerMode: true,
					buttons: ['<?= lang('Label.no') ?>', '<?= lang('Label.yes') ?>'],
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
