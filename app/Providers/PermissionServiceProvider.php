<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $allTable = DB::select('SHOW TABLES');
        $databaseName = DB::connection()->getDatabaseName();

        foreach ($allTable as $table) {
            $tableNameProperty = 'Tables_in_' . $databaseName;
            $tableName = $table->$tableNameProperty;

            $permissionFields = [
                $tableName . '_list',
                $tableName . '_create',
                $tableName . '_edit',
                $tableName . '_delete',
                $tableName . '_show',
            ];

            foreach ($permissionFields as $permissionField) {
                $total = Permission::where('name', $permissionField)->count();
                if ($total == 0) {
                    Permission::create(['name' => $permissionField, 'table_name' => $tableName]);
                }
            }
        }
    }
}
