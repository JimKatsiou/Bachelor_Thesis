<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
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
        //CREATE ROLES

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();
        $professorRole = Role::where('name', 'professor')->first(); 
        $studentRole = Role::where('name', 'student')->first();
        

        //CREATE USERS

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => bcrypt('author')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $professor = User::create([
            'name' => 'Professor',
            'email' => 'professor@professor.com',
            'password' => bcrypt('professor')
        ]);


        $student = User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'password' => bcrypt('student')
        ]);

    //TO ATTACH THE ROLE TO THE USER

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
        $professor->roles()->attach($professorRole);
        $student->roles()->attach($studentRole);
       
        //factory(App\User::class, 50)->create();
    }
}
