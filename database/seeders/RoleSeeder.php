<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);

        //MENU
        Permission::create(['name' => 'admin.home',
                            'description' => 'Pantalla de inicio'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.parametros.index',
                            'description' => 'Pantalla de parametros'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.parametros.edit',
                            'description' => 'Pantalla editar parametros'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bitacoras.index',
                            'description' => 'Pantalla de bitacora'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.respaldos.index',
                            'description' => 'Pantalla de respaldo y recuperacion'])->syncRoles([$role1]);

        //USUARIOS
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Pantalla de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Pantalla de crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Pantalla de editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit.password',
                            'description' => 'Pantalla de cambiar contraseña de usuarios'])->syncRoles([$role1]);

        //ROLES
        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Pantalla de roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Pantalla de crear rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Pantalla de editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.show',
                            'description' => 'Pantalla de mostrar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Pantalla de eliminar rol'])->syncRoles([$role1]);

        //PERSONAS
        Permission::create(['name' => 'admin.personas.index',
                            'description' => 'Pantalla de personas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.personas.create',
                            'description' => 'Pantalla de crear persona'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.personas.edit',
                            'description' => 'Pantalla de editar persona'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.personas.show',
                            'description' => 'Pantalla de mostrar persona'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.personas.destroy',
                            'description' => 'Pantalla de eliminar persona'])->syncRoles([$role1]);
        //EMPLEADOS
        Permission::create(['name' => 'admin.empleados.index',
                            'description' => 'Pantalla de empleados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleados.create',
                            'description' => 'Pantalla de crear empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.edit',
                            'description' => 'Pantalla de editar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.show',
                            'description' => 'Pantalla de mostrar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.destroy',
                            'description' => 'Pantalla de eliminar empleado'])->syncRoles([$role1]);
        //CLIENTES
        Permission::create(['name' => 'admin.clientes.index',
                            'description' => 'Pantalla de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.create',
                            'description' => 'Pantalla de crear cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.edit',
                            'description' => 'Pantalla de editar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.show',
                            'description' => 'Pantalla de mostrar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.destroy',
                            'description' => 'Pantalla de eliminar cliente'])->syncRoles([$role1]);
        //REGISTROS
        Permission::create(['name' => 'admin.registros.index',
                            'description' => 'Pantalla de registros'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.registros.create',
                            'description' => 'Pantalla de crear registro'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.registros.edit',
                            'description' => 'Pantalla de editar registro'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.registros.show',
                            'description' => 'Pantalla de mostrar registro'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.registros.destroy',
                            'description' => 'Pantalla de eliminar registro'])->syncRoles([$role1]);
        //RECURSOS
        Permission::create(['name' => 'admin.recursos.index',
                            'description' => 'Pantalla de recursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.recursos.create',
                            'description' => 'Pantalla de crear recurso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.recursos.edit',
                            'description' => 'Pantalla de editar recurso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.recursos.show',
                            'description' => 'Pantalla de mostrar recurso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.recursos.destroy',
                            'description' => 'Pantalla de eliminar recurso'])->syncRoles([$role1]);
        //PAGOS
        Permission::create(['name' => 'admin.planillas.index',
                            'description' => 'Pantalla de pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.planillas.create',
                            'description' => 'Pantalla de crear pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.planillas.edit',
                            'description' => 'Pantalla de editar pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.planillas.show',
                            'description' => 'Pantalla de mostrar pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.planillas.destroy',
                            'description' => 'Pantalla de eliminar pago'])->syncRoles([$role1]);
    }
}
