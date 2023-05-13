<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Producto;
class SeederTableCategoria extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run()
        {
            // Crear 5 categorías de productos comestibles
            $categorias = [
                ['descripcion' => 'Bebidas'],
                ['descripcion' => 'Snacks'],
                ['descripcion' => 'Postres'],
                ['descripcion' => 'Panadería'],
                ['descripcion' => 'Lácteos']
            ];
            foreach ($categorias as $categoria) {
                Categoria::create($categoria);
            }
    
            // Crear 10 productos aleatorios relacionados con una categoría
            for ($i = 1; $i <= 10; $i++) {
                $producto = new Producto();
                $producto->nombre = $this->getRandomProductName();
                $producto->codigo = $this->generateUniqueCode();
                $producto->precio = rand(1, 1000);
                $producto->peso = rand(1, 1000);
                $producto->stock = rand(0, 1000);
                $producto->id_categoria = rand(1, 5); // Relacionar con una categoría aleatoria
                $producto->save();
            }
        }
    
        private function getRandomProductName()
        {
            $productos = [
                'Coca-Cola',
                'Pepsi',
                'Doritos',
                'Cheetos',
                'Gansito',
                'Chocorramo',
                'Oreo',
                'Chips Ahoy',
                'Lays',
                'Pringles',
                'Nutella',
                'Leche',
                'Yogurt',
                'Hamburguesa',
                'Hot dog',
                'Jugo Hit',
                'Arepa',
                'Tinto',
                
            ];
            return $productos[array_rand($productos)];
        }
    
        private function generateUniqueCode()
        {
            $code = '';
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                do {
                    $code = strtoupper(substr(str_shuffle($letters), 0, 1)) . rand(10000, 99999);
                } while (Producto::where('codigo', $code)->exists());
                return $code;
        }
    }
