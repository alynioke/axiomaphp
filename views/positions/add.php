<div class="formHeading"  id="base_url" data-base-url="<?=BASE_URL;?>">POSITION</div>
<div class="messages">
	<div class="success">Saved!</div>
	<div class="err">Fill in necessary fields and check validity of input!</div>
</div>	
<form action="" method="post" id="form">
	<label for="">Title</label> 
	<input autofocus type="text" required id="title" name="title" value="<?php if ($this->position['title'] != "") echo $this->position['title'];?>"> 
	<label for="">Description</label> 
	<input type="text" id="description" name="description" value="<?php if ($this->position['description'] != "") echo $this->position['description'];?>"> 

	<div class="send">
		<label id="send" onclick="validate();" data-id="<?php if ($this->position['id'] != "") echo $this->position['id'];?>" data-type="<?= $this->type?>"> SEND </label>
	</div>
</form>

<script src="<?=BASE_URL;?>js/positionsAdd.js"></script>