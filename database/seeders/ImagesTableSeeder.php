<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'path' => 'https://www.supreme.ind.br/imagem/estantes/estante-05-bandejas/estante-30-5-prateleiras-cinza.png',
                'description' => 'Estante De Aço Multi-uso 25cm 5 Prateleira',
                'group_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-04-19 15:13:10',
            ),
            1 => 
            array (
                'id' => 2,
                'path' => 'https://www.supreme.ind.br/imagem/estantes/estante-05-bandejas/estante-30-5-prateleiras-cinza.png',
                'description' => '',
                'group_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'path' => 'http://supreme.ind.br/imagem/roupeiros/grp-4/corpo-cinza/roupeiro-grp4-corpo-cinza-portas-vinho.jpg',
                'description' => 'Roupeiro De Aço 16 Portas Grp8/16',
                'group_id' => 4,
                'created_at' => NULL,
                'updated_at' => '2021-04-19 15:18:06',
            ),
            3 => 
            array (
                'id' => 4,
                'path' => 'http://supreme.ind.br/imagem/armarios/a90/corpo-branco/armario-a90-corpo-branco-portas-vinho.jpg',
                'description' => 'Armario De Aço A90 Com 2 Portas',
                'group_id' => 5,
                'created_at' => NULL,
                'updated_at' => '2021-04-19 15:17:03',
            ),
            4 => 
            array (
                'id' => 7,
                'path' => 'http://supreme.ind.br/imagem/roupeiros/grp-4/corpo-cinza/roupeiro-grp4-corpo-cinza-portas-vinho.jpg',
                'description' => 'Armario De Aço A90 Com 2 Portas',
                'group_id' => 5,
                'created_at' => '2021-04-19 15:25:46',
                'updated_at' => '2021-04-19 15:26:02',
            ),
        ));
        
        
    }
}