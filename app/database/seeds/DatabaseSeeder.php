<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ObjectsTableSeeder');
	}

}

class ObjectsTableSeeder extends Seeder {

	/**
	* Run the titles seeds.
	*
	* @return void
	*/
	public function run()
	{
		//DB::table('objects')->delete(); 
		     
		Object::create(array('name' => "Marteau", 'slug' => Str::slug("Marteau"), 'article_ind' => 'un'));
		/*
		Object::create(array('name' => "Pompe à vélo", 'slug' => Str::slug("Pompe à vélo")));
		Object::create(array('name' => "Mixer", 'slug' => Str::slug("Mixer")));
		Object::create(array('name' => "Balance de cuisine", 'slug' => Str::slug("Balance de cuisine")));
		Object::create(array('name' => "Moule à gâteau", 'slug' => Str::slug("Moule à gâteau")));
		Object::create(array('name' => "Four à raclette", 'slug' => Str::slug("Four à raclette")));
		Object::create(array('name' => "Ricecooker", 'slug' => Str::slug("Ricecooker")));
		Object::create(array('name' => "Set à fondue", 'slug' => Str::slug("Set à fondue")));
		Object::create(array('name' => "Fer à gaufre", 'slug' => Str::slug("Fer à gaufre")));
		Object::create(array('name' => "Machine à pâtes", 'slug' => Str::slug("Machine à pâtes")));
		Object::create(array('name' => "Wok", 'slug' => Str::slug("Wok")));
		Object::create(array('name' => "Grill à charbon", 'slug' => Str::slug("Grill à charbon")));
		Object::create(array('name' => "Grill électrique", 'slug' => Str::slug("Grill électrique")));
		Object::create(array('name' => "Grill à gaz", 'slug' => Str::slug("Grill à gaz")));
		Object::create(array('name' => "Outils", 'slug' => Str::slug("Outils")));
		Object::create(array('name' => "Perceuse", 'slug' => Str::slug("Perceuse")));
		Object::create(array('name' => "Scie", 'slug' => Str::slug("Scie")));
		Object::create(array('name' => "Scie sauteuse", 'slug' => Str::slug("Scie sauteuse")));
		Object::create(array('name' => "Scie circulaire", 'slug' => Str::slug("Scie circulaire")));
		Object::create(array('name' => "Machine à coudre", 'slug' => Str::slug("Machine à coudre")));
		Object::create(array('name' => "Fer à repasser", 'slug' => Str::slug("Fer à repasse")));
		Object::create(array('name' => "Echelle", 'slug' => Str::slug("Echelle")));
		Object::create(array('name' => "Rallonge électrique", 'slug' => Str::slug("Rallonge électrique")));
		Object::create(array('name' => "Table de pique-nique (table de fête)", 'slug' => Str::slug("Table de pique-nique (table de fête)")));
		Object::create(array('name' => "Outils de jardin", 'slug' => Str::slug("Outils de jardin")));
		Object::create(array('name' => "Pelle", 'slug' => Str::slug("Pelle")));
		Object::create(array('name' => "Rateau", 'slug' => Str::slug("Rateau")));
		Object::create(array('name' => "Tondeuse à gazon", 'slug' => Str::slug("Tondeuse à gazon")));
		Object::create(array('name' => "Luge", 'slug' => Str::slug("Luge")));
		Object::create(array('name' => "Raquettes à neige", 'slug' => Str::slug("Raquettes à neige")));
		Object::create(array('name' => "Vélo", 'slug' => Str::slug("Vélo")));
		Object::create(array('name' => "Remorque à vélo", 'slug' => Str::slug("Remorque à vélo")));
		Object::create(array('name' => "Beamer (projecteur)", 'slug' => Str::slug("Beamer (projecteur)")));
		Object::create(array('name' => "Toile de projection", 'slug' => Str::slug("Toile de projection")));
		Object::create(array('name' => "Carton", 'slug' => Str::slug("Carton")));
		Object::create(array('name' => "Jumelles", 'slug' => Str::slug("Jumelles")));
		Object::create(array('name' => "Table de ping pong", 'slug' => Str::slug("Table de ping pong")));
		Object::create(array('name' => "Raquettes de ping pong", 'slug' => Str::slug("Raquettes de ping pong")));
		Object::create(array('name' => "Trépied", 'slug' => Str::slug("Trépied")));
		Object::create(array('name' => "Boule disco", 'slug' => Str::slug("Boule disco")));
		Object::create(array('name' => "Jeux pour enfants", 'slug' => Str::slug("Jeux pour enfants")));
		Object::create(array('name' => "Cert volant", 'slug' => Str::slug("Cert volant")));
		Object::create(array('name' => "Jeux de société", 'slug' => Str::slug("Jeux de société")));
		Object::create(array('name' => "Guirlande lumineuse", 'slug' => Str::slug("Guirlande lumineuse")));
		Object::create(array('name' => "Costume", 'slug' => Str::slug("Costume")));
		Object::create(array('name' => "Bateau gonflable (pneumatique)", 'slug' => Str::slug("Bateau gonflable (pneumatique)")));
		Object::create(array('name' => "Tente", 'slug' => Str::slug("Tente")));
		Object::create(array('name' => "Livres", 'slug' => Str::slug("Livres")));
		Object::create(array('name' => "Journaux", 'slug' => Str::slug("Journaux")));
		Object::create(array('name' => "WIFI", 'slug' => Str::slug("WIFI")));
		*/
	}

}
