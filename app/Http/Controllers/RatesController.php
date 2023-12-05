<?php

namespace App\Http\Controllers;
use App\Services\RateIndexService;
use App\Services\RateShowService;
use Illuminate\Support\Facades\Artisan;

class RatesController extends Controller
{
    public function index()
    {
        $service = new RateIndexService();
        $service->run();
        return view('rate-index')->with([
                "rates" => $service->data,
        ]);
    }

    public function show($key){
        $service = new RateShowService([
            "key" => $key,
        ]);
        $service->run();
        return view("rate-show")->with([
            "data" => $service->data,
        ]);
    }

    public function deleteAll(){
        Artisan::call("app:delete-kurs-dollar");
    }
}
