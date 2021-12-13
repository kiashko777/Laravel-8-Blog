<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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


  /*
   * TO CHECK IF USER IS ADMIN
   * */

  public function boot()
  {
    Gate::define('admin', function (User $user) {
      return $user->username === 'kiashko777';
    });
  }
}
