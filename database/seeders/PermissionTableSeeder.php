<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'list-customer',
            'create-customer',
            'edit-customer',
            'delete-customer',
            'list-vendor',
            'create-vendor',
            'edit-vendor',
            'delete-vendor',
            'list-branch',
            'create-branch',
            'edit-branch',
            'delete-branch',
            'list-role',
            'create-role',
            'edit-role',
            'delete-role',
            'list-proposal',
            'create-proposal',
            'edit-proposal',
            'delete-proposal',
            'list-user',
            'create-user',
            'edit-user',
            'delete-user',
            'list-company',
            'create-company',
            'edit-company',
            'delete-company',
            'list-docType',
            'create-docType',
            'edit-docType',
            'delete-docType',
            'list-position',
            'create-position',
            'edit-position',
            'delete-position',
            'list-proposaltype',
            'create-proposaltype',
            'edit-proposaltype',
            'delete-proposaltype',
            'list-proposalstatus',
            'create-proposalstatus',
            'edit-proposalstatus',
            'delete-proposalstatus',
            'view_proposalreport'
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}