
<li>
    <div class="ar-en dropdown dropdown-search">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link"><?= $user_name ?></a>
        <ul class="dropdown-menu" id="cart_items">
            <li>
                <a href="<?= base_url() ?>profile/<?=  profile_name_dash($user_name) ?>/<?= $user_id ?>">Profile</a>
            </li>
            <li>
                <a href="<?= base_url() ?>home/signout">Logout</a>
            </li>
        </ul>
    </div><!-- End Dropdown access -->
</li>