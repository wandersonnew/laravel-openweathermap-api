<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Temperature;

class TempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resultado = DB::table('temperatures')
            ->select('*')
            ->whereRaw('DATEDIFF(NOW(), created_at) = 0')
            ->whereRaw('(TIME_TO_SEC(DATE_FORMAT(NOW(), "%H:%i:%s")) - TIME_TO_SEC(DATE_FORMAT(created_at, "%H:%i:%s"))) < 1260')
            ->whereRaw('city = ?', [$request->city])
            ->get();

        if(!$resultado->isEmpty())
            return $resultado;
        else {
            $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $request->city . "," . $request->state . "," . $request->country . "&appid=800671140132f72a761932fe0933d5f0&units=metric";
            $search = json_decode(file_get_contents($url), true);

            if($search['cod'] != 200) {
                return "Algum parâmetro inválido";
            } else {
                $resultado = [
                    'city' => $search['name']
                    ,'status_sky' => $search['weather'][0]['main']
                    ,'description' => $search['weather'][0]['description']
                    ,'icon' => $search['weather'][0]['icon']
                    ,'temp' => $search['main']['temp']
                    ,'temp_min' => $search['main']['temp_min']
                    ,'temp_max' => $search['main']['temp_max']
                    ,'country' => $search['sys']['country']
                ];

                $temperature = new Temperature;
                $temperature->status_sky = $resultado['status_sky'];
                $temperature->description = $resultado['description'];
                $temperature->temp = $resultado['temp'];
                $temperature->temp_min = $resultado['temp_min'];
                $temperature->temp_max = $resultado['temp_max'];
                $temperature->country = $resultado['country'];
                $temperature->icon = $resultado['icon'];
                $temperature->city = $resultado['city'];
                $temperature->save();
                return $resultado;
                //<img src="http://openweathermap.org/img/wn/{icon}@2x.png" alt="Girl in a jacket" width="500" height="600">
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request->nome;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
