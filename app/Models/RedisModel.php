<?php

namespace App\Models;

use Illuminate\Support\Facades\Redis;

class RedisModel
{
    public function get($key)
    {
        $data = Redis::get($key);
        if ($data) {
            return json_decode($data);
        }
        return null;
    }

    public function getAll()
    {
        return Redis::keys("*");
    }

    public function set($key, $data, $expireTime = 14 * 24 * 60 * 60)
    {
        Redis::set(
            $key,
            json_encode($data),
            'EX',
            $expireTime
        );
    }

    public function del($key)
    {
        Redis::del($key);
    }
}
