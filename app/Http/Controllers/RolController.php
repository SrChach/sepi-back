<?php

namespace App\Http\Controllers;

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

}
