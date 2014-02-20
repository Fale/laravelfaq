<?php namespace App\Database\Seeds;

use Seeder;
use DB;
use File;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $categories = Array();

        foreach (File::directories(base_path() . '/faq') as $element)
            $categories[] = Array(
                'order' => 0,
                'name' => str_replace(base_path() . '/faq/', '', $element),
                'path' => str_replace(base_path() . '/faq/', '', $element),
                'faqs_number' => 0
            );

        if (count($categories))
            DB::table('categories')->insert($categories);
    }

}
