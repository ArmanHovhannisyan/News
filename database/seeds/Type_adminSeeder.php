<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Type_adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_admins')->insert([
            'id' =>1,
            'name_en' =>'Admin',
            'name_ru' => 'Админ',
            'name_hy' => 'Ադմին',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('type_admins')->insert([
            'id' =>2,
            'name_en' =>'Super Admin',
            'name_ru' => 'Супер Админ',
            'name_hy' => 'Սուպեր Ադմին',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

    }
}
