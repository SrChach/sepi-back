<?php

namespace App\Http\Controllers;

use App\Firma;

class FirmaController extends Controller
{
		public function __construct(){
				//
		}

		public function index(){
			$firmas = Firma::all();
			return $this->responder($firmas, 200);
		}

		public function show($id){
			$firma = Firma::find($id);

			if($firma)
				return $this->responder($firma, 200);
			return $this->responder_error('firma no encontrada', 404);
		}

}
