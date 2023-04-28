<?php

namespace App\Entities;

use Myth\Auth\Entities\User as MythUser;

class User extends MythUser
{
    /**
     * Default attributes.
     * @var array
     */
    protected $attributes = [
        'fullname' => 'User',
        'profile_image' => 'user.png',
        'email' => 'noemail'
    ];

    /**
     * Returns a full name: "first last"
     *
     * @return string
     */
    public function getName()
    {
        return trim(trim($this->attributes['fullname']));
    }
    public function getProfileImage()
    {
        return $this->attributes['profile_image'];
    }
    public function getEmail()
    {
        return trim(trim($this->attributes['email']));
    }
}
