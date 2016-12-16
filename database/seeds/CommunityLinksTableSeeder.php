<?php

use Illuminate\Database\Seeder;

class CommunityLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CommunityLink::class, 50)->create();
    }
}
