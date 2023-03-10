<?php

return array(
    0 => [
        'name'    => 'gateways',
        'title'   => '短信服务商',
        'type'    => 'select',
        'options' => [
            'aliyun'       => '阿里云',
            'aliyunrest'   => '阿里云Rest',
            'yunpian'      => '云片',
            'submail'      => 'Submail',
            'luosimao'     => '螺丝帽',
            'yuntongxun'   => '容联云通讯',
            'huyi'         => '互亿无线',
            'juhe'         => '聚合数据',
            'sendcloud'    => 'SendCloud',
            'baidu'        => '百度云',
            'huaxin'       => '华信短信平台',
            'chuanglan'    => '253云通讯（创蓝）',
            'rongcloud'    => '融云',
            'tianyiwuxian' => '天毅无线',
            'twilio'       => 'twilio',
            'qcloud'       => '腾讯云 SMS',
            'avatardata'   => '阿凡达数据',
            'huawei'       => '华为云 SMS',
            'yunxin'       => '网易云信',
            'yunzhixun'    => '云之讯',
            'kingtto'      => '凯信通',
            'qiniu'        => '七牛云',
            'ucloud'       => 'Ucloud',
        ],
        'value'   => 'aliyun',
        'tips'    => '',
    ],
    1 => array(
        'name'  => 'config',
        'title' => '短信配置',
        'type'  => 'array',
        'value' => array(
            'access_key_id'     => '',
            'access_key_secret' => '',
            'sign_name'         => '',
        ),
        'tip'   => '',
    ),
    2 => array(
        'name'  => 'template',
        'title' => '短信模板',
        'type'  => 'array',
        'value' => array(
            'register'  => '',
            'resetpwd'  => '',
            'changepwd' => '',
            'profile'   => '',
            'actmobile' => '',
        ),
        'tip'   => '',
    ),
);
