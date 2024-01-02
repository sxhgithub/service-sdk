<?php
namespace Kujiang\ServiceSdk\Modules\Abstracts;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Stream;
use Throwable;

abstract class SdkBase
{
    // 请求host
    protected static $host;

    /**
     * 访问的请求host
     * @param $host
     * @return void
     */

    public static function setHost($host)
    {
        static::$host = $host;
    }

    /**
     * 请求
     * @param $method
     * @param $path
     * @param $params
     * @return mixed
     * @throws Exception|GuzzleException
     */
    protected static function resful($method, $path, $params)
    {
        $url = static::$host.$path;
        $client = new Client();
        $resp = $client->request($method, $url, ['json' => $params]);
        $stream = $resp->getBody();
        if (!($stream instanceof Stream)) {
            throw new Exception("请求失败");
        }
        return json_decode($stream->getContents(), true);
    }
}
