<h2>Editing Item</h2>
<br>

<?php echo render('admin/items/_form'); ?>
<p>
	<?php echo Html::anchor('admin/items/view/'.$item->id, 'View'); ?> |
	<?php echo Html::anchor('admin/items', 'Back'); ?></p>
