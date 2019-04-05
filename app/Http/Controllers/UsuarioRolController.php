<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Usuario;

class UsuarioRolController extends Controller
{
		public function __construct(){
				//
		}

		public function update($usuario_id, $rol_id){
			// Buscamos si existen las tablas relacionadas
			$usuario = Usuario::find($usuario_id);
			if(!$usuario)
				return $this->responder_error('El usuario no existe', 404);

			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('El rol no existe', 404);
				
			// si el usuario tiene el rol, no lo actualizamos
			if( $usuario->rol_id == $rol_id ) 
				return $this->responder_error('El usuario ya tiene ese Rol', 409);

			$usuario->rol_id = $rol_id;
			$usuario->save();
			return $this->responder("Al usuario $usuario_id se le ha asignado el rol $rol_id", 201);
		}

		public function delete($usuario_id){
			$usuario = Usuario::find($usuario_id);
			if(!$usuario)
				return $this->responder_error('El usuario no existe', 404);

			if($usuario->rol_id == null)
				return $this->responder_error('El usuario no teniene rol asignado', 409);

			$usuario->rol_id = null;
			$usuario->save();
			return $this->responder("Se ha dejado sin rol al usuario", 201);
		}

}
