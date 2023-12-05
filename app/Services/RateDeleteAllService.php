<?php

namespace App\Services;

use App\Models\RedisModel;
use Illuminate\Support\Facades\Storage;

class RateDeleteAllService extends BaseService{
    private $redisModel;
    public function execute(){
        $this->redisModel = new redisModel();
        $values = $this->redisModel->getAll();

        if(count($values) > 0){
            foreach ($values as $key) {
                $keyName = str_replace("laravel_database_", "", $key);
                Storage::disk('public')->delete(sprintf("json/%s", $keyName));

                $this->redisModel->del($keyName);
            }
        }
    }
}
