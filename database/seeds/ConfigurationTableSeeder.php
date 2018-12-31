<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuration')->insert([
            'id' => 1,
            'name' => 'Tweets a descargar',
            'value' => 20,
        ]);
    }
}
