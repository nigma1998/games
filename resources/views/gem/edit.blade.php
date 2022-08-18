
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>Редактировать</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/laf.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <a href="{{ route('admin.nps.index') }}">Вернуться обратно</a>
                    <div class="card-header">{{ __('Редактировать nps ') }} </div>


                    <div class="card-body">
                      <form  method="post" action="{{ route('gem.gem.update', ['gem'=> $lis]) }}" enctype="multipart/form-data">
                        @foreach($npsListt as $lafLis)
                        @csrf
                        @method('put')

                      
                        <div class="form-group">
                        <label for="product_name">Имя</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{$lafLis->product_name }}">
                        </div>
                        <div class="form-group">
                        <label for="price">Время</label>
                        <input type="text" class="form-control" name="price" id="price" value="">
                        </div>
                        <div class="form-group">
                        <label for="image_url">Опыт</label>
                        <input type="text" class="form-control" name="exxp" id="exxp" value="">
                        </div>



                        <button class="btn btn-primary">Сохранить</button>

                        @endforeach
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
