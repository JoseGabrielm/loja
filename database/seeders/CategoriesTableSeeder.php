<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'Estantes',
                'image' => 'http://supreme.ind.br/imagem/estantes/estante-06-bandejas/estante-30cm-6-bandejas-vermelho.jpg',
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'Armarios',
                'image' => 'http://supreme.ind.br/imagem/armarios/a15/corpo-cinza/armario-a15-corpo-cinza-porta-amarela.png',
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'Arquivos',
                'image' => 'http://supreme.ind.br/imagem/arquivos/arquivo-4-gavetas/corpo-cinza/arquivo-4-gavetas-corpo-cinza-gavetas-lilas.jpg',
            ),
            3 => 
            array (
                'id' => 4,
                'description' => 'Roupeiros',
                'image' => 'http://supreme.ind.br/imagem/roupeiros/grp-8/corpo-cinza/roupeiro-grp8-corpo-cinza-portas-azul-texturizado.jpg',
            ),
            4 => 
            array (
                'id' => 5,
                'description' => 'Cozinha',
                'image' => '',
            ),
        ));
        
        
    }
}