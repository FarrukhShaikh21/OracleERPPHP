<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysPasswordPolicyHeader extends Model
{
    use HasFactory;
    protected $table='SYS_PASSWORD_POLICY_HEADER';

    public function getPasswordPolicyList(){
        // dd($this->orderBy('POLICY_NAME')->get());
        return $this->where('company_id',1)->orderBy('POLICY_NAME')->get();
    }
}
