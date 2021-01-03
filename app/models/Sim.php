<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
       protected $fillable = [
        'user_id', 'shop_id','c_back_image_id','c_dist','c_dob','c_f_name','c_font_image_id',
        'c_name','c_new_sim_no','c_pin','c_post','c_ps','c_sex','c_sim_or_gd_image_id','c_state',
        'c_swap_phone','c_uid_number','c_village',
        
    ];
}
