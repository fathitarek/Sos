<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Models\route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\menuItems;
use App\Models\setting;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        $menu = menuItems::oldest()->where('menu_id',1)->get();
        $menu_ar = menuItems::oldest()->where('menu_id',8)->get();
        $setting = setting::oldest()->get();
        view()->share('menu', $menu);
        view()->share('menu_ar', $menu_ar);
        view()->share('setting', $setting);

          // @super
          Blade::if('super', function () {
              return auth()->check() && auth()->user()->isSuperUser();
          });

          // @docAdmin
          Blade::if('docAdmin', function () {
              return auth()->check() && auth()->user()->isdoctorAdmin();
          });

          // @companyAdmin
          Blade::if('companyAdmin', function () {
              return auth()->check() && auth()->user()->isCompanyAdmin();
          });

          // @hrAdmin
          Blade::if('docAdmin', function () {
              return auth()->check() && auth()->user()->isHrAdmin();
          });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
