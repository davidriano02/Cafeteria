<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
class SeederTableCliente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    for ($i = 1; $i <= 10; $i++) {
        Cliente::create([
            'nombre' => 'Cliente ' . $i,
            'telefono' => '5551234-' . str_pad($i, 2, '0', STR_PAD_LEFT),
        ]);
    }
}
}
