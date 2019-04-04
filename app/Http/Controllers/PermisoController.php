<?php

namespace App\Http\Controllers;

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

}
