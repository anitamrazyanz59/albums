<div class="container white">
    <div class="col-md-2"></div>
    <div class="col-md-8 "><h1 class="chat_class"></h1>


        <?php $user_id = $this->session->userdata('user_id');
        foreach($chats_messages as $chat_messages):?>

            <div class="col-md-12 ">
                <?php
                if($chat_messages['from_id'] == $user_id){
                    $to_name = $chat_messages['to_name'];
                    $pic_src = base_url('uploads/user'.  $chat_messages['from_id'].'/'.$chat_messages['from_pic']); ?>
                    <div class="col-md-10">
                        <h7 class="from_class"><?php echo $chat_messages['from_name']?> </h7>
                        <div>
                            <span class="to_div_class message_span_class right"><?=$chat_messages['message']?>  </span>
                            <div class="clear"></div>
                        </div>

                    </div>
                    <div class="col-md-2"><img class="chat_pic" src="<?=$pic_src?>"> </div>

                <?php }elseif($chat_messages['from_id'] != $user_id) {
                    $pic_src = base_url('uploads/user'. $chat_messages['from_id'].'/'.$chat_messages['from_pic'].''); ?>
                    <div class="col-md-2"><img class="chat_pic" src="<?=$pic_src?>"> </div>
                   <div class="col-md-10">
                       <p class="to_class"><?=$chat_messages['from_name']?> </p>
                      <div>
                          <span class="from_div_class message_span_class left"><?=$chat_messages['message']?>  </span>
                          <div class="clear"></div>
                      </div>

                   </div>
                <?php }?>

            </div>
        <?php endforeach ; ?>



    </div>
    <div class="col-md-2"></div>

    <div class="" id="" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="">
                <div class="modal-header">

                </div>
                <form method="post" action="<?=site_url('messages/new_message/'.$chat_user_id);?>">
                    <div class="modal-body">
                        <textarea name="message" class="message_textarea"> </textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="to" value="<?=$chat_user_id?>">
                        <button type="submit" name="add_new_album" class="btn btn-default send_message" >Send</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>