<?php

namespace App\Providers;

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
    public function boot()
    {
        \Blade::directive('inputTextBox',function($field){
            return "<?php echo \App\InputBox::text($field); ?>";
        });

        \View::creator('team/*','App\TeamPointsComposer');
    }
}
