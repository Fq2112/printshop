<?php


namespace App\Support;


class StatusProgress
{
    //admin Privilege
    const NEW = 'new';
    const START_PRODUCTION = 'start';
    const FINISH_PRODUCTION = 'finish';
    const SHIPPING = 'shipping';
    const RECEIVED = 'received';

    const ALL = [
        StatusProgress::NEW,
        StatusProgress::START_PRODUCTION,
        StatusProgress::FINISH_PRODUCTION,
        StatusProgress::SHIPPING,
        StatusProgress::RECEIVED,
    ];
}
