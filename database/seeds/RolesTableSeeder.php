<?php
//vazoume to role model gia na dimiourgisoume neous rolous
use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'professor']);
        Role::create(['name' => 'student']);
        
        
    }
}
