<?php
namespace Kujiang\ServiceSdk\Modules;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Kujiang\ServiceSdk\Modules\Abstracts\SdkBase;

/**
 * 财务Api
 * @author sunxinghua<136506125@qq.cn>
 * @date   2024/1/2
 */
class FinanceSdk extends SdkBase
{
    protected $serviceName = 'finance';

    /**
     * 获取短剧列表
     * @link https://www.baidu.com
     * @param $params
     * @return array
     * @throws Exception
     */
    public static function getUserList($params)
    {
        return self::resful('POST', '/api/user/userList', $params);
    }
}
