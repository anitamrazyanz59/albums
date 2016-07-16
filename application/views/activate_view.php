<h1> Hi <?php echo $this->session->userdata('first_name');
    echo $key?> </br>

    <b><a href="<?php echo  site_url('register/validate_email/'.$key.'')?>">Click here</a></b> to Activate your account;
</h1>