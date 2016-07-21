
    <div class="row">
        <?php if(($name_pic['pic']) != ''){
            $pic_src = base_url('uploads/user'.$user_id.'/'.$name_pic['pic'].'');
        } else {
            $pic_src = base_url('uploads/photo.png');
        }
        ?>
        <div class="col-md-2"> <img class="pic" src="<?php echo $pic_src ?>"></div>
        <div class="col-md-10"><h1><?php echo $name_pic['first_name'].' '.$name_pic['last_name'];  ?> </h1>
            <?php if($visited == ''){ ?>
                 <?php echo form_open_multipart('upload/do_upload');?>
                <input type="file" name="userfile" size="20" />
                <br />
                <input type="submit" name="upload" value="upload" />
                </form>
            <?php } else{ ?>
              <div class="col-md-2">
            <button type="button" class="btn btn-success " aria-label="Left Align"  data-toggle="modal" data-target="#MessageModal">
                <span class="glyphicon glyphicon-envelope message_span" aria-hidden="true"  data-toggle="tooltip" title="write message to <?=$name_pic['first_name']?>" ></span>
            </button>
            </div>
            <?php }?>

        </div>
    </div>
    <div class="col-md-12 albums_container" >

        <?php  if(isset($data['albums'])){
            foreach($data['albums'] as  $album) :?>
                <div class="col-md-2 albums_class" >
                    <a href='<?=site_url('albums/album/'.$album['id'].'/'.$album['user_id'])?>'>
                    <button type="button" class="btn btn-primary btn-lg albums_btn"  aria-label="Left Align"  data-toggle="tooltip" title="<?=$album['album_name'];?>">
                        <span class="span_class"  aria-hidden="true"><p><?=$album['album_name'];?></p></span>
                    </button> </a>
                    <?php if($this->session->userdata('user_id') == $album['user_id']): ?>
                        <a href='<?=site_url('albums/del_album/'.$album['id'])?>' class="btn btn-danger-outline">
                            <span class="glyphicon glyphicon-trash"></span> Delete album
                        </a>
                    <?php endif?>

                </div>
            <?php endforeach;
        }  else{
            echo '<p> No alboms to show </p>';
        }?>
        <?php if($visited == ''): ?>
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-lg  albums_container_btn"  aria-label="Left Align"  data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus albums_container_span" data-toggle="tooltip" title="Add new Album!" aria-hidden="true"></span>
            </button>
        </div>
        <?php endif;?>
    </div>
    <!-- MessageModal -->
    <div class="modal fade" id="MessageModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Write message to <?=$name_pic['first_name']?></h4>
                </div>
                <form method="post" action="<?=site_url('messages/new_message/'.$user_id);?>">
                    <div class="modal-body">
                        <textarea name="message" class="message_textarea"> </textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="to" value="<?=$user_id?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_new_album" class="btn btn-default send_message" >Send</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- MessageModal -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add album name</h4>
                </div>
                <form method="post" action="<?=site_url('albums/add_album');?>">
                    <div class="modal-body">
                        <input value="" name="new_album_name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_new_album" class="btn btn-default" >Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Modal -->