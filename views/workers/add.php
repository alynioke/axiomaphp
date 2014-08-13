<div class="formHeading" id="base_url" data-base-url="<?=BASE_URL;?>">WORKER</div>
<div class="messages">
	<div class="success">Saved!</div>
	<div class="err">Fill in necessary fields and check validity of input!</div>
</div>	
<form action="" method="post" id="form">
	<label for="">Name</label> 
	<input autofocus type="text" required id="name" name="name" value="<?php if ($this->worker['name'] != "") echo $this->worker['name'];?>"> 

	<label for="">Lastname</label> 
	<input type="text" required id="lastname" name="lastname" value="<?php if ($this->worker['lastname'] != "") echo $this->worker['lastname'];?>"> 

	<label for="">Position</label> 
	<select name="position_id" id="position_id">
		<?php foreach ($this->positions as $key => $p): ?>
			<option 
				<?php if($p['id'] == $this->worker['position_id']) echo "selected";?> 
				value="<?=$p['id'];?>">
					<?=$p['title'];?>
			</option>
		<?php endforeach?>
	</select> 

	<label for="">Description</label> 
	<textarea id="description" name="description"><?php if ($this->worker['description'] != "") echo $this->worker['description'];?></textarea> 

	<label for="">Wage</label> 
	<input type="number" id="wage" name="wage" value="<?php if ($this->worker['wage'] != "") echo $this->worker['wage'];?>"> 

	<div class="send">
		<label id="send" onclick="validate();" data-id="<?php if ($this->worker['id'] != "") echo $this->worker['id'];?>" data-type="<?= $this->type?>"> SEND </label>
	</div>
</form>

<script src="<?=BASE_URL;?>js/workersAdd.js"></script>