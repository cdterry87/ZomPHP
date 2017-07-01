<h2>Task Manager</h2>

<h3>Create a Task</h3>
<div class="center">
	<form method="POST" action="<?php echo base_url('sample/tasks/action'); ?>">
		<p><input type="text" name="task" id="task" value="" maxlength="50"></p>
		<p><input type="submit" name="submit" id="submit" value="Submit"></p>
	</form>
</div>

<br/>

<h3>View Tasks</h3>

<table>
	<thead>
		<tr>
			<th width="75%">Task</th>
			<th width="25%"></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(!empty($tasks)){
			$counter=0;
			foreach($tasks as $row){
				$counter++;
		?>
		<tr class="box">
			<td><b><a href="#"><?php echo $counter."). ".$row['task']; ?></a></b></td>
			<td class="align-right"><?php echo anchor('sample/tasks/delete/id='.$row['task_id'], '[ Delete ]'); ?></td>
		</tr>
		<?php
			}
		}else{
		?>
		<tr>
			<td colspan="2" class="center">There are currently no tasks.</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>