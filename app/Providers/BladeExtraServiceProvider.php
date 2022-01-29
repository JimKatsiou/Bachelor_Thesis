<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;


class BladeExtraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    //CREATE CUSTOM BLADE DIRECTIVE
    public function boot()
    {
        Blade::if('hasrole' , function($expression){ //leei an exei rolo kai ti rolo exei

            //CHECK IF THERE IS ACTUALLY A WALKED IN USER
            if(Auth::user()){  //AN EINAI SUNDEDEMENO CHECKAREI AN EXEO ROLO
                if(Auth::user()->hasAnyRole($expression)){
                    return true;
                }
            }
            return false;
        });

        //gia na boroume na girisoume pisw meta to impersonation
        Blade::if('impersonate' , function (){
            if(session()->get('impersonate')){
                return true;
            }

            return false;
        });
    }
}
