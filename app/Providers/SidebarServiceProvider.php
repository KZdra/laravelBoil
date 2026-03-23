<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.navigation', function ($view) {
            $navItems = [
                [
                    'route' => 'dashboard',
                    'icon' => 'fas fa-th',
                    'label' => __('Dashboard'),
                    // roles=>['admin','user']
                ],

            ];
            $collapseNavItems = [
                [
                    'pIcon' => 'fas fa-briefcase',
                    'label' => __('Data Master'),
                    'list' => [
                        [
                            'route' => 'users.index',
                            'icon' => 'fas fa-users-cog',
                            'label' => __('Manajemen User')
                        ]
                    ]
                ],
            ];

            $view->with([
                'navItems' => $navItems,
                'collapseNavItems' => $collapseNavItems
            ]);
        });
    }
}
