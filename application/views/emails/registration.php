<h1> Hi <?=$first_name?> </h1>
<p>  Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
Please click this link to activate your account:<a href='<?=site_url('registration/verify/'.$verification_key)?>'> <?=site_url('registration/verify/'.$verification_key)?></a>
</p>