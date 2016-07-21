<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// product model zzzz hgfgf tgrt
// product model ccc
class album_model extends CI_Model
{
    /**
     *
     * @return array
     */

    public function add_album($added_data){
        $this->db->insert('albums', $added_data);
        $query = $this->db  ->select('id')
            ->where('album_name',  $added_data['album_name'])
            ->where('user_id',  $added_data['user_id'])
            ->get('albums');
        $row = $query->row();
        return $row->id;
    }

    public function get_album($album_id){

        $query = $this->db  ->select('album_name')
                            ->where('id', $album_id)
                            ->get('albums');
        $row = $query->row();
        return $row->album_name;
    }


    public function get_user_albums($user_id){
        $query = $this->db  ->where('user_id', $user_id )
                            ->get('albums');
        return $query->result_array();

    }

    public function show_album_and_pics($album_id){
        $query = $this->db
                            ->where('albums.id', $album_id)
                            ->join('pictures', 'pictures.album_id = albums.id ')
                            ->order_by('pictures.id', 'DESC')
                            ->get('albums');
        return $query->result_array();
    }

    public function add_pic($pic_data){
        $this->db->insert('pictures', $pic_data);

    }

    public function del_album_pic($pic_data){
        $this->load->helper("file");
        $result = $this->db  ->join('albums', 'albums.id = pictures.album_id')
                            ->where('pictures.id',  $pic_data['pic_id'])
                            ->where('albums.user_id',  $pic_data['user_id'])
                            ->where('pictures.album_id',  $pic_data['album_id'])
                            ->limit(1)
                            ->get('pictures');
        if ($result->num_rows()) {
            $row = $result->row();
                $this->db   ->where('id',  $pic_data['pic_id'])
                            ->where('album_id',  $pic_data['album_id'])
                            ->delete('pictures');
            $path = $_SERVER['DOCUMENT_ROOT'].'/uploads/user'.$pic_data['user_id'].'/'.$pic_data['album_id'].'/'.$row->pic_src ;

            if(is_file($path)){
                unlink($path);
            }

        }

    }

    public function del_album($album_id){
        $this->load->helper("file");
        $user_id = $this->session->userdata('user_id');

        $this->db   ->where('id',  $album_id)
                    ->where('user_id', $user_id)
                    ->delete('albums');
        $path = $_SERVER['DOCUMENT_ROOT'].'/uploads/user'.$user_id.'/'.$album_id ;
        $this->rrmdir($path);

    }

    public function get_all_users(){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db  ->where('status', '1')
                            ->where('user_id !=', $user_id)
                            ->get('users');
        return $query->result_array();
    }

    public function get_user_data($user_id){
        $query = $this->db  ->select('first_name, last_name, pic')
            ->where('user_id', $user_id)
            ->get('users');
        $row = $query->row();
        $name_pic = [
            'first_name' => $row->first_name,
            'last_name'  => $row-> last_name,
            'pic'        => $row->pic
         ];
        return $name_pic;
    }


    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }

}
