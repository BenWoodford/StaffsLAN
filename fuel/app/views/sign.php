<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-sign-in"></i>
			Sign In/Out
		</h2>
	</div>
	<div class="box-content text-center">
		<a href="/sign/in" class="col-xs-12 col-md-5 col-sm-5 col-lg-5 btn btn-large btn-success"><i class="fa fa-sign-in"></i> Sign In</a>
		<a href="/sign/out" class="col-xs-12 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 col-md-5 col-sm-5 col-lg-5 btn btn-large btn-danger"><i class="fa fa-sign-out"></i> Sign Out</a>
		<div class="clearfix"></div>
	</div>
</div>

<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-list-ul"></i>
			In/Out Log
		</h2>
	</div>
	<div class="box-content no-padding">
		<table class="table">
		<?php foreach($log as $entry) { ?>
			<tr class="<?=($entry->sign_type == 'in' ? 'success' : 'danger');?>">
				<td class="text-left">
					<i class="fa fa-sign-<?=$entry->sign_type;?>"></i> <?=($entry->sign_type == 'in' ? 'Signed In' : 'Signed Out')?>
				</td>
				<td class="text-right">
					<?=date("D j @ g:i a", $entry->inout_time);?>
				</td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>