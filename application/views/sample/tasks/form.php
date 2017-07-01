<h2>Create/Edit Task</h2>

<p><?php echo anchor('sample/tasks', '[ Return to Tasks ]'); ?></p>

<br/>

<form method="POST">
	<input type="hidden" name="task_id" value="<?php echo @$task['task_id']; ?>" />
	<p><input type="text" name="task" id="task" placeholder="Enter task here..." value="<?php echo @$task['task']; ?>" maxlength="50" /></p>
	<p class="center"><input type="submit" name="action" id="save" value="Save"/></p>
</form>
