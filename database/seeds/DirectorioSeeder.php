<?php

use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('directorios')->insert([
           [
               'nombre_completo' => 'Saul Mamani',
               'direccion' => 'Plan 500, 234 entre sajama y sabaya',
               'telefono' => '76137269',
               'url_foto' => null
           ],
            [
                'nombre_completo' => 'Lidia',
                'direccion' => 'Plan 3000',
                'telefono' => '7689789',
                'url_foto' => null
            ],
        ]);
    }
}
