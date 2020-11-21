<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role:: create(['name'=>'admin']);
        Role:: create(['name'=>'auteur']);
        Role:: create(['name'=>'utilisateurs']);
    }
}
