<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Alignment;

class AlignmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('alignments')->truncate();


        /**
         *
         * Insert Good Alignments
         *
         */

        Alignment::create([
            'name' => 'Lawful Good',
            'code' => 'lawful_good',
        ]);

        Alignment::create([
            'name' => 'Neutral Good',
            'code' => 'neutral_good',
        ]);

        Alignment::create([
            'name' => 'Chaotic Good',
            'code' => 'chaotic_good',
        ]);


        /**
         *
         * Insert Neutral Alignments
         *
         */

        Alignment::create([
            'name' => 'Lawful Neutral',
            'code' => 'lawful_neutral',
        ]);

        Alignment::create([
            'name' => 'True Neutral',
            'code' => 'neutral_neutral',
        ]);

        Alignment::create([
            'name' => 'Chaotic Neutral',
            'code' => 'chaotic_neutral',
        ]);


        /**
         *
         * Insert Evil Alignments
         *
         */

        Alignment::create([
            'name' => 'Lawful Evil',
            'code' => 'lawful_evil',
        ]);

        Alignment::create([
            'name' => 'Neutral Evil',
            'code' => 'neutral_evil',
        ]);

        Alignment::create([
            'name' => 'Chaotic Evil',
            'code' => 'chaotic_evil',
        ]);
    }
}
