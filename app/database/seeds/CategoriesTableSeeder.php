<?php

namespace App\Database\Seeds;

use Seeder;
use DB;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $categories = Array();

        foreach (scandir(base_path() . '/faq') as $element)
            if (is_dir(base_path() . '/faq/' . $element) AND $element != '.' AND $element != '..')
                $categories[] = Array(
                    'order' => 0,
                    'name' => $element,
                    'path' => $element
                );

        DB::table('categories')->insert($categories);
    }

}
