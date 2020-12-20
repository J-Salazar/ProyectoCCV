<?php

use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

            DB::table('administradors')->insert([
                'name' => $faker->name,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ]);

    }
}
