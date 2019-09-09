<?php
return array( // logdb server配置
    'server_ip' => env('request_log_ip', 'logdb.lb-lan.kuainiujinke.com'),
    'port' => env('request_log_port', '32060'),
    'fields'=>[
        'user_id' => 'varchar',
        'user_token' => 'varchar',
        'api_name' => 'varchar',
        'param' => 'varchar',
        'status' => 'tinyint',
        'err_code' => 'int',
        'err_message' => 'varchar',
        'user_ip' => 'varchar',
        'server_ip' => 'varchar',
        'end_time' => 'int',
        'spend_time' => 'float',
        'app_id' => 'varchar',
        'ud_id' => 'varchar',
        'request_method' => 'varchar',
        'user_sys' => 'varchar',
        'user_phone' => 'varchar',
        'host' => 'varchar',
    ],
    
);
