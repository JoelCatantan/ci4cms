<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
					<span aria-hidden="true">First</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
					<span aria-hidden="true">Prev</span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item<?= $link['active'] ? ' active"' : '' ?>">
				<?php if ($link['active']) : ?>
					<label class="page-link" style="z-index:3"><?= $link['title'] ?></label>
				<?php else : ?>
					<a class="page-link" href="<?= $link['uri'] ?>">
						<?= $link['title'] ?>
					</a>
				<?php endif ?>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
					<span aria-hidden="true">Next</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
					<span aria-hidden="true">Last</span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>
