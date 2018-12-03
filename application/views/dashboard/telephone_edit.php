<?php 	if($arrayTele)foreach($arrayTele as $code => $number): ?>
	<?php 	foreach($number as $val_number => $number): ?>
	<div class="form-group m-form__group row removeTele">
		<div class="col-lg-4">
			<label class="form-control-label">
				* code:
			</label>
			<input type="text" name="codeTelepone[]" class="form-control m-input" placeholder="example: 02" value="<?= $val_number ?>">
		</div>
		<div class="col-lg-8">
			<label class="form-control-label">
				* Telepone:
			</label>
			<input type="text" name="Telepone[]" class="form-control m-input" placeholder="رقم التليفون الأرض" value="<?= $number ?>">
		</div>
	</div>
	<?php endforeach ?>
<?php endforeach ?>
