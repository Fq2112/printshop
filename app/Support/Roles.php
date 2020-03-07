<?php


namespace App\Support;


class Roles
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
