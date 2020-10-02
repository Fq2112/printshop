<?php


namespace App\Support;


class Role
{
    //admin Privilege
    const ROOT = 'root';
    const ADMIN = 'admin';
    const OWNER = 'owner';
    const CS = 'customer service';
    const CREATOR = 'content creator';

    const ALL = [
        Role::OWNER,
        Role::ADMIN,
        Role::ROOT,
        Role::CREATOR,
        Role::CS
    ];
}
