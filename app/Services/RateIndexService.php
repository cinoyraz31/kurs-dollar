<?php

namespace App\Services;

use App\Models\RedisModel;

class RateIndexService extends BaseService{
    private $redisModel;
    public function execute(){
        $this->redisModel = new redisModel();
        $values = $this->redisModel->getAll();
        return $this->data = $values;
    }
}
