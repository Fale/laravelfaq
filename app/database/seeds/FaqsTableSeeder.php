<?php

namespace App\Database\Seeds;

use Seeder;
use DB;
use File;

use App\Models\Category;

class FaqsTableSeeder extends Seeder {

    public function run()
    {
        $faqs = Array();

        foreach (File::allFiles(base_path() . '/faq') as $element)
            $faqs[] = Array(
                'order' => 0,
                'name' => $element->getFileName(),
                'path' => $element->getRelativePathname(),
                'category_id' => Category::where('path', $element->getRelativePath())->pluck('id'),
            );

        if (count($faqs))
            DB::table('faqs')->insert($faqs);
    }

}
