<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
		public function __construct(){
				//
		}

		public function index(){
			$usuarios = Usuario::all();
			return $this->responder($usuarios, 200);
		}

		public function show($id){
			$usuario = Usuario::find($id);

			if($usuario)
				return $this->responder($usuario, 200);
			return $this->responder_error('usuario no encontrado', 404);
		}

		public function store(Request $request){
			$usuario = new Usuario;

			$this->validar_usuario($request);

			$usuario->nombre = $request->get('nombre');
			$usuario->appaterno = $request->get('appaterno');
			$usuario->apmaterno = $request->get('apmaterno');
			$usuario->email = $request->get('email');
			$usuario->password = password_hash($request->get('password'), PASSWORD_BCRYPT);

			$usuario->save();
			return $this->responder("Usuario '{$usuario->id}' creado correctamente", 201);
		}

		public function update(Request $request, $usuario_id){
			$usuario = Usuario::find($usuario_id);

			$this->validar_usuario($request);

			if(!$usuario)
				return $this->responder_error('usuario inexistente', 404);
			
			$usuario->nombre = $request->get('nombre');
			$usuario->appaterno = $request->get('appaterno');
			$usuario->apmaterno = $request->get('apmaterno');
			$usuario->email = $request->get('email');
			$usuario->password = password_hash($request->get('password'), PASSWORD_BCRYPT);

			$usuario->save();

			return $this->responder('Usuario editado', 201);

		}

		public function validar_usuario($request){
			$reglas = [
				'nombre' => 'required',
				'appaterno' => 'required',
				'email' => 'required|email',
				'password' => 'required'
			];
			$this->validate($request, $reglas);
		}

}
