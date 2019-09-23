				</div>
				<div class="footer"></div>
			</main>
			<?= view('layout/default/right_side_nav') ?>
		</div>
	</body>
	<?= script_tag('node_modules/jquery/dist/jquery.min.js') ?>
	<?= script_tag('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>
	<?= script_tag('node_modules/sweetalert/dist/sweetalert.min.js') ?>
	<?= script_tag('node_modules/toastr/build/toastr.min.js') ?>
	<?= script_tag('assets/jo/jo-menus/jo-menus.js') ?>
	<?= script_tag('assets/js/admin.js') ?>
	<?= $this->renderSection('js_script') ?>
	<?php if ($form_message) : ?>
	<script type="text/javascript">
		$(function() {
			toastr.options = {
				closeButton: true,
				progressBar: true,
				newestOnTop: true,
			}
			toastr.<?= $form_message['type'] ?>('<?= $form_message['message'] ?>')
		})
	</script>
	<?php endif ?>
</html>
