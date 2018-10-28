<?php

namespace Custom\Facades;

use Illuminate\Support\Facades\Facade;

class MLS extends Facade
{
    protected static function getFacadeAccessor() {
        return 'mls';
    }
}