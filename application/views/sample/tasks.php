<h2>Task Manager</h2>

<p><?php echo anchor('sample/tasks/create', '[ Create A New Task ]'); ?></p>

<table>
	<thead>
		<tr>
			<th width="75%"><h3>View Tasks</h3></th>
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
			<td><b><?php echo anchor('sample/tasks/edit/id='.$row['task_id'], $counter.".) ".$row['task']); ?></b></td>
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