<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/16
 * Time: 下午4:12
 */

namespace App\Http\Controllers\Email\Controller;


class EmailBase
{
    protected $email;

    public function __construct(SendInterface $email)
    {
        $this->email = $email;
    }

    function vSendEmail()
    {
        $this->email->send();
    }


}
