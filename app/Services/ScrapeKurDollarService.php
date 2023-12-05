<?php

namespace App\Services;
use App\Helpers\GlobalHelper;
use App\Services\BaseService;
use Goutte\Client;
use Illuminate\Support\Facades\Storage;
use App\Models\RedisModel;
class ScrapeKurDollarService extends BaseService
{
    private $redisModel;
    public function execute()
    {
        $this->redisModel = new redisModel();
        $client = new Client();
        $website = $client->request(
            'GET',
            'https://kursdollar.org');

        $header = $website->filter('.container table.in_table tr[class="title_table"]')
            ->each(function ($node) {
                $bankDescription = $node->children()->eq(1)->text();
                $worldSpots = $node->children()->eq(2)->text();

                return [
                    "indonesia" => $bankDescription,
                    "word" => $worldSpots,
                ];
            });

        $data = $website->filter('.container table.in_table tr[id^="tr_id"]')
            ->each(function ($node) {
                $currency = $node->children()->eq(0)->text();
                $currencyArr = explode("\u{A0}", $currency);

                $buy = $node->children()->eq(1)->text();
                $buyArr = explode(" ", $buy);

                $sell = $node->children()->eq(2)->text();
                $sellArr = explode(" ", $sell);

                $average = $node->children()->eq(3)->text();
                $averageArr = explode(" ", $average);

                return [
                    "currency" => $currencyArr[0],
                    "buy" => $buyArr[0],
                    "sell" => $sellArr[0],
                    "average" => $averageArr[0],
                    "word_rate" => $node->children()->eq(4)->text(),
                ];
        });
        $meta = array_merge([
            "date" => date("d-m-Y"),
            "day" => date("l"),
        ], $header[0]);
        $dataBeforeStoreJson = GlobalHelper::decoratorResponse($meta, $data);
        $keyName = sprintf("rate-%s.json", date("d-m-Y--H-i-s"));
        $filename = sprintf("json/%s", $keyName);

        $this->redisModel->set($keyName, $filename);
        Storage::disk('public')->put($filename, json_encode($dataBeforeStoreJson));
    }
}
