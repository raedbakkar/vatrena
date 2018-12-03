<?php if($emails)foreach($emails as $email): ?>
<div class="form-group  m-form__group row removeE">
	<label  class="col-lg-3 col-form-label">
		Email:
	</label>
	<div  class="col-lg-6">
		<div data-repeater-item class="m--margin-bottom-10">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="la la-phone"></i>
					</span>
				</div>
				<input type="text" name="email[]" class="form-control form-control-danger" placeholder="Email" value="<?= $email ?>">
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>