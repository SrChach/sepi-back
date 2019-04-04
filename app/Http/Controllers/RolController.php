<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolController extends Controller
{
		public function __construct(){
				//
		}

		public function index(){
			$roles = Rol::all();
			return $this->responder($roles, 200);
		}

		public function show($id){
			$rol = Rol::find($id);

			if($rol)
				return $this->responder($rol, 200);
			return $this->responder_error('rol no encontrado', 404);
		}

		public function update(Request $request, $rol_id){

			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error("El id proporcionado no corresponde a ningun rol", 404);

			$this->validate($request, ['nombre' => 'required']);
			$rol->nombre = $request->get('nombre');
			$rol->save();

			return $this->responder("El rol {$rol->id} ha sido editado", 200); 
		}

}
