<h2>Task Manager</h2>

<h3>Create a Task</h3>
<div class="center">
	<form method="POST">
		<p><input type="text" name="task" id="task" value="" maxlength="50"></p>
		<p><input type="submit" name="submit" id="submit" value="Submit"></p>
	</form>
</div>

<br/>

<h3>View Tasks</h3>

<?php
if(!empty($tasks)){
	$counter=0;
	foreach($tasks as $row){
		$counter++;
?>
<div class="box">
	<b><a href="#"><?php echo $counter."). ".$row['task']; ?></a></b>
</div>
<?php
	}
}else{
?>
<p>There are currently no tasks.</p>
<?php
}
?>