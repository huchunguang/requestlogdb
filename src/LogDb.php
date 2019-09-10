<?php

namespace Qnn\RequestLog;

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Request;
use Monolog\Logger;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 28/2/15
 * Time: 2:15 PM
 */

class LogDb extends LogDbBase
{

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }
    
    /*
     * 获取logdb配置文件
     * @return array(server_ip, port)
     * server_ip string  logdb服务ip
     * port int logdb端口
     */
    public function getLogDbConfig()
    {
        $arr = $this->config['logRequestDB'];
        return !empty($arr) ? $arr : array();
    }

    /**
     * LogDB服务所在IP
     * @return string
     */
    public function getServerIp()
    {
        $logdbArr = $this->getLogDbConfig();
        return isset($logdbArr['server_ip']) ? $logdbArr['server_ip'] : '';
    }

    /**
     * LogDB服务所在端口
     * @return string
     */
    public function getServerPort()
    {
        $logdbArr = $this->getLogDbConfig();
        return isset($logdbArr['port']) ? $logdbArr['port'] : '';
    }

    /**
     * LogDB服务入库表字段类型的配置
     * @return string
     */
    public function getTableFieldTypes()
    {
        $logdbArr = $this->getLogDbConfig();
        return isset($logdbArr['fields']) ? $logdbArr['fields'] : '';
    }

    public static function countUser($date, $ud_id)
    {
        #iOS限制广告跟踪（全0）  H5旧版固定UD-ID（唯一）
        if (in_array($ud_id, ['', null, '00000000-0000-0000-0000-000000000000', '727c4d27d8bb85dec0673045df247e4f'])) {
            return 0;
        }

        try {
            $table = 'api_log_' . str_replace('-', '', $date);
            return \Illuminate\Support\Facades\DB::select("SELECT COUNT(DISTINCT user_id) FROM $table WHERE ud_id = :ud_id AND user_id NOT IN ('', '0')", ['ud_id' => $ud_id]);
        } catch (Exception $e) {
            Log::info(__METHOD__ . "($date, $ud_id) failed: " . $e->getMessage());
            return 0;
        }
    }
}
