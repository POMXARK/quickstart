<?php

namespace App\Bankon;

/** * Сервис провайдер для подключения модулей */

use Illuminate\Support\ServiceProvider;


class ModulesServiceProvider extends ServiceProvider
{
    function boot()
    { //получаем список модулей, которые надо подгрузить

        $modules = config("module.modules"); //получаем список модулей, которые надо подгрузить

        if ($modules) {
            while (list(, $module) = each($modules)) {
                //Подключаем роуты для модуля
                if (file_exists(__DIR__ . '/' . $module . '/Routes/routes.php')) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/Routes/routes.php');
                }
                //Загружаем View
                //view('Express::admin')

                if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                    $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
                }

                //Подгружаем миграции
                if (is_dir(__DIR__ . '/' . $module . '/Migration')) {
                    $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migration');
                }

                //Подгружаем переводы
                //trans('Express::messages.welcome')
                if (is_dir(__DIR__ . '/' . $module . '/Lang')) {
                    $this->loadTranslationsFrom(__DIR__ . '/' . $module . '/Lang', $module);
                }
            }

        }
    }

    public function register()
    {

    }
}
