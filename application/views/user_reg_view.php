<div>
    <form id="contactForm" method="post" class="form-horizontal" action="<?=site_url('albums/user_reg');?>">
        <div class="form-group">
            <label class="col-md-3 control-label">First Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="first_name" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Last Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="last_name" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="email" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Login</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="login" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Password </label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Password Confirm</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirm" />
            </div>
        </div>
        <!-- #messages is where the messages are placed inside -->
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div id="messages"></div>
            </div>
        </div>
        <?php echo '<div class=error>'.validation_errors().'</div>'; ?>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
