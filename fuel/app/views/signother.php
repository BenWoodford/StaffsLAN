<?php if($user != false) { ?>
<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-user"></i>
			Scanned User
		</h2>
	</div>
	<div class="box-content">
		<img src="<?=$user->avatar_url;?>" class="pull-left" />

		<p>
			<strong>Username:</strong> <?=$user->username;?><br />
			<strong>Student ID:</strong> <?=$user->student_number;?><br />
			<strong>Checked in?</strong> <?=($user->hasCheckedIn() ? "Yes" : "<blink>No</blink");?><br />
			<strong>Has Seat?</strong> <?=($user->hasSeat() ? "Yes" : "<blink>No</blink>");?><br />
			<strong>Steam ID:</strong> <?=($user->steam);?><br />
		</p>
	</div>
</div>
<?php } ?>