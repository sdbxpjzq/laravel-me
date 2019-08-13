<?php


namespace App\Http\Controllers\Test;


class T1
{
    public static function indexT1()
    {
        for ($i = 0; $i < 10; $i++) {
            file_put_contents(__DIR__ . '/zongqi.txt', $i, FILE_APPEND);
            sleep(1);
        }
    }
}

T1::indexT1();
