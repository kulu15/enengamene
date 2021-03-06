<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    $libelle = $faker->sentence(1);
    return [
      'code' => Str::slug($libelle),
      'libelle' => $libelle,
      'description' => $faker->paragraph(2),
      'chapitre_id' => function() {
        return factory(\App\Chapitre::class)->create()->id;
      },
      'num_ordre' => 100,
      'lien' => '230485453'
    ];
});
