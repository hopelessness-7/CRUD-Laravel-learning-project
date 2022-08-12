<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recording;

class RecordingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recording::factory ()->count(30)->create();
    }
}
