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
    	$titles = ['GeForce 1080 ti', 'Ventirad BeQuiet!', 'Boitier Fractal Design'];
        $startDate = Carbon::now();
        $endDate   = Carbon::now()->subDays(10);
        $i = 0;
        while ($i < 7){
            DB::table('articles')->insert([
                'title'      => str_random(10),
                'slug'       => str_slug('title'),
                'content'    => str_random(50),
                'is_enabled' => (bool)random_int(0, 1), // PHP 7 - Aléatoirement true ou false
                'created_at' => Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d'),
            ]);
            $i++;
        }
	    DB::table('articles')->insert([
		    'title'      => $titles[0],
		    'slug'       => str_slug($titles[0]),
		    'content'    => str_random(50),
		    'is_enabled' => (bool)random_int(0, 1), // PHP 7 - Aléatoirement true ou false
		    'created_at' => Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d'),
	    ]);
	    DB::table('articles')->insert([
		    'title'      => $titles[1],
		    'slug'       => str_slug($titles[1]),
		    'content'    => str_random(50),
		    'is_enabled' => (bool)random_int(0, 1), // PHP 7 - Aléatoirement true ou false
		    'created_at' => Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d'),
	    ]);
	    DB::table('articles')->insert([
		    'title'      => $titles[2],
		    'slug'       => str_slug($titles[2]),
		    'content'    => str_random(50),
		    'is_enabled' => (bool)random_int(0, 1), // PHP 7 - Aléatoirement true ou false
		    'created_at' => Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d'),
	    ]);
    }
}
