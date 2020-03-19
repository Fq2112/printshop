<?php


namespace App\Support;


class Role
{
    //admin Privilege
    const ROOT = 'root';
    const ADMIN = 'admin';
    const OWNER = 'owner';

    const ALL = [
        Role::OWNER,
        Role::ADMIN,
        Role::ROOT,
    ];
}
