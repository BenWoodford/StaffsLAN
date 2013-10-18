<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Item id:</strong>
	<?php echo $item->item_id; ?></p>
<p>
	<strong>Block id:</strong>
	<?php echo $item->block_id; ?></p>
<p>
	<strong>Item description:</strong>
	<?php echo $item->item_description; ?></p>
<p>
	<strong>Item quantity:</strong>
	<?php echo $item->item_quantity; ?></p>

<?php echo Html::anchor('admin/items/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/items', 'Back'); ?>