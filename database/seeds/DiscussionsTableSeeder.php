<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Paolo Guerrero';
        $t2 = 'Gaston Acurio';
        $t3 = 'Daniel Estrada Perez';
        $t4 = 'Pedro Suavez Vertiz';

        $d1 = [

            'title' => $t1,
            'contenido' => 'José Paolo Guerrero Gonzales (Chorrillos, Provincia de Lima, Perú, 1 de enero de 1984) . Juega como delantero centro y su equipo actual es el Club del Peru. Tiene 34 años y es internacional con la selección peruana de fútbol, de la cual es capitán.',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)

        ];

        $d2 = [

            'title' => $t2,
            'contenido' => 'Gastón Acurio Jaramillo (Lima, 30 de octubre de 1967) es un chef, escritor, hombre de negocios y promotor de la gastronomía peruana. Desde la inauguración de su restaurante Astrid & Gastón en 1994 en Lima, Acurio ha abierto 34 restaurantes dedicados a diferentes especialidades de la comida peruana, en 11 países alrededor del mundo.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)

        ];

        $d3 = [

            'title' => $t3,
            'contenido' => 'Daniel Estrada Pérez (* Cusco, Perú, 3 de enero de 1947 - † Lima, 23 de marzo de 2003) fue un abogado y político peruano. Desde 1969 hasta 1970 fue presidente del Centro Federado de Estudiantes de la Facultad de Derecho y Ciencias Políticas de la Universidad Nacional San Antonio Abad del Cusco.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t3)

        ];

        $d4 = [

            'title' => $t4,
            'contenido' => 'Pedro Martín José María Suárez-Vértiz Alva (nacido en Callao, 13 de febrero de 1969), es un músico, cantante, compositor, productor y escritor peruano. Luego de pertenecer al grupo Arena Hash, con quien realizó dos discos, empezó su carrera como solista.',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4)

        ];

        \App\Discussion::create($d1);
        \App\Discussion::create($d2);
        \App\Discussion::create($d3);
        \App\Discussion::create($d4);

    }
}
