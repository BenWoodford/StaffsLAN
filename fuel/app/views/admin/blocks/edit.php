<h2>Editing Block</h2>
<br>

<?php echo render('admin/blocks/_form'); ?>
<p>
	<?php echo Html::anchor('admin/blocks/view/'.$block->id, 'View'); ?> |
	<?php echo Html::anchor('admin/blocks', 'Back'); ?></p>
