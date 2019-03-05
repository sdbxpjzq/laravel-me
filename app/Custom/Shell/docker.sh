#!/usr/bin/env bash
yum update -y;
yum install -y yum-utils  device-mapper-persistent-data lvm2;
yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
yum  install  docker-ce-18.06.1.ce -y
systemctl start docker && systemctl enable docker;
systemctl stop firewalld  && systemctl disable firewalld;

#https://img.zongqilive.cn/docker.sh

