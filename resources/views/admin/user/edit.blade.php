
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
                      <form  method="post" action="{{ route('admin.nps.update', ['np'=> $npsLis]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <td> <img src="{{ Storage::url($npsLis->image_url)}}" width='68' height='68'> </td>

                        <div class="form-group">
                        <label for="product_name">Имя</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $npsLis->product_name }}">
                        </div>
                        <div class="form-group">
                        <label for="price">Время</label>
                        <input type="text" class="form-control" name="total_time" id="total_time" value="{{ $npsLis->total_time }}">
                        </div>
                        <div class="form-group">
                        <label for="exp">Опыт</label>
                        <input type="text" class="form-control" name="exp" id="exp" value="{{ $npsLis->exp }}">
                        </div>
                        <div class="form-group">
                        <label for="image_url">Картинка</label>
                        <input type="file" class="form-control" name="image_url" id="image_url">
                        </div>

                        <div class="form-group">
                        <label for="description">Время</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $npsLis->description }}">
                        </div>


                        <button class="btn btn-primary">Сохранить</button>

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
