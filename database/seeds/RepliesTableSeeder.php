<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [

            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Alianza Lima, Paolo Guerrero Gonzales inició su carrera en el fútbol en las divisiones menores del Club Alianza Lima,5 club al cual llegó en 1991 a los siete años de edad, esto hizo posible que realice toda su etapa formativa en las divisiones menores del club blanquiazul.',

        ];

        $r2 = [

            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Primeros años, Acurio nació en 1967 en Lima, Perú. Hijo del ex-senador y ex-ministro cusqueño Gastón Acurio Velarde y de Jesusa Jaramillo Rázuri, estudió en el Colegio Santa María Marianistas, Lima. En 1987, asistió a la escuela de leyes de la Universidad Complutense de Madrid. En 1989, deja la universidad y se matricula en la escuela de hostelería de Madrid, donde vive dos años.',

        ];

        $r3 = [

            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'En 1983 fue elegido alcalde de la Ciudad del Cusco y reelegido en 1989 y 1993. Como alcalde introdujo un nuevo nombre oficial de la ciudad - Qosqo y oficializó los nombres antiguos quechuas de las calles, siendo un apoyador de la Academia Mayor de la Lengua Quechua. Por eso lo llamaron también Qosqoruna ("Hombre del Qosqo").',

        ];

        $r4 = [

            'user_id' => 4,
            'discussion_id' => 4,
            'content' => 'Carrera como solista, Luego de los dos discos compuestos con Arena Hash, decide lanzarse como solista. En 1993, lanzó su primer disco como solista titulado (No existen) Técnicas para olvidar con temas como "Cuéntame", "Globo de gas" y la balada "Me elevé". Gracias a este disco obtuvo un contrato con Sony Music-Miami',

        ];

        \App\Reply::create($r1);
        \App\Reply::create($r2);
        \App\Reply::create($r3);
        \App\Reply::create($r4);
    }
}
