
<?php
if(isset($users)){
    foreach($users as  $user) :?>
        <div class="col-md-2 albums_class">
            <a class="thumbnail user_class" href='<?=site_url('albums/get_albums/'.$user['user_id'])?>' >
                <p><?=$user['first_name']?> </p>
            </a>
        </div>
    <?php endforeach;
}?>