<?php foreach($vatrenas as $vatrena): ?>

<li class="col-md-3 col-sm-6">

  <div class="adimg"><a href="<?= base_url() ?>home/single_page/<?= $vatrena->companies_id ?>"><img src="<?= (!empty($vatrena->logo) ? 'assets/new_uploads/'.$vatrena->logo:'assets/images/logo%20vatrena.png');  ?>" alt=""></a></div>

  <div class="innerad">

    <h3><a href="<?= base_url() ?>home/single_page/<?= $vatrena->companies_id ?>"><?= $vatrena->company_name_ar ?></a></h3>

    <div class="row location">

      <div class="col-xs-12 right"><?= get_moha_name($vatrena->mohafaza) ?> , <?= get_dist_name($vatrena->district) ?>  <i class="fa fa-tag" aria-hidden="true"></i></div>

      <div class="col-xs-12 right"><?= get_user_type($vatrena->companyType) ?> <i class="fa fa-map-marker" aria-hidden="true"></i></div>

    </div>

  </div>

</li>

<?php endforeach ?>