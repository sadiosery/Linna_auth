<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $admin=User:: create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> hash::make('password')
        ]);

        $auteur=User:: create([
            'name'=>'auteur',
            'email'=>'auteur@auteur.com',
            'password'=> hash::make('password')
        ]);

        $utilisateurs=User:: create([
            'name'=>'utilisateurs',
            'email'=>'utilisateurs@utilisateurs.com',
            'password'=> hash::make('password')
        ]);

        $adminRole=Role::where('name','admin')->first();
        $auteurRole=Role::where('name','auteur')->first();
        $utilisateursRole=Role::where('name','utilisateurs')->first();

        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $utilisateurs->roles()->attach($utilisateurs);
    }


}
