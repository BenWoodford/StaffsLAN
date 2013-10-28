<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-th-list"></i>
			Available Surveys
		</h2>
	</div>
	<div class="box-content">
	<?php foreach($surveys as $survey) { ?>
		<div class="survey-row">
			<a href="/survey/view/<?=$survey->id;?>"><?=$survey->survey_title;?></a>&nbsp;&nbsp;
			<?php if($survey->is_complete) { ?>
			<span class="label label-success">Completed</span>
			<?php } else { ?>
			<span class="label label-danger">Incomplete</span>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
</div>