<?php

use App\Type_admin;
use Illuminate\Database\Seeder;

class Type_adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type_admin::class, 2)->create();
    }
}
