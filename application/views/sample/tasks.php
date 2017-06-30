<h2>Task Manager</h2>

<h3>Create a Task</h3>
<form method="POST">
	<input type="text" name="task" id="task" value="" maxlength="50">
	<input type="submit" name="submit" id="submit" value="Submit">
</form>

<h3>View Tasks</h3>

<?php
if(!empty($tasks)){
	foreach($tasks as $row){
?>
<div class="box">
	<b><a href="<?php echo $this->config('base_url'); ?>example/tasks/edit/id=<?php echo $row['task_id']; ?>"><?php echo $row['task']; ?></a></b>
	<a href="<?php echo $this->config('base_url'); ?>example/tasks/delete/id=<?php echo $row['task_id']; ?>">[ Delete Task ]</a>
</div>
<?php
	}
}else{
?>
<p>There are currently no tasks.</p>
<?php
}
?>