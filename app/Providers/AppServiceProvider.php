<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\StudentInterface;
use App\Repositories\StudentRepository;
use App\Interfaces\TeacherRepositoryInterface;
use App\Repositories\TeacherRepository;
use App\Interfaces\CourseRepositoryInterface;
use App\Repositories\CourseRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(\App\Interfaces\BatchRepositoryInterface::class, \App\Repositories\BatchRepository::class);
        $this->app->bind(\App\Interfaces\EnrollmentRepositoryInterface::class, \App\Repositories\EnrollmentRepository::class);
        $this->app->bind(\App\Interfaces\StudentRepositoryInterface::class, \App\Repositories\StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}