<div class="row">
    <?php $user_id = $this->session->userdata('user_id'); ?>
    <div class="col-md-2"> <img class="pic" src="<?php echo base_url('uploads/user'.$user_id.'/'.$this->session->userdata('pic').'') ?>"></div>
    <div class="col-md-10"><h1> Hi <?php echo  $this->session->userdata('first_name')?> </h1>
        <h1>Album <?=$album_name?></h1>
  </div>
</div>
<div class="col-md-12 albums_container" >

<?php if($this->session->userdata('upload_error') &&  $this->session->userdata('upload_error') != 0){
    $errors = $this->session->userdata('upload_error');
    foreach($errors as $error){
        echo '<div class="red_class">'.$error.'</div>';
    }

} ?>
    <?php if(isset($pics)){
        foreach($pics as  $pic) :?>
                <div class="col-md-2 albums_class">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"  data-title=""  data-caption="<?=$album_name?> pictures" data-image="<?php echo base_url('uploads/user'.$pic['user_id'].'/'.$pic['album_id'].'/'.$pic['pic_src'].'') ?>" data-target="#image-gallery">
                        <img class="img-responsive pic" src="<?php echo base_url('uploads/user'.$pic['user_id'].'/'.$pic['album_id'].'/'.$pic['pic_src'].'') ?>" >
                    </a>
                    <?php if($this->session->userdata('user_id') == $pic['user_id']): ?>
                         <a class="del_confirm" href='<?=site_url('albums/del_album_pic/'.$pic['album_id'].'/'.$pic['id'])?>'>Delete picture</a>
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

<!--Pic modal -->

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pic modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add picture</h4>
            </div>
            <?php echo form_open_multipart('albums/add_album_pic');?>
                <input type="hidden" value="<?=$album_id?>" name="album_id">

                    <div class="add_pic_modal_button modal-footer">
                        <input type="file" name="userfile" size="20" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="upload" class="btn btn-default" >upload</button>
                    </div>
            </form>
        </div>

    </div>
</div>
<!-- Modal -->