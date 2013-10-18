<h2>Viewing #<?php echo $block->id; ?></h2>

<p>
	<strong>Block id:</strong>
	<?php echo $block->block_id; ?></p>
<p>
	<strong>Block name:</strong>
	<?php echo $block->block_name; ?></p>
<p>
	<strong>Room id:</strong>
	<?php echo $block->room_id; ?></p>
<p>
	<strong>Block shorthand:</strong>
	<?php echo $block->block_shorthand; ?></p>
<p>
	<strong>Block locx:</strong>
	<?php echo $block->block_locx; ?></p>
<p>
	<strong>Block locy:</strong>
	<?php echo $block->block_locy; ?></p>

<?php echo Html::anchor('admin/blocks/edit/'.$block->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/blocks', 'Back'); ?>