<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");
        $list = [
            [
                'qs_entity' => 1,
                'role_id' => 1,
                'name' => 'Quantical Solutions',
                'description' => 'Société mère QS forme juridique SARL',
                'siren' => '888432986',
                'siret' => '88843298600014',
                'naf' => '6201Z',
                'address' => '3 quai Numa Sensine',
                'address_details' => NULL,
                'zip' => '33310',
                'city' => 'LORMONT',
                'state' => 'GIRONDE',
                'country' => 'FRANCE',
                'longitude' => -0.534035,
                'latitude' => 44.877440,
                'phone' => '0662687011',
                'email' => 'infos@quanticalsolutions.com',
                'contact' => 'Lucie PINTER',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'qs_entity' => 0,
                'role_id' => 5,
                'name' => 'Association Ceseau',
                'description' => 'Association s\'occupant de l\'information du public sur l\'eau et son cycle',
                'siren' => NULL,
                'siret' => NULL,
                'naf' => NULL,
                'address' => '24 rue du 14 juillet',
                'address_details' => 'Pôle associatif L\'Overground',
                'zip' => '33400',
                'city' => 'TALENCE',
                'state' => 'GIRONDE',
                'country' => 'FRANCE',
                'longitude' => -0.584465,
                'latitude' => 44.821138,
                'phone' => '0619574866',
                'email' => 'c.moras@ceseau.org',
                'contact' => 'Claire MORA',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'qs_entity' => 0,
                'role_id' => 5,
                'name' => 'EPSI / WIS',
                'description' => 'Ecole Informatique et Digitale du bassin à flots de Bordeaux',
                'siren' => '440498509',
                'siret' => '44049850900015',
                'naf' => '6202A',
                'address' => '114 Rue Lucien FAURE',
                'address_details' => NULL,
                'zip' => '33300',
                'city' => 'BORDEAUX',
                'state' => 'GIRONDE',
                'country' => 'FRANCE',
                'longitude' => -0.560586,
                'latitude' => 44.865218,
                'phone' => '0535544745',
                'email' => 'veronika.jambor@campus-cd.com',
                'contact' => 'Véronika JAMBOR',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Entity::insert($list);
    }
}
