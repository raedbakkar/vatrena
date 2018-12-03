<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="align-items-center">
				<div class="m-portlet m-portlet--tab">
					<form class="m-form m-form--fit m-form--label-align-right keywordEdidtor"  method="POST">
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<label for="recipient-name" class="form-control-label">
									Title Arabic:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_ar_edit" id="title_ar_edit" value="<?= $keyword_row->keyword_title ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Title English:
								</label>
								<input type="text" class="form-control m-input m-input--solid" name="title_en_edit" id="title_en_edit" value="<?= $keyword_row->cat_keywords_en ?>">
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Description Arabic:
								</label>
								<textarea class="form-control m-input m-input--solid" name="desc_ar_edit" id="desc_ar_edit"><?= $keyword_row->category_desc ?></textarea>
							</div>
							<div class="form-group m-form__group">
								<label for="message-text" class="form-control-label">
									Description english:
								</label>
								<textarea class="form-control" name="desc_en_edit" id="desc_ar_edit"><?= $keyword_row->category_desc_en ?></textarea>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									choose vatrena for Priority
								</label>
								<select class="form-control m-input m-input--solid m-select2 SelectXors" id="m_select2_5"  name="vatrena_name">
									<option></option>
									<?php foreach($vatrenas as $vatrena): ?>
									<option value="<?=  $vatrena->vatrena_id ?>">
										<?=  get_vatrena_by_id($vatrena->vatrena_id); ?>
									</option>
								    <?php endforeach ?>
								</select>
							</div>
							<div class="priority_appender">
								
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									choose relative category
								</label>
								<select class="form-control m-select2" id="m_select2_11" multiple name="category[]">
									<option></option>
									<?php foreach($cat_keywords as $keyword): ?>
									<option value="<?=  $keyword->keywords_id ?>"  <?php selected_related_catKey($keyword->keywords_id, $keyword_id); ?>>
										<?=  $keyword->keyword_title ?>
									</option>
								    <?php endforeach ?>
								</select>
							</div>
							<div class="form-group m-form__group">
								<label for="exampleInputEmail1">
									relative brands
								</label>
								<select class="form-control m-select2" id="m_select2_10" multiple name="brand[]">
									<option></option>
									<?php foreach($brands as $brand): ?>
									<option value="<?=  $brand->brand_id ?>" <?php selected_related_brand($brand->brand_id, $keyword_id); ?>>
										<?=  $brand->brand_title_ar ?>
									</option>
								    <?php endforeach ?>
								</select>
							</div>
							<input type="hidden" name="id" value="<?= $keyword_row->keywords_id ?>">

						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<button type="submit" class="btn btn-success">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>