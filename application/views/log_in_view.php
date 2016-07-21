<?php if(isset($error)){
    echo $error;
} ?>
    <form id="log_in" method="post" class="form-horizontal" action="<?=site_url('registration/log_in');?>">
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
                <button type="submit" class="btn btn-default">log in</button>
            </div>
        </div>
    </


    form>
