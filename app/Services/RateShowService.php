<?php

namespace App\Services;

use App\Models\RedisModel;
use Illuminate\Support\Facades\Storage;

class RateShowService extends BaseService{
    private $redisModel;

    public $rules = [
        'key'    => 'required',
    ];

    public $ruleMessages = [
        'key.required' => "key must required",
    ];

    public function execute(){
        $this->redisModel = new redisModel();
        $key = str_replace("laravel_database_", "", $this->request["key"]);
        $path = $this->redisModel->get($key);

        $contents = Storage::get("public/".$path);
        $this->data = json_decode($contents, true);
        return;
    }
}
