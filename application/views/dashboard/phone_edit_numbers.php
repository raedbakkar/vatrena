<?php foreach($phone_numbers as $number): ?>
<div class="form-group  m-form__group row removeP" >
	<div data-repeater-list="" class="col-lg-12">
		<div data-repeater-item class="form-group m-form__group row align-items-center">
			<div class="col-md-5">
				<div class="m-form__group m-form__group--inline">
					<div class="m-form__label">
						<label class="m-label m-label--single">
							Number:
						</label>
					</div>
					<div class="m-form__control">
						<input type="text" name="phone_number[]" class="form-control m-input" placeholder="Enter contact number" value="<?= $number->phone_number ?>">
					</div>
				</div>
				<div class="d-md-none m--margin-bottom-10"></div>
			</div>
			<div class="col-md-5">
				<div class="m-form__group m-form__group--inline">
					<div class="m-form__label">
						<label>
							Name:
						</label>
					</div>
					<div class="m-form__control">
						<input type="text" name="person_name[]" class="form-control m-input" placeholder="Enter full name" value="<?= $number->person_name ?>">
					</div>
				</div>
				<div class="d-md-none m--margin-bottom-10"></div>
			</div>
			<div class="col-md-2">
				<div class="m-radio-inline">
					<label class="m-checkbox m-checkbox--state-success">
						<input type="checkbox" name="Primary[]" value="<?= $number->main_number ?>" <?= ($number->main_number == 1) ? 'checked':'' ?> >
						Primary
						<span></span>
					</label>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>