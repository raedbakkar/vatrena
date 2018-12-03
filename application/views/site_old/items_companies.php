<?php foreach($vatrenas as $vatrena): ?>
<li class="col-md-3 col-sm-6">
  <div class="adimg"><a href="#"><img src="assets/images/ads/01.jpg" alt=""></a></div>
  <div class="innerad">
    <h3><a href="#"><?= $vatrena->company_name_ar ?></a></h3>
    <div class="row location">
      <div class="col-xs-12 right"> مدينة نصر , القاهرة , مصر <i class="fa fa-tag" aria-hidden="true"></i></div>
      <div class="col-xs-12 right">محلات ملابس <i class="fa fa-map-marker" aria-hidden="true"></i></div>
    </div>
<!--          <div class="price">$206.90</div>-->
  </div>
</li>
<?php endforeach ?>