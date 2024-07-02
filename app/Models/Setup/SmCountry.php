<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmCountry extends Model
{
    use HasFactory;
    protected $table='sm_country';

    public function getCountryList(){
        return $this->orderBy('countryname')->get();
    }
    
}
