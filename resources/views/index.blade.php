<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css" />
  <title>Weather</title>
</head>

<body>
  <div class="container-fluid p-0 container-sm d-flex justify-content-center">

    <div class="card text-center shadow-lg mt-4" style="width: 26rem;">

      <div class="card-header bg-white text-dark font-weight-bold">
        TEMPO E TEMPERATURA
      </div>

      <div class="card-body">
        <div class="city" id="city_head">Cidade Exemplo, BR</div>
        <div class="date" id="fulldate">Terça, 1 Dezembro 2020</div>
        <div class="container-img">
        <img src="http://openweathermap.org/img/wn/03n@2x.png" alt="Girl in a jacket" width="200" height="200" id="icon">
        </div>
        <div class="container-temp mx-4 my-3">
          <div id="temp">22</div>
          <span>°c</span>
        </div>
        <div class="weather py-2" id="status_sky">Nublado</div>
        <div class="low-high" id="temp_min_and_max">22°c / 23°c</div>
      </div>

      <div class="card-footer bg-white">
        <!--<form action="/search" method="post"> -->
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />-->
        @csrf
        <div class="form-group">
            <!--<div class="input-group ">
                <input type="text" class="form-control bg-light" placeholder="digite o nome da cidade" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-warning text-dark" type="button" id="button-addon2">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>-->
            <input type="text" class="form-control" name="city" id="city" placeholder="digite a cidade" value="Sobral">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="state" id="state" placeholder="digite o estado" value="CE">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="country" id="country" placeholder="digite o país" value="pt_br">
        </div>
        <button type="button" class="btn btn-outline-warning text-dark btn-lg" onclick="Buscar()">Procurar <i class="fas fa-search"></i></button>
        <!--<input type="submit" value="Send">-->
        <!--</form>-->
      </div>

    </div>
  </div>


  <script src="/js/script.js"></script>
  <script src="https://kit.fontawesome.com/f0e17cbf2f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
</body>

</html>