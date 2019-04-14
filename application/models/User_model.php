<?php

class User_model extends CI_Model
{
    private $table='user';

    public function checkLogin($data)
    {
        $input = ['username'=>$data['username'],
                    'password'=>$data['password']
                ];
        $val = $this->db->get_where($this->table,$input);
        if ($val->num_rows() > 0) {
            $outputs = $val->row();
        }
        else{
            $outputs = null;
        }
        return $outputs;
    }
}
