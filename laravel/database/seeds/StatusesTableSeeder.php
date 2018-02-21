<?php

use Illuminate\Database\Seeder;
use App\status;


class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statuses = factory(status::class)->times(100)->create();

    }
}
