<h1> Hi <?php echo $this->session->userdata('first_name');
 ?> </br>
<?php echo $this->session->userdata('verification_key'); echo '</br>';
echo  $key?>
    <form  method="post"  action="<?=site_url('Registration/validate_account');?>">
        <input type= "hidden" name="hidden_key" value="<?=$key?>">
        <input type="submit" value="click here" name="submit_button"> to Activate your account;
    </form>
</h1>