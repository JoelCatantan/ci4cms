<?= doctype() ?>
<html>
	<head>
		<title>Login</title>
		<?= script_tag('assets/vendor/jquery-3.4.1.min.js') ?>
		<?= script_tag('assets/vendor/bootstrap/js/bootstrap.min.js') ?>
	</head>
	<body>
		<div class="container-fluid">
			<?php if ($validation_errors) : ?>
				<ul>
					<?php foreach ($validation_errors as $error) : ?>
					<li><?= $error ?></li>
					<?php endforeach ?>
				<ul>
			<?php endif ?>
			<div class="row">
				<div class="col col-md-4 offset-md-4">
					<?= form_open('login', ['autocomplete' => 'false']) ?>
						<?= form_hidden('timezone_offset') ?>
						<div class="form-group">
							<label>Username</label>
							<?= form_input('username', set_value('username'), ['class' => 'form-control']) ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<?= form_password(['name' => 'password', 'class' => 'form-control']) ?>
						</div>
						<?= form_button(['type' => 'submit', 'content' => 'Submit', 'class' => 'btn btn-primary']) ?>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</body>
	<?= link_tag('assets/vendor/bootstrap/css/bootstrap.min.css') ?>
	<script>
		$(function() {
			let timezone_offset_min = (new Date()).getTimezoneOffset()
			$('[name="timezone_offset"]').val(timezone_offset_min === 0 ? 0 : -timezone_offset_min)
		})
	</script>
</html>
