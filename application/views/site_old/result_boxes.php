<?php foreach($search_results as $result): ?>

<div class="item">

    <div class="row">

        

        <div class="col-md-2 col-xs-12">

            <div class="item-logo">

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">

                    <img src="<?= (!empty($result->logo) ? 'assets/new_uploads/'.$result->logo:'assets/images/logo%20vatrena.png');  ?>" />

                </a>

            </div>

        </div>

        

        <div class="col-md-7 col-xs-12">

            <div class="item-details">

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="com-name">

                    <h5><?= $result->company_name_ar ?></h5>

                </a>

                <table>

                    

                    <tr>

                        <td class="hd">العنوان:</td>

                        <td><?= $result->adress_ar ?> - <?= get_area_name($result->area) ?> <?= get_dist_name($result->district) ?>, <?= get_city_name($result->city) ?>,<?= get_moha_name($result->mohafaza) ?></td>

                    </tr>

                    

                    <tr>

                        <td class="hd">الأقسام:</td>

                        <td><?php get_all_category($result->companies_id, 'main_category'); ?>

                            <span>

                                 <?php get_all_category($result->companies_id, 'count'); ?>

                                

                                <ul>

                                    <?php get_all_category($result->companies_id, 'all_categories'); ?>

                                </ul>

                            </span>

                        </td>

                    </tr>

                    

                    <tr>

                        <td class="hd"><span>كلمات البحث:</span></td>

                        <td><?php get_all_keywords($result->companies_id); ?></td>

                    </tr>

                    

                    <tr>

                        <td class="hd">نبذة عن المنشأة</td>

                        <td><?php custom_echo($result->company_about, 40)?>

                        

                        <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">اقرأ المزيد....</a>

                        </td>

                    </tr>

                    

                </table>

            </div>

        </div>

        

        <div class="col-md-3 col-xs-12">

            <div class="social-icons">

                

                <ul>

                    <li>

                        <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-phone">

                            <span>التليفون</span>

                            <i class="fa fa-phone"></i>

                        </a>

                    </li>

                    

                    <li>

                        <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-map">

                            <span>الخريطة</span>

                            <i class="fa fa-map-marker"></i>

                        </a>

                    </li>

                    

                    <li>

                        <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-pranch">

                            <span>الفروع</span>

                            <i class="fa fa-building-o"></i>

                        </a>

                    </li>

                    

                    <li>

                        <span class="more">+ 4</span>

                        <ul class="sub-menu">

                            

                            <li>

                                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-photo">

                                    <span>صور</span>

                                    <i class="fa fa-photo"></i>

                                </a>

                            </li>

                            

                            <li>

                                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-video">

                                    <span>فيديو</span>

                                    <i class="fa fa-video-camera"></i>

                                </a>

                            </li>

                            

                            <li>

                                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-email">

                                    <span>الإيميل</span>

                                    <i class="fa fa-envelope"></i>

                                </a>

                            </li>

                            

                            <li>

                                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank" class="link-globe">

                                    <span>الويب</span>

                                    <i class="fa fa-globe"></i>

                                </a>

                            </li>

                            

                        </ul>

                    </li>

                </ul>

                

            </div>

        </div>

        

        <div class="col-md-8 col-md-offset-4 col-xs-12">

            <div class="media-icons">

                

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">

                    <i class="fa fa-facebook fa-lg"></i>

                </a>

                

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">

                    <i class="fa fa-twitter fa-lg"></i>

                </a>

                

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">

                    <i class="fa fa-google-plus fa-lg"></i>

                </a>

                

                <a href="<?= base_url() ?>home/single_page/<?= $result->companies_id ?>" target="_blank">

                    <i class="fa fa-linkedin fa-lg"></i>

                </a>

                

            </div>

        </div>

        

    </div>

</div>

<?php endforeach ?>