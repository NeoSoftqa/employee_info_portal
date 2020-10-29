<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
                [
                    'perm_name' =>'create_employee',
                ],[
                    'perm_name' =>'user_create',
                ],[
                    'perm_name' =>'importExportView',
                ],[
                    'perm_name' =>'employee_export_import',
                ],[
                    'perm_name' =>'employee_edit',
                ],[
                    'perm_name' =>'employee_view',
                ]




            ]);
    }
}
