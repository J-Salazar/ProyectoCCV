<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create();

        $num = 1;
        foreach (range(1,5) as $index) {

            DB::table('administradors')->insert([
                'nombre' => $faker->name,
                'apellido' => $faker->lastName,

                'email' => 'admin'.$num.'@gmail.com',
                'password' => bcrypt('123456'),

                'nivel' => 'administrador',
            ]);
            $num++;
        }

        $num = 1;
        foreach (range(1,5) as $index) {

            DB::table('usuarios')->insert([
                'nombre' => $faker->name,
                'apellido' => $faker->lastName,

                'email' => 'usuario'.$num.'@gmail.com',
                'password' => bcrypt('123456'),

                'nivel' => 'usuario',
            ]);
            $num++;
        }

        $num = 1;

        foreach (range(1,5) as $index) {

            DB::table('desarrolladors')->insert([
                'nombre' => $faker->name,
                'apellido' => $faker->lastName,

                'email' => 'desarrollador'.$num.'@gmail.com',
                'password' => bcrypt('123456'),

                'nivel' => 'desarrollador',
            ]);
            $num++;
        }

        foreach (range(1,10) as $index) {

            DB::table('stakeholders')->insert([
                'nombre' => $faker->name,
                'apellido' => $faker->lastName,

                'email' => $faker->email,

            ]);
        }

        foreach (range(1,10) as $index) {

            DB::table('clientes')->insert([

                'razonsocial' => $faker->company,
                'representante' => $faker->name,
                'ruc' => $faker->numberBetween($min = 1000000000000, $max = 9999999999999),
                'contacto' => $faker->e164PhoneNumber,
                'email' => $faker->companyEmail,
                'direccion' => $faker->address,
//                'stakeholder' => $faker->lastName,
                'usuarioid' => $faker->numberBetween($min=1,$max=10),
                'nivel' => $faker->randomElement(['administrador']),


            ]);
        }

        foreach (range(1,10) as $index) {

            DB::table('proyectos')->insert([

                'nombre'        => $faker->catchPhrase,
                'descripcion'   => $faker->bs,
//                'cliente' => $faker->numberBetween($min = 1000000000000, $max = 9999999999999),
                'stakeholder'   => $faker->name,
                'equipo'        => $faker->numberBetween($min=1,$max=10),
                'estimacion'    => $faker->numberBetween($min=0,$max=10) . 'semanas',
//                'stakeholder' => $faker->lastName,
                'estado'        => $faker->randomElement(['activo','finalizado']),
                'clienteid'     => $faker->numberBetween($min=1,$max=10),


            ]);
        }

        DB::table('equipos')->insert([
            'nombre'        => $faker->company,
            'lider'         => $faker->name,
            'desarrollador' => $faker->name,
        ]);


    }
}
