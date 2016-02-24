<?php

namespace TaixuDayDayUp\Ssoclient;

use Illuminate\Encryption\Encrypter;
use Mockery\Exception;
use PRedis;
use Response;

class SsoClient {

    private $ssoConfig;

    private $ssoRedis;

    private $redisKey;

    private $user;

    private $crypt;


    public function __construct()
    {
        $this->ssoConfig = \Config::get('sso');
        $this->ssoRedis = PRedis::connection('sso');
        $this->redisKey = session('redisKey');
        $this->user = isset(unserialize(unserialize($this->ssoRedis->get($this->redisKey)))['user']) ?
            unserialize(unserialize($this->ssoRedis->get($this->redisKey)))['user'] : null;

        $this->crypt = new Encrypter($this->ssoConfig['key']);
    }

    /**
     * 是否同步
     *
     * @return boolean
     */
    public function isSync()
    {
        return $this->ssoRedis->exists($this->redisKey);
    }

    /**
     *
    **/
    public function saveRedisKey($token)
    {
        //var_dump($token); exit(0);
        try {
            $redisKey = $this->crypt->decrypt($token);

            session(['redisKey' => $redisKey]);

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * 返回用户信息
    **/
    public function getUser()
    {
        if (!$this->redisKey || !$this->user) {
            return null;
        }

        $this->ssoRedis->expire($this->redisKey, $this->ssoConfig['expire']);

        return $this->user['info'];
    }

    /**
     * 基础检测
    **/
    public function check()
    {
        if (!$this->redisKey || !$this->user) {
            return ['status' => false];
        }

        if (!$this->user['info']->activated) {
            return ['url' => $this->ssoConfig['server']['syncSignin']];
        }

        return ['status' => true];
    }

    /**
     * 权限验证
    **/
    public function hasAccess($route)
    {
        $permissions = $this->user['permissions'];

        if (in_array('superuser', $permissions)) {
            return true;
        }

        $route = $this->ssoConfig['client_prex_name'] . '.' . $route;

        return in_array($route, $permissions) ? true : false;
    }

}