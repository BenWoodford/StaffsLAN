<div class="row">
	<div class="col-md-8 col-sm-6">
		<div class="box">
			<div class="box-header">
				<h2>
					<i class="fa fa-info"></i>
					Welcome!
				</h2>
			</div>
			<div class="box-content">
				<p>Welcome to the StaffsLAN Intranet!</p>
				<p>This intranet provides all the essential information you need for the LAN, as well as providing seat booking, online check-in services and more to ensure you have an enjoyable LAN!</p>
				<p>Please make sure you check the "You need to..." box on this page to make sure you've done everything you need to do in order to be prepared for the LAN.</p>

				<p>Note: A lot of features are currently in development, but the essentials required for pre-LAN preparations are already up. We'll be releasing the tournaments module soon so you can start setting up teams for our various tournaments throughout the event, as well as the final schedule.</p>

				<p>Sign in/out is for during the LAN, as is Call for Help. Make sure you check the Surveys page regularly for any information we need from you too!</p>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6">
		<div class="box">
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

		<div class="box">
			<div class="box-header">
				<h2>
					<i class="fa fa-clock-o"></i>
					LAN begins in...
				</h2>
			</div>

			<div class="box-content">
				<div id="countdown">
				</div>
				<span class="clearfix"></span>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				var startTime = new Date("<?=$lan->lan_start;?>");
				$("#countdown").countdown({until: startTime});
			});
		</script>
	</div>
</div>