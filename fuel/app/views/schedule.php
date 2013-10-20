<div id="schedule" class="row">
	<div id="multiday" class="col-md-12 box">
		<div class="box-header">
			<h2>
				<i class="icon-calendar"></i>
				Multi-Day Events
			</h2>
		</div>
		<div class="box-content">

		</div>
	</div>

	<?php foreach($schedule as $date=>$hours) { ?>
	<div class="box day col-md-4 col-lg-4 col-sm-6 col-xs-12" data-date="<?=$date;?>">
		<div class="box-header">
			<h2>
				<i class="icon-calendar"></i>
				<?=$date;?>
			</h2>
		</div>

		<div class="box-content">
			<?php foreach($hours as $hour=>$events) { ?>
			<div class="time-row" data-time="<?=$hour;?>:00"><span class="time"><?=$hour;?>:00</span></div>
			<div class="time-row" data-time="<?=$hour;?>:30"></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>

<div id="event_list">
<?php foreach($items as $item) { ?>
	<div class="event <?=$item->schedule_item_class;?> <?php if($item->isMultiDay()) echo "multiday"; ?>" data-start-time="<?=$item->startDateTime()->format('h:i');?>" data-end-time="<?=$item->endDateTime()->format('h:i');?>" data-date="<?=$item->startDateTime()->format('d.m.Y');?>">
		<?=$item->schedule_item_name;?>
	</div>
<?php } ?>
</div>