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
    }
}
