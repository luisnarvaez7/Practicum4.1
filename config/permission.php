<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Permission Model
    |--------------------------------------------------------------------------
    |
    | This option controls the model that is used to store roles and permissions.
    | You can change this if you want to use a custom model.
    |
    */

    'models' => [
        'role' => Spatie\Permission\Models\Role::class,
        'permission' => Spatie\Permission\Models\Permission::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    |
    | The table names used by this package. You can change them if you want
    | to use custom table names.
    |
    */

    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guard Names
    |--------------------------------------------------------------------------
    |
    | The guards that should be used to authenticate the user. If you're using
    | Jetstream or Laravel's built-in guards, you don't need to modify this.
    |
    */

    'guards' => [
        'web',
    ],
];
