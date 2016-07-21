<div class="container white">
    <div class="col-md-3"></div>
    <div class="col-md-6 all_chats "><h1 class="chat_class"><?=$user_data['first_name'] ?> chats</h1>


        <?php foreach($chats as $chat):?>
           <a href="<?php echo site_url('messages/get_messages/'.$chat['user_id'].''); ?>">
               <div class="col-md-12 one_chat ">
                   <?php $pic_src = base_url('uploads/user'. $chat['user_id'].'/'.$chat['pic'].'');?>
                   <div class="col-md-4"><img class="chat_pic" src="<?=$pic_src?>"> </div>
                   <div class="col-md-8"><h2><?=$chat['first_name']?>  <?=$chat['last_name']?> </h2></div>
               </div>
           </a>
        <?php endforeach ; ?>



    </div>
    <div class="col-md-3"></div>

    </div>