<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;

class PermisoController extends Controller
{
		public function __construct(){
				//
		}

		public function index(){
			$permisos = Permiso::all();
			return $this->responder($permisos, 200);
		}

		public function show($id){
			$permiso = Permiso::find($id);

			if($permiso)
				return $this->responder($permiso, 200);
			return $this->responder_error('permiso no encontrado', 404);
		}

		public function store(Request $request){
			$this->validate($request, ['nombre' => 'required']);
			
			// tomamos todos los campos de la petición
			$requestData = $request->all();
			Permiso::create($requestData);
			return $this->responder('El permiso ha sido creado', 201);
		}

		public function update(Request $request, $permiso_id){
			$permiso = Permiso::find($permiso_id);

			if(!$permiso)
				return $this->responder_error("El permiso no existe", 404);

			$this->validate($request, ['nombre' => 'required']);
			$nombre = $request->get('nombre');
			$permiso->nombre = $nombre;
			
			$permiso->save();
			return $this->responder("El permiso {$permiso->id} ha sido editado", 200);
		}

		public function delete(){
			$this->responder_error('Esto debería borrar', 409);
		}

}
