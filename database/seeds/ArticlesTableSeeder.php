<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now();
        $endDate   = Carbon::now()->subDays(10);
        $i = 0;
        while ($i <= 10){
            DB::table('articles')->insert([
                'title'      => str_random(10),
                'content'    => str_random(100),
                'is_enabled' => (bool)random_int(0, 1), // PHP 7 - Aléatoirement true ou false
                'created_at' => Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d'),
            ]);
            $i++;
        }
    }
}
