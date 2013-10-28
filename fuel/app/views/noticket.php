<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-warning"></i>
			Something went wrong!
		</h2>
	</div>

	<div class="box-content">
		<?php if(empty($currentUser->student_number)) { ?>
			<p>We couldn't find a ticket for you because we don't know your student card number! Please edit your <a href="http://staffsvgs.co.uk/account/personal-details#extrainfo">Personal Details</a> and enter your student number in the indicated box then try again.</p>
			<p>If you're still having problems, click the <b>Refresh your Data</b> button in the top right corner of this page.</p>
		<?php } else { ?>
			<p>We couldn't find a ticket for your (using the student number <?=$currentUser->student_number;?>). Did you enter it correctly? If so, did you buy a ticket? If you didn't you can't buy them any more. :(</p>
		<?php } ?>

		<p>If you believe this message to be in error, please contact <a href="mailto:ben@staffsvgs.co.uk">Ben Woodford</a> immediately and we'll get this sorted!</p>
	</div>
</div>