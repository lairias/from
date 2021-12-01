<?php
namespace App\Providers;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Parametros;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot(Dispatcher $events)
    {
        // Configuración para fechas en español
        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));

        config(['adminlte.sidebar_collapse' => Parametros::Sidebar()]);
        config(['adminlte.title_postfix' => '| '.Parametros::Nombre_empresa()]);
        config(['adminlte.layout_dark_mode' => Parametros::ModoOscuro()]);

        config(['adminlte.logo' => Parametros::Nombre_Header(10)]);
        config(['auth.passwords.users.expire' => Parametros::TiempoTokenCorreo()]);
        config(['auth.passwords.users.throttle' => Parametros::TiempoTokenCorreo()]);

        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(
                [
                    'text' => 'Inicio',
                    'url'  => 'admin',
                    'icon' => 'fas fa-fw fa-home',
                ],
                [
                    'text' => 'Usuarios',
                    'url'  => 'admin/users',
                    'label'       => User::count(),
                    'icon' => 'fas fa-fw fa-users',
                    'can'  => 'admin.users.index',
                ],
                [
                    'text' => 'Roles',
                    'url'  => 'admin/roles',
                    'icon' => 'fas fa-fw fa-users-cog',
                    'can'  => 'admin.roles.index',
                ],
                ['header' => ''.Parametros::Nombre_Header(11)],
                [
                    'text' => 'Perfil',
                    'url'  => 'user/profile',
                    'icon' => 'fas fa-fw fa-user',
                ],
                ['header' => '' . Parametros::Nombre_Header(12)],
                [
                    'text'    => 'Formularios',
                    'icon'    => 'fas fa-tasks',
                    'submenu' => [
                        [
                            'text' => 'Personas',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/personas',
                            'can'  => 'admin.personas.index',
                        ],
                    
                        [
                            'text' => 'Empleados',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/empleados',
                            'can'  => 'admin.empleados.index',
                        ],
                        [
                            'text' => 'Vales',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/vales',
                            'can'  => 'admin.personas.index',
                        ],
                        [
                            'text' => 'Clientes',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/clientes',
                            'can'  => 'admin.clientes.index',
                        ],
                        [
                            'text' => 'Registro diario',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/registros',
                            'can'  => 'admin.registros.index',
                        ],
                        [
                            'text' => 'Recursos',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/recursos',
                            'can'  => 'admin.recursos.index',
                        ],
                        [
                            'text' => 'Pago empleados',
                            'icon_color' => 'yellow',
                            'url'  => 'admin/planillas',
                            'can'  => 'admin.planillas.index',
                        ],
                    ],
                ],
                [
                    'text' => 'Bitacoras',
                    'url'  => 'admin/bitacoras',
                    'icon'    => 'fas fa-database',
                    'can'  => 'admin.bitacoras.index',
                ],
                [
                    'text' => 'Parametros',
                    'url'  => 'admin/parametros',
                    'icon'    => 'fas fa-clipboard-list',
                    'can'  => 'admin.parametros.index',
                ],
                [
                    'text' => 'Respaldo|Recuperacion',
                    'url'  => 'admin/respaldos',
                    'icon'    => 'fas fa-box',
                    'can'  => 'admin.respaldos.index',
                ],
            );
        });

    }
}

