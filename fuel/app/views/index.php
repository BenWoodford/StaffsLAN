<div class="row">
	<div class="col-md-8 col-sm-6">
		<?php
			//$photos = $facebook->api($custom_config['fb_album'] . '/photos');

			//var_dump($photos);
		?>
	</div>
	<div class="col-md-4 col-sm-6 box">
		<div class="box-header">
			<h2>
				<i class="fa fa-exclamation-triangle"></i>
				You need to...
			</h2>
		</div>
		<div class="box-content">
		<?php if(count($todos) == 0) {
			echo "...do nothing! You've completed all the steps in preparation for attending the LAN. Check back regularly for any updates though, we may need more from you!";
		}
		?>
		<?php foreach($todos as $todo) { ?>
			<div class="time-row">
				<i class="fa fa-<?=$todo['icon'];?>"></i> 
				<?php if(!empty($todo['link']))
						echo '<a href="' . $todo['link'] . '">' . $todo['text'] . "</a>";
					else
						echo $todo['text'];
					?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>