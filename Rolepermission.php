<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rolepermission extends Model
{
	protected $table = 'role_permissions'; 

    protected $fillable = [
        'role_id','perm_id'
    ];


    public static function getPermissionsByRole($role_id){
    	
    	

    	$permissions = DB::table('role_permissions')->where('role_id',$role_id)->pluck('perm_id');
    	$allowedURL = $data = DB::table('permissions')->select('perm_name')->whereIn('id', $permissions)->pluck('perm_name')->toArray();
    	return $allowedURL;
    	// echo"<pre>";print_r($allowedURL);echo"</pre>";die;

    }
}
