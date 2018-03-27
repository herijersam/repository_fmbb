<?php
namespace App\Providers;
use App\Image;
use Illuminate\Support\ServiceProvider;
class DynamicClassname extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('classname_array',Image::all());
        });

    }
}