<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/6
 * Time: 上午9:51
 */

namespace Custom\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class MySendEmail
{
    public function __construct($sFromName, $sToEmail, $sEmailTitle, $sEmailContent)
    {
        //实例化PHPMailer核心类
        $mail = new PHPMailer(true);
        //使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;
        //链接qq域名邮箱的服务器地址
        $mail->Host = env('MAIL_HOST');
        //设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->Port = env('MAIL_PORT');
        //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Hostname = 'https://www.zongqilive.cn/';

        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';

        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = $sFromName;

        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username = env('MAIL_USERNAME');

        //smtp登录的密码 使用生成的授权码（就刚才保存的最新的授权码）
        $mail->Password = env('MAIL_PASSWORD');

        //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->From = env('MAIL_USERNAME');

        //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->isHTML(false);

        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
        $mail->addAddress($sToEmail, '尊敬的客户');

        //添加多个收件人 则多次调用方法即可
        // $mail->addAddress('xxx@163.com','尊敬的客户');

        //添加该邮件的主题
        $mail->Subject = $sEmailTitle;

        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串
        $mail->Body = $sEmailContent;

        $status = $mail->send();
        //判断与提示信息
//        if($status) {
//            return true;
//        }else{
//            return false;
//        }
    }
}
