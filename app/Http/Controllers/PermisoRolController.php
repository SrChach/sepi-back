<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Rol;

class PermisoRolController extends Controller
{
		public function __construct(){
				//
		}

		public function index($rol_id){
			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('No se pudo encontrar rol con el id dado', 404);

			$permisos = $rol->permisos;
			return $this->responder($permisos, 200);
		}

		public function store($rol_id, $permiso_id){
			// Buscamos si existen las tablas relacionadas
			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('El rol no existe', 404);
			
			$permiso = Permiso::find($permiso_id);
			if(!$permiso)
				return $this->responder_error('El permiso no existe', 404);
				
			// si el permiso existe en el rol, no lo inserta de nuevo
			$permisos = $rol->permisos();
			if($permisos->find($permiso_id)) 
				return $this->responder_error('El permiso ya se encuentra asignado al rol', 409);

			$permisos->attach($permiso_id);
			return $this->responder("El permiso $permiso_id ha sido agregado al rol $rol_id", 201);
		}

		public function destroy($rol_id, $permiso_id){
			// checamos si existe el rol
			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('El rol no existe', 404);

			// Vemos si el rol tiene el permiso solicitado
			$permisos = $rol->permisos();
			if(!$permisos->find($permiso_id))
				return $this->responder_error('No existe el permiso solicitado', 404);
			
			$permisos->detach($permiso_id);
			return $this->responder('permiso eliminado del rol', 200);
		}

}