<?php

namespace App\Helpers;

use File;

class GlobalHelper
{
    public static function _formatValidationError($array, $onlyFirst = 'n')
    {
        $errorE = [];
        foreach ($array as $key => $val) {
            $errorE[] = $val[0];
        }
        $errorMessages = implode(' | ', $errorE);
        return ($onlyFirst == 'y') ? $errorE[0] : $errorMessages;
    }

    public static function decoratorResponse($meta, $data)
    {
        return [
            "meta" => $meta,
            "rates" => $data,
        ];
    }

    public static function getStorageJson($key)
    {
        $keyName = str_replace("laravel_database_", "", $key);
        $path = $redisModel->get($keyName);
        $fullPath = storage_path() . "/app/public/". $path;
        if (!File::exists($fullPath)) {
            throw new Exception("Invalid File");
        }

        $file = File::get($fullPath); // string
    }
}
