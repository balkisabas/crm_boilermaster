<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ash', 
            'email' => 'ash@gmail.com',
            'password' => bcrypt('123456'),
            'alternative_email' => 'ash1@gmail.com',
            'phone' => '1234567',
            'position' => 'Operation Manager',
            'company' => 'BOILERMASTER SDN BHD',
            'status' => 'yes',
            'delete_status' => 'Active',
            'account' => 'default',
        ]);
      
        $role = Role::create(['name' => 'admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    }
}