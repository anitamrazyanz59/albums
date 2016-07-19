<!DOCTYPE html>
<html>
<head>
    <title>My Albums</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-theme.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   </head>
<body>

<div class="container">
    <div class="jumbotron background">
        <a href="<?php echo site_url('registration/user_reg'); ?>">Registration</a>

        <?php if($this->session->userdata('user_id') == ''){?>
            <a href="<?php echo site_url('registration/log_in'); ?>">log in</a>
            <?php }else {?>
        <a href="<?php echo site_url('registration/log_out'); ?>">log out</a>
        <?php }?>
    </div>
