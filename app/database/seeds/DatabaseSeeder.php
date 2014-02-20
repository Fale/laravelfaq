<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('App\Database\Seeds\CategoriesTableSeeder');
		$this->call('App\Database\Seeds\FaqsTableSeeder');
		$this->call('App\Database\Seeds\TagsTableSeeder');
	}

}
