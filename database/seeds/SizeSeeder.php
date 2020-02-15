<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Size;

class SizeSeeder extends Seeder
{
    public function run()
    {
        DB::table('sizes')->truncate();


        /**
         *
         * Insert Sizes
         *
         */

        Size::create([
            'name' => 'Tiny',
            'code' => 'tiny',
        ]);

        Size::create([
            'name' => 'Small',
            'code' => 'small',
        ]);

        Size::create([
            'name' => 'Medium',
            'code' => 'medium',
        ]);

        Size::create([
            'name' => 'Large',
            'code' => 'large',
        ]);

        Size::create([
            'name' => 'Huge',
            'code' => 'huge',
        ]);

        Size::create([
            'name' => 'Gargantuan',
            'code' => 'gargantuan',
        ]);
    }
}
