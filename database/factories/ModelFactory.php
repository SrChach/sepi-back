<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Permiso::class, function (Faker\Generator $faker) {
	return [
		'nombre' => $faker->randomElement($array = ['Firmar', 'Asignar', 'Autorizar', 'Crear'])
	];
});

$factory->define(App\Rol::class, function (Faker\Generator $faker) {
	return [
		'nombre' => $faker->randomElement($array = ['Profesor', 'Cinodal', 'Administrador', 'Alumno'])
	];
});

$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
	return [
		'nombre' => $faker->firstName,
		'appaterno' => $faker->lastName,
		'apmaterno' => $faker->lastName,
		'email' => $faker->email,
		'password' => password_hash('pass', PASSWORD_BCRYPT),
		'rol_id' => mt_rand(1, 10)
	];
});

$factory->define(App\Firma::class, function (Faker\Generator $faker) {
	return [
		'usuario_id' => mt_rand(1, 100),
		'firma' => str_random(10)
	];
});