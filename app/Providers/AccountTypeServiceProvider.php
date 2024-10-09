<?php

namespace App\Providers;

use App\Models\User\AccountType;
use Illuminate\Support\ServiceProvider;

class AccountTypeServiceProvider extends ServiceProvider
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
        $jobsRoles = [
            'admin',
            'vendor',
            'customer',
        ];

        foreach ($jobsRoles as $type) {
            $total = AccountType::where('name', $type)->count();
            if ($total == 0) {
                AccountType::create(['name' => $type]);
            }
        }
    }
}
