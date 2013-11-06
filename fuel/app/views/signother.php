<script type="text/javascript">
$(document).ready(function() {
	setInterval(function(){ $("#entry").focus(); },1000);
});
</script>

<div class="box col-md-6 col-sm-6">
	<div class="box-header">
		<h2>
			<i class="fa fa-user"></i>
			User Scanner
		</h2>
	</div>

	<div class="box-content">
		<p>Please enter a student number and press enter or scan a student card below...</p>

		<form role="form" method="post">
			<div class="form-group">
				<input type="text" name="entry" class="form-control" id="entry" placeholder="Enter Student Number or Scan Card" autofocus />
			</div>
		</form>
	</div>
</div>

<?php if($user != false) { ?>
<div class="box col-md-6 col-sm-6">
	<div class="box-header">
		<h2>
			<i class="fa fa-user"></i>
			Scanned User
		</h2>
	</div>
	<div class="box-content">
		<img src="<?=$user->avatar_url;?>" class="pull-left" style="margin-right: 30px;" />

		<p>
			<strong>Username:</strong> <?=$user->username;?><br />
			<strong>Student ID:</strong> <?=$user->student_number;?><br />
			<strong>Checked in?</strong> <?=($user->hasCheckedIn() ? "Yes" : "<blink>No</blink");?><br />
			<strong>Has Seat?</strong> <?=($user->hasSeat() ? "Yes" : "<blink>No</blink>");?><br />
			<strong>Steam ID:</strong> <?=(strlen($user->steam)> 0 ? $user->steam : "Not Entered");?><br />
		</p>
	</div>
</div>
<?php } ?>