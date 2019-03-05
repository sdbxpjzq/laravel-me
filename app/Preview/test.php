<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/12/4
 * Time: 下午8:03
 */
//echo '原始父进程' . getmypid() . PHP_EOL;
function bb()
{
    $i=1;
    $pid = pcntl_fork();
    if ($pid > 0) {
        // do nothing ...
    } else if (0 == $pid) {
        echo '子进程i:' . $i . PHP_EOL;
    }
}
bb();

//$num = 1;
//$pid = pcntl_fork();
//if ($pid > 0) {
//     do nothing ...
//} else if (0 == $pid) {
//    $num++;
//    exit;
//}

//echo $num;


//for( $i = 1; $i <= 3 ; $i++ ){
//    $pid = pcntl_fork();
//    if( $pid > 0 ){
//        // do nothing ...
//    } else if( 0 == $pid ){
//        echo "儿子".PHP_EOL;
//        exit;
//    }
//}

//function a() {
//    sleep(5);
//    echo '1';
//    return 1;
//}
//
//function bb()
//{
//    for ($i=1;$i <= 3; $i++) {
////        yield a();
//         a();
//    }
//}








