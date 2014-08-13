
<a href="add/"  id="base_url" data-base-url="<?=BASE_URL;?>">Add new position</a>
<table class="positionsTable centered">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th class="editdelete"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->positions as $p) : ?>
		<tr>
			<td><?=$p['title'];?></td>
			<td><?=$p['description'];?></td>
			<td class="editdelete">
				<a href="edit/<?=$p['id'];?>/">EDIT</a>&nbsp;
				<a href="#" onclick="del(this);" data-id="<?=$p['id'];?>">DELETE</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<script src="<?=BASE_URL;?>js/positionsAll.js"></script>

