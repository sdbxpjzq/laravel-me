
<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/12/5
 * Time: 下午4:45
 */
function getValues() {
    yield 'value';
}

// 输出字符串 "value"
foreach (getValues() as $getValue) {
    echo $getValue;
}

