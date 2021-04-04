<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('admins')->truncate();

        DB::table('admin_role')->truncate();

        DB::table('advs')->truncate();

        DB::table('adv_positions')->truncate();

        DB::table('agreements')->truncate();

        DB::table('articles')->truncate();

        DB::table('configs')->truncate();

        DB::table('menus')->truncate();

        DB::table('permissions')->truncate();
   
        DB::table('permission_groups')->truncate();

        DB::table('roles')->truncate();

        DB::table('role_menus')->truncate();

        DB::table('role_permissions')->truncate();
 
        DB::table('sms_signs')->truncate();
        
        DB::table('sms_logs')->truncate();

        DB::table('users')->truncate();
        
      

    }
}
