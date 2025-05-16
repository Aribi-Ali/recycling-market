<?php

namespace App\Console\Commands;

use App\Models\city;
use App\Models\Daira;
use App\Models\Wilaya;
use Illuminate\Console\Command;

class setupLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-locations';

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
        Wilaya::create([
            'name' => 'Alger',
            'code' => '16',
        ]);
        Wilaya::create([
            'name' => 'Oran',
            'code' => '31',
        ]);
        Wilaya::create([
            'name' => 'Sidi Bel Abbes',
            'code' => '22',
        ]);


        Daira::create([
            'name' => 'bab elwad',
            'code' => '1601',
            'wilaya_id' => 1,
        ]);
        Daira::create([
            'name' => 'harach',
            'code' => '1602',
            'wilaya_id' => 1,
        ]);
        Daira::create([
            'name' => 'alger center',
            'code' => '1603',
            'wilaya_id' => 1,
        ]);
        Daira::create([
            'name' => 'Bir Mourad Raïs',
            'code' => '3101',
            'wilaya_id' => 2,
        ]);
        Daira::create([
            'name' => 'ain larebaa',
            'code' => '3102',
            'wilaya_id' => 2,
        ]);
        Daira::create([
            'name' => 'Telagh',
            'code' => '2501',
            'wilaya_id' => 3,
        ]);
        Daira::create([
            'name' => 'Tasan',
            'code' => '2502',
            'wilaya_id' => 3,
        ]);


city::create([
            'name' => 'El Harrach',
            'code' => '1601',
            'daira_id' => 1,
        ]);
        city::create([
            'name' => 'alger center',
            'code' => '1602',
            'daira_id' => 2,
        ]);
        city::create([
            'name' => 'Bir Mourad Raïs',
            'code' => '1603',
            'daira_id' => 3,
        ]);
        city::create([
            'name' => 'ain khemis',
            'code' => '3101',
            'daira_id' => 4,
        ]);
        city::create([
            'name' => 'telagh',
            'code' => '3102',
            'daira_id' => 6,
        ]);

        city::create([
            'name' => 'Tasan',
            'code' => '2502',
            'daira_id' => 7,
        ]);


    }
}
