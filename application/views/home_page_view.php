
    <div class="row">
        <?php $user_id = $this->session->userdata('user_id'); ?>
        <div class="col-md-2"> <img class="pic" src="<?php echo base_url('uploads/user'.$user_id.'/'.$this->session->userdata('pic').'') ?>"></div>
        <div class="col-md-10"><h1> Hi <?php echo  $this->session->userdata('first_name')?> </h1>
            <a href="<?php echo site_url('/registration/log_out')?>>"></a>
            <?php echo form_open_multipart('upload/do_upload');?>

            <input type="file" name="userfile" size="20" />
            <br />
            <input type="submit" name="upload" value="upload" />

            </form>

        </div>
    </div>
    <div class="col-md-12 albums_container" >

        <?php if(isset($albums)){
            foreach($albums as  $album) :?>
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
        }?>
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-lg  albums_container_btn"  aria-label="Left Align"  data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus albums_container_span" data-toggle="tooltip" title="Add new Album!" aria-hidden="true"></span>
            </button>
        </div>
    </div>


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