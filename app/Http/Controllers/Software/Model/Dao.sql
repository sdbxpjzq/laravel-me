create table software(
  `id` int unsigned not null auto_increment primary key ,
  `name` varchar(50) not null default '' comment '软件名称',
  `link` text not null default '' comment '软件下载地址',
  `ctime` timestamp not null default current_timestamp,
  `mtime` timestamp not null default current_timestamp on update current_timestamp
);
