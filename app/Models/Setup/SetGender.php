<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetGender extends Model
{
    use HasFactory;
    protected $table='set_gender';

    ///this is list for query
    public function getGenderList(){
        return $this->get();
    }
    
}
