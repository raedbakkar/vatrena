<!-- <li>
    <div class="ar-en dropdown dropdown-search">
        <a href="#" class="ar-en search-overlay-menu-btn" data-toggle="dropdown"><i class="icon-search"></i></a>
    </div>
<li> -->
    <div class="ar-en dropdown dropdown-search">
        <a href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" id="access_link"><?= lang('v_Sign_in') ?></a>
    </div><!-- End Dropdown access -->
</li>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="login_landing" method="POST">
              <div class="form-group inpu">
                <label for="recipient-name" class="col-form-label">Email Or Username:</label>
                <input type="text" class="form-control" name="email">
              </div>
              <div class="form-group inpu">
                <label for="message-text" class="col-form-label">Password:</label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="form-group inpu">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>