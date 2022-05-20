<?php

namespace Database\Seeders;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Lapicera',
            'descripcion' => 'Negra Fabercastell',
            'precio' => '50.25',
            'img' => 'qwueqwuienquinequienq',
        ]);

        Producto::create([
            'nombre' => 'Cuaderno',
            'descripcion' => 'Tapa dura',
            'precio' => '250.25',
            'img' => 'qwueq123123wuienquinequienq',
        ]);

        Producto::create([
            'nombre' => 'Fibron',
            'descripcion' => 'Rojo',
            'precio' => '120.25',
            'img' => '12341431415fdssc',
        ]);
    }
}
