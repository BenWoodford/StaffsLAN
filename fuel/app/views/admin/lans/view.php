<h2>Viewing #<?php echo $lan->id; ?></h2>

<p>
	<strong>Lan id:</strong>
	<?php echo $lan->lan_id; ?></p>
<p>
	<strong>Lan start:</strong>
	<?php echo $lan->lan_start; ?></p>
<p>
	<strong>Lan end:</strong>
	<?php echo $lan->lan_end; ?></p>
<p>
	<strong>Lan title:</strong>
	<?php echo $lan->lan_title; ?></p>
<p>
	<strong>Lan description:</strong>
	<?php echo $lan->lan_description; ?></p>

<?php echo Html::anchor('admin/lans/edit/'.$lan->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/lans', 'Back'); ?>