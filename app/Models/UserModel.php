<?php

namespace App\Models;

use  Myth\Auth\Models\UserModel as MythModel;


/**
 * @method User|null first()
 */
class UserModel extends MythModel
{
    protected $returnType = \App\Entities\User::class;
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'fullname', 'profile_image',
    ];
}
