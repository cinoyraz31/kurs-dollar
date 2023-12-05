<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RateDeleteAllService;

class DeleteKursDollar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-kurs-dollar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $service = new RateDeleteAllService();
        $service->run();
    }
}
