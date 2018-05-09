<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Deportes',      'slug' => str_slug('Deportes') ];
        $channel2 = ['title' => 'Gastronomia',        'slug' => str_slug('Gastronomia') ];
        $channel3 = ['title' => 'Politica',         'slug' => str_slug('Politica') ];
        $channel4 = ['title' => 'Musica Sonido',   'slug' => str_slug('Musica Sonido') ];
        $channel5 = ['title' => 'Turismo',  'slug' => str_slug('Turismo') ];
        $channel6 = ['title' => 'Literatura',        'slug' => str_slug('Literatura') ];
        $channel7 = ['title' => 'Lumen',        'slug' => str_slug('Lumen') ];
        $channel8 = ['title' => 'Forge',        'slug' => str_slug('Forge') ];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);

    }

}
