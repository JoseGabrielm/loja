<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('groups')->delete();
        
        \DB::table('groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sku' => '0006',
                'name' => 'Estante De Aço Multi-uso 25cm 5 Prateleira',
                'slug' => 'estante-de-aco-multi-uso-25cm-5-prateleira',
                'packing_format' => 'retangular',
                'qty_ship' => 5,
                'grossweight' => 8000,
                'netweight' => 8000,
                'packing_length' => 830,
                'packing_width' => 255,
                'packing_height' => 155,
                'product_length' => 820,
                'product_width' => 250,
                'product_height' => 150,
                'description' => 'Estante de Aço 25cm com 5 Prateleiras Reguláveis.',
                'description_short' => 'Estante de Aço 25cm com 5 Prateleiras Reguláveis.
Suporta até 25 kg distribuídos por prateleira',
                'description_long' => 'Estante de Aço 25cm com 5 Prateleiras Reguláveis.
- Suporta até 25 kg distribuídos por prateleira
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm. 
- Prateleiras com 3 dobras nas laterais.',
                'technical_features' => '- Suporta até 25 kg distribuídos por prateleira.
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm.
- Prateleiras com 3 dobras nas laterais. 
- Pintura eletrostática a pó automatizada com fosfatização.',
                'order' => 2,
                'active' => 1,
                'seller_id' => 1,
                'category_id' => 1,
                'created_at' => '2021-04-08 18:49:42',
                'updated_at' => '2021-04-18 11:42:54',
            ),
            1 => 
            array (
                'id' => 2,
                'sku' => '0002',
                'name' => 'Estante Aço Multi-uso 30cm  6 Prateleiras 30kg/prat',
                'slug' => 'estante-aco-multi-uso-30cm-6-prateleiras-30kgprat',
                'packing_format' => 'retangular',
                'qty_ship' => 5,
                'grossweight' => 12000,
                'netweight' => 12000,
                'packing_length' => 930,
                'packing_width' => 300,
                'packing_height' => 155,
                'product_length' => 920,
                'product_width' => 300,
                'product_height' => 150,
                'description' => 'Estante de Aço 30cm com 5 Prateleiras Reguláveis.',
                'description_short' => 'Estante de Aço 30cm com 6 Prateleiras Reguláveis.
Suporta até 30 kg distribuídos por prateleira',
                'description_long' => 'Estante de Aço 30cm com 5 Prateleiras Reguláveis.
- Suporta até 30 kg distribuídos por prateleira
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm. 
- Prateleiras com 3 dobras nas laterais.',
                'technical_features' => 'Suporta até 30 kg distribuídos por prateleira.
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm.
- Prateleiras com 3 dobras nas laterais. 
- Pintura eletrostática a pó automatizada com fosfatização.',
                'order' => 1,
                'active' => 0,
                'seller_id' => 1,
                'category_id' => 1,
                'created_at' => '2021-04-18 09:29:36',
                'updated_at' => '2021-04-18 11:44:01',
            ),
            2 => 
            array (
                'id' => 3,
                'sku' => '0005',
                'name' => 'Estante Aço Multi-uso 40cm  6 Prateleiras 30kg/prat',
                'slug' => 'estante-aco-multi-uso-40cm-6-prateleiras-30kgprat',
                'packing_format' => 'retangular',
                'qty_ship' => 5,
                'grossweight' => 15000,
                'netweight' => 14000,
                'packing_length' => 930,
                'packing_width' => 400,
                'packing_height' => 155,
                'product_length' => 920,
                'product_width' => 400,
                'product_height' => 150,
                'description' => 'Estante de Aço 40cm com 6 Prateleiras Reguláveis.',
                'description_short' => 'Estante de Aço 40cm com 6 Prateleiras Reguláveis.
Suporta até 30 kg distribuídos por prateleira',
                'description_long' => 'Estante de Aço 40cm com 5 Prateleiras Reguláveis.
- Suporta até 30 kg distribuídos por prateleira
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm. 
- Prateleiras com 3 dobras nas laterais.',
                'technical_features' => 'Suporta até 30 kg distribuídos por prateleira.
- Espessura: Prateleira de chapa 26 e coluna de chapa 20.
- Medidas: altura 1630mm x largura 820mm x profundidade 250mm.
- Prateleiras com 3 dobras nas laterais. 
- Pintura eletrostática a pó automatizada com fosfatização.',
                'order' => 3,
                'active' => 1,
                'seller_id' => 1,
                'category_id' => 1,
                'created_at' => '2021-04-18 11:48:55',
                'updated_at' => '2021-04-18 15:04:03',
            ),
            3 => 
            array (
                'id' => 4,
                'sku' => '0258',
                'name' => 'Roupeiro De Aço 6 Portas Grp2/6 Corpo Cinza Portas Coloridas',
                'slug' => 'roupeiro-de-aco-6-portas-grp26-corpo-cinza-portas-coloridas',
                'packing_format' => 'retangular',
                'qty_ship' => 77,
                'grossweight' => 31,
                'netweight' => 31,
                'packing_length' => 325,
                'packing_width' => 400,
                'packing_height' => 1975,
                'product_length' => 325,
                'product_width' => 400,
                'product_height' => 1975,
                'description' => 'Armário de aço A90 com 2 portas na cor cinza. - Cor: Cinza texturizado.',
                'description_short' => 'Fechamento por chave.
- Portas com reforço interno.
- Espessura: chapa 26 (0,40mm).',
                'description_long' => 'Armário de aço A90 com 2 portas na cor cinza.
- Cor: Cinza texturizado.
- Fechamento por chave.
- Portas com reforço interno.
- Espessura: chapa 26 (0,40mm).
- Medidas: altura 1980mm x largura 900mm x profundidade 400mm.',
                'technical_features' => 'Medidas: altura 1980mm x largura 900mm x profundidade 400mm.
- Acompanha 4 prateleiras, sendo a central fixa e as demais móveis.
- Cada prateleira suporta até 30 kg uniformemente distribuídos.
- Produto com fosfatização a ferro e pintura eletrostática a pó.
- Possui pés metálicos com sapatas de plástico reguláveis.
',
                'order' => 4,
                'active' => 1,
                'seller_id' => 1,
                'category_id' => 4,
                'created_at' => '2021-04-18 22:02:01',
                'updated_at' => '2021-04-18 22:29:57',
            ),
            4 => 
            array (
                'id' => 5,
                'sku' => '0015',
                'name' => 'Armario De Aço A90 Com 2 Portas',
                'slug' => 'armario-de-aco-a90-com-2-portas',
                'packing_format' => 'retangular',
                'qty_ship' => 1,
                'grossweight' => 61000,
                'netweight' => 61000,
                'packing_length' => 1240,
                'packing_width' => 400,
                'packing_height' => 1975,
                'product_length' => 1240,
                'product_width' => 400,
                'product_height' => 1975,
                'description' => 'Roupeiro de aço GRP 2/6 com 6 portas. - Corpo: Cinza texturizado.',
                'description_short' => 'Roupeiro de aço GRP 2/6 com 6 portas.
- Corpo: Cinza texturizado.
- Portas: Coloridas.
- Portas com reforço interno.',
                'description_long' => 'Roupeiro de aço GRP 2/6 com 6 portas.
- Corpo: Cinza texturizado.
- Portas: Coloridas.
- Portas com reforço interno.
- Espessura: chapa 26 (0,40mm).
- Medidas: altura 1975mm x largura 625mm x profundidade 400mm. ',
            'technical_features' => 'Espessura: chapa 26 (0,40mm).
- Medidas: altura 1975mm x largura 625mm x profundidade 400mm.
- Fechamento por pitão para uso de cadeado (cadeado não incluso).
- Produto com fosfatização a ferro e pintura eletrostática a pó.

',
                'order' => 3,
                'active' => 1,
                'seller_id' => 1,
                'category_id' => 2,
                'created_at' => '2021-04-18 22:21:58',
                'updated_at' => '2021-04-18 22:30:54',
            ),
        ));
        
        
    }
}