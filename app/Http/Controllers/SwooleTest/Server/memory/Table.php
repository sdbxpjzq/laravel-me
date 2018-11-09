<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/9
 * Time: 下午12:48
 */

namespace App\Http\Controllers\Swoole\Server\memory;


class Table
{
    public static function table()
    {
        $table  = new \swoole_table(1024);
        $table->column('id', \swoole_table::TYPE_INT);
        $table->column('name', \swoole_table::TYPE_STRING, 100);
        $table->create();

        // create 之后可以进行 set  get

        $table->set('zongqi_mooc',[ 'id' => 100, 'name' => 'zong']);

        $ret = $table->get('zongqi_mooc');
        print_r($ret);

    }
}

Table::table();
