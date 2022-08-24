<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'country_id' => 0,
                'id' => 1,
                'initials' => 'SP',
                'name' => 'São Paulo',
            ),
            1 => 
            array (
                'country_id' => 0,
                'id' => 2,
                'initials' => 'RJ',
                'name' => 'Rio de Janeiro',
            ),
            2 => 
            array (
                'country_id' => 1,
                'id' => 3,
                'initials' => 'RO',
                'name' => 'Rondônia',
            ),
            3 => 
            array (
                'country_id' => 1,
                'id' => 4,
                'initials' => 'AC',
                'name' => 'Acre',
            ),
            4 => 
            array (
                'country_id' => 1,
                'id' => 5,
                'initials' => 'AM',
                'name' => 'Amazonas',
            ),
            5 => 
            array (
                'country_id' => 1,
                'id' => 6,
                'initials' => 'RR',
                'name' => 'Roraima',
            ),
            6 => 
            array (
                'country_id' => 1,
                'id' => 7,
                'initials' => 'PA',
                'name' => 'Pará',
            ),
            7 => 
            array (
                'country_id' => 1,
                'id' => 8,
                'initials' => 'AP',
                'name' => 'Amapá',
            ),
            8 => 
            array (
                'country_id' => 1,
                'id' => 9,
                'initials' => 'TO',
                'name' => 'Tocantins',
            ),
            9 => 
            array (
                'country_id' => 1,
                'id' => 10,
                'initials' => 'MA',
                'name' => 'Maranhão',
            ),
            10 => 
            array (
                'country_id' => 1,
                'id' => 11,
                'initials' => 'PI',
                'name' => 'Piauí',
            ),
            11 => 
            array (
                'country_id' => 1,
                'id' => 12,
                'initials' => 'CE',
                'name' => 'Ceará',
            ),
            12 => 
            array (
                'country_id' => 1,
                'id' => 13,
                'initials' => 'RN',
                'name' => 'Rio Grande do Norte',
            ),
            13 => 
            array (
                'country_id' => 1,
                'id' => 14,
                'initials' => 'PB',
                'name' => 'Paraíba',
            ),
            14 => 
            array (
                'country_id' => 1,
                'id' => 15,
                'initials' => 'PE',
                'name' => 'Pernambuco',
            ),
            15 => 
            array (
                'country_id' => 1,
                'id' => 16,
                'initials' => 'AL',
                'name' => 'Alagoas',
            ),
            16 => 
            array (
                'country_id' => 1,
                'id' => 17,
                'initials' => 'SE',
                'name' => 'Sergipe',
            ),
            17 => 
            array (
                'country_id' => 1,
                'id' => 18,
                'initials' => 'BA',
                'name' => 'Bahia',
            ),
            18 => 
            array (
                'country_id' => 1,
                'id' => 19,
                'initials' => 'MG',
                'name' => 'Minas Gerais',
            ),
            19 => 
            array (
                'country_id' => 1,
                'id' => 20,
                'initials' => 'ES',
                'name' => 'Espírito Santo',
            ),
            20 => 
            array (
                'country_id' => 1,
                'id' => 21,
                'initials' => 'PR',
                'name' => 'Paraná',
            ),
            21 => 
            array (
                'country_id' => 1,
                'id' => 22,
                'initials' => 'SC',
                'name' => 'Santa Catarina',
            ),
            22 => 
            array (
                'country_id' => 1,
                'id' => 23,
                'initials' => 'RS',
                'name' => 'Rio Grande do Sul',
            ),
            23 => 
            array (
                'country_id' => 1,
                'id' => 24,
                'initials' => 'MS',
                'name' => 'Mato Grosso do Sul',
            ),
            24 => 
            array (
                'country_id' => 1,
                'id' => 25,
                'initials' => 'MT',
                'name' => 'Mato Grosso',
            ),
            25 => 
            array (
                'country_id' => 1,
                'id' => 26,
                'initials' => 'GO',
                'name' => 'Goiás',
            ),
            26 => 
            array (
                'country_id' => 1,
                'id' => 27,
                'initials' => 'DF',
                'name' => 'Distrito Federal',
            ),
        ));
        
        
    }
}