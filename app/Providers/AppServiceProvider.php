<?php

namespace App\Providers;

use App\data_access\executors\RemoteProfessorsExecutor;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\executors\connections\ConnectionsExecutor;
use App\Http\data_access\executors\connections\ConnectionsExecutorImpl;
use App\Http\data_access\executors\lessons\LessonsExecutor;
use App\Http\data_access\executors\lessons\LessonsExecutorImpl;
use App\Http\data_access\executors\participations\ParticipationsExecutor;
use App\Http\data_access\executors\participations\ParticipationsExecutorImpl;
use App\Http\data_access\executors\remote_professors\RemoteProfessorsExecutorImpl;
use App\Http\data_access\executors\status\StatusExecutor;
use App\Http\data_access\executors\status\StatusExecutorImpl;
use App\Http\data_access\executors\universities\UniversitiesExecutor;
use App\Http\data_access\executors\universities\UniversitiesExecutorImpl;
use App\Http\data_access\executors\users\UsersExecutorImpl;
use App\Http\data_access\queries\_users\UsersQueries;
use App\Http\data_access\queries\_users\UsersQueriesImpl;
use App\Http\data_access\queries\connections\ConnectionsQueriesImpl;
use App\Http\data_access\queries\lessons\ConnectionsQueries;
use App\Http\data_access\queries\lessons\LessonsQueries;
use App\Http\data_access\queries\lessons\LessonsQueriesImpl;
use App\Http\data_access\queries\participations\ParticipationsQueries;
use App\Http\data_access\queries\participations\ParticipationsQueriesImpl;
use App\Http\data_access\queries\remote_professors\RemoteProfessorsQueries;
use App\Http\data_access\queries\remote_professors\RemoteProfessorsQueriesImpl;
use App\Http\data_access\queries\status\StatusQueries;
use App\Http\data_access\queries\status\StatusQueriesImpl;
use App\Http\data_access\queries\universities\UniversitiesQueries;
use App\Http\data_access\queries\universities\UniversitiesQueriesImpl;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        $this->app->bind(
            ConnectionsExecutor::class,
            ConnectionsExecutorImpl::class
        );

        $this->app->bind(
            ConnectionsQueries::class,
            ConnectionsQueriesImpl::class
        );

        $this->app->bind(
            LessonsExecutor::class,
            LessonsExecutorImpl::class
        );

        $this->app->bind(
            LessonsQueries::class,
            LessonsQueriesImpl::class
        );

        $this->app->bind(
            UniversitiesExecutor::class,
            UniversitiesExecutorImpl::class
        );

        $this->app->bind(
            UniversitiesQueries::class,
            UniversitiesQueriesImpl::class
        );

        $this->app->bind(
            UsersExecutor::class,
            UsersExecutorImpl::class
        );

        $this->app->bind(
            UsersQueries::class,
            UsersQueriesImpl::class
        );


        $this->app->bind(
            LessonsQueries::class,
            LessonsQueriesImpl::class
        );

        $this->app->bind(
            ParticipationsExecutor::class,
            ParticipationsExecutorImpl::class
        );

        $this->app->bind(
            ParticipationsQueries::class,
            ParticipationsQueriesImpl::class
        );

        $this->app->bind(
            RemoteProfessorsExecutor::class,
            RemoteProfessorsExecutorImpl::class
        );

        $this->app->bind(
            RemoteProfessorsQueries::class,
            RemoteProfessorsQueriesImpl::class
        );

        $this->app->bind(
            StatusExecutor::class,
            StatusExecutorImpl::class
        );

        $this->app->bind(
            StatusQueries::class,
            StatusQueriesImpl::class
        );

        // custome direction
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role == 0;

            // admin is just a directive name that i want to create
            // return korbe authentication check korbe login ache kina
            // && auth () jodi login means user hoy ebong er role ID 1 kina

        });

        app()->bind('app', Container::class);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
