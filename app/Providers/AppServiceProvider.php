<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BusinessLogic\Services\PatientService;
use App\BusinessLogic\Services\DoctorService;
use App\BusinessLogic\Services\RoomService;
use App\BusinessLogic\Services\DoctorSpecializationService;
use App\BusinessLogic\Services\AvailabilityService;
use App\BusinessLogic\Services\AppointmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PatientService::class, function ($app) {
            return new PatientService();
        });

        $this->app->singleton(DoctorService::class, function ($app) {
            return new DoctorService();
        });

        $this->app->singleton(RoomService::class, function ($app) {
            return new RoomService();
        });

        $this->app->singleton(DoctorSpecializationService::class, function ($app) {
            return new DoctorSpecializationService();
        });

        $this->app->singleton(AvailabilityService::class, function ($app) {
            return new AvailabilityService();
        });

        $this->app->singleton(AppointmentService::class, function ($app) {
            return new AppointmentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
