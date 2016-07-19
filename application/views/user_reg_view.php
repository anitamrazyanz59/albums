<div>
    <form id="contactForm" method="post" class="form-horizontal" action="<?=site_url('registration/user_reg');?>">
        <div class="form-group">
            <label class="col-md-3 control-label">First Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="first_name" value="<?= set_value('first_name')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Last Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="last_name" value="<?= set_value('last_name')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="email" value="<?= set_value('email')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Login</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="login" value="<?= set_value('login')?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Password </label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password" value="<?= set_value('password')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Password Confirm</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirm" value="<?= set_value('password_confirm')?>" />
            </div>
        </div>
        <!-- #messages is where the messages are placed inside -->
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div id="messages"><?php if($this->session->has_userdata('login_error')){
                        echo $this->session->userdata('login_error');
                    }?></div>
                <?php echo '<div class=error>'.validation_errors().'</div>'; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
