<?php

namespace App\Database\Seeds;

use Seeder;
use DB;

class FaqsTableSeeder extends Seeder {

    public function run()
    {
        $faqs = Array();

        foreach (scandir(base_path() . '/faq') as $element)
            if (!is_dir(base_path() . '/faq/' . $element))
                $faqs[] = Array(
                    'order' => 0,
                    'name' => $element,
                    'path' => $element
                );

        if (count($faqs))
            DB::table('faqs')->insert($faqs);
    }

}
