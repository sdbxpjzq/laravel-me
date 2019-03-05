create table lottery(
  `id` int unsigned not null auto_increment primary key comment '活动ID',
  `del` tinyint not null default 0 comment '0-未删除 1-删除',


  `created_at` timestamp not null default current_timestamp,
  `updated_at` timestamp not null default current_timestamp on update current_timestamp
);

create table lottery_award(
  `id` int unsigned not null auto_increment primary key comment '奖品ID',
  `data` text not null default '' comment '奖品基本数据',
  `del` tinyint not null default 0 comment '0-未删除 1-删除',
  `created_at` timestamp not null default current_timestamp,
  `updated_at` timestamp not null default current_timestamp on update current_timestamp
);

# 奖池
create table lottery_pond(
  `id` int unsigned not null  primary key comment '活动ID',
  `award_id` int unsigned not null default 0 comment '奖品ID',
  `award_timestamp` timestamp not null default '0000-00-00 00:00:00' comment '奖品时间戳',
  `receive_flag` tinyint unsigned not null default 0 comment '0-未领取 1-领取',
  `del` tinyint unsigned not null default 0 comment '0-未删除 1-删除',
  `created_at` timestamp not null default current_timestamp,
  `updated_at` timestamp not null default current_timestamp on update current_timestamp
);
