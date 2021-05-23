<?php
require_once './modelos/pedido.php';
require_once './interfaces/IApiUsable.php';
require_once __DIR__.'/../modelos/mesa.php';
require_once __DIR__.'/../modelos/pedido.php';
require_once __DIR__.'/../modelos/staff.php';

class PedidoApi extends Pedido implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	return;
        //$id=$args['id'];
    	//$elCd=cd::TraerUnCd($id);
     	//$newResponse = $response->withJson($elCd, 200);  
    	//return $newResponse;
    }
    public function TraerTodos($request, $response, $args) {
      	$pedidos = Pedido::GetArrayObj();
        if(is_null($pedidos))
            return $response->withJson("Error al obtener datos de la base de datos\n",500);
    	return count($pedidos) > 0 ?
            $response->withJson($pedidos , 200):
            $response->withJson("No existe ningún pedido en la lista\n",204);
    }
    public function CargarUno($request, $response, $args) {
        $elem = Validar::Pedido($request->getParsedBody());
        if(is_string($elem))
            return $response->withJson($elem,400);
        return $elem->GuardarBD()? 
            $response->withJson("Operación (alta de pedido) exitosa.\n",201):
            $response->withJson("Error, operación (alta de pedido) fallida.\n",500);
    }
    public function BorrarUno($request, $response, $args) {
        return;
        //$parametros = $request->getParsedBody();
     	//$id=$parametros['id'];
     	//$cd= new cd();
     	//$cd->id=$id;
     	//$cantidadDeBorrados=$cd->BorrarCd();
     	//$objDelaRespuesta= new stdclass();
	    //$objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    //if($cantidadDeBorrados>0)
	    //	{
	    //		 $objDelaRespuesta->resultado="algo borro!!!";
	    //	}
	    //	else
	    //	{
	    //		$objDelaRespuesta->resultado="no Borro nada!!!";
	    //	}
	    //$newResponse = $response->withJson($objDelaRespuesta, 200);  
      	//return $newResponse;
    }
    public function ModificarUno($request, $response, $args) {
        return;
        //$response->withJson("<h1>Modificar  uno</h1>");
     	//$parametros = $request->getParsedBody();
	    //var_dump($parametros);    	
	    //$micd = new cd();
	    //$micd->id=$parametros['id'];
	    //$micd->titulo=$parametros['titulo'];
	    //$micd->cantante=$parametros['cantante'];
	    //$micd->año=$parametros['anio'];
	   	//$resultado =$micd->ModificarCdParametros();
	   	//$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		//$objDelaRespuesta->resultado=$resultado;
		//return $response->withJson($objDelaRespuesta, 200);		
    }


}