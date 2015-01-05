<?php

class CategoriesTableSeeder extends Seeder {

	/**
	* Run the titles seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('categories')->delete();      
		Category::create(array('name' => 'Jardin', 'image_path' => '/assets/img/jardin.png'));
		Category::create(array('name' => 'Cuisine', 'image_path' => '/assets/img/cuisine.png'));
		Category::create(array('name' => 'Camping', 'image_path' => '/assets/img/camping.png'));
		Category::create(array('name' => 'Travaux', 'image_path' => '/assets/img/travaux.png'));
		Category::create(array('name' => 'Son', 'image_path' => '/assets/img/son.png'));
		Category::create(array('name' => 'Vidéo', 'image_path' => '/assets/img/video.png'));
		Category::create(array('name' => 'Lumière', 'image_path' => '/assets/img/lumiere.png'));
		Category::create(array('name' => 'Véhicule', 'image_path' => '/assets/img/vehicule.png'));
		Category::create(array('name' => 'Service', 'image_path' => '/assets/img/service.png'));
	}

}