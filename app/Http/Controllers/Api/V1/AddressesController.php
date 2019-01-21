<?php

namespace StoreTI\Http\Controllers\Api\V1;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use StoreTI\Http\Controllers\Controller;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\ProductDetailsPresenter;
use StoreTI\Repositories\Interfaces\ProductRepository;

class AddressesController extends Controller
{

    public function buscarCep(Request $request)
    {
        try {
            $client = new GuzzleHttpClient();
            $CEPbuscar = $request->query->get('cep');
            $apiRequestCEP = $client->request('GET', 'http://api.postmon.com.br/v1/cep/' . $CEPbuscar);
            $result_cep = json_decode($apiRequestCEP->getBody()->getContents(),true);
            return response()->json(compact('result_cep'),200);

        } catch (RequestException $re) {
            return response()->json([
                'error'       => true,
                'message' => 'CEP não encontrado',
                'serve'=>$re->getMessage()], 422);
        }
    }
}
