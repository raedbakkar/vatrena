<div class="tele<?= $element_number ?>">	
	<div class="form-group">
		<label>Telephone</label>
		<div class="row">
			<div class="col-md-2">
				<input type="text" name="code[]" class=" form-control regist codes" placeholder="02">
			</div>
			<div class="col-md-8">
				<input type="text" name="telephone[]" class=" form-control regist" placeholder="">
			</div>
			<div class="col-md-2">
				<button class="btn btn-danger del-btn delete-last" data-class="tele<?= $element_number ?>">x</button>
			</div>
		</div>
	</div>
</div>