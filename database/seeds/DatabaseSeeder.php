<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Firma;
use App\Usuario;
use App\Rol;
use App\Permiso;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	protected $contador = 1;

	public function run()
	{
		// $this->call('UsersTableSeeder');
		// Truncamos los datos de los modelos y insertamos de nuevo en cada seed
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('permiso_rol')->truncate();
		DB::table('usuario_asignado_usuario')->truncate();
		DB::table('esjefe')->truncate();
		Firma::truncate();
		Usuario::truncate();
		Rol::truncate();
		Permiso::truncate();

		factory(Permiso::class, 5)->create();
		
		factory(Rol::class, 15)
			->create()
			->each(function($rol){
				// Para cada rol credo, asigna "n" permisos (n es el segundo param de array_rand)
				$rol
					->permisos()
					->attach( array_rand(range(1, 15), 2) );
			});

		factory(App\Usuario::class, 60)
			->create()
			->each(function($usuario) {
				factory(App\Firma::class)->create([
					'firma' => str_random(10),
					'usuario_id' => $this->contador
				]);
				$this->contador++;
			});
	}
}
