<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysUserPasswordPolicy extends Model
{
    use HasFactory;
    protected $table='SYS_USER_PASSWORD_POLICY';

    public function getUserPasswordPolicyList($userid){
        // dd($this->orderBy('POLICY_NAME')->get());
        return $this->where('USER_SNO',$userid)->get();
    }
}
