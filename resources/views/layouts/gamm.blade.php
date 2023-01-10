@php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Level;
use App\Models\Pharmaceuticals;
use App\Models\Users;
use App\Models\Images;
use App\Models\Schablon;
use App\Helper\TimeHelper;
use App\Helper\TaimHelper;
@endphp
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Пульт управления</title>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
<link rel="apple-touch-icon" sizes="72x72" href="/touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/touch-icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="144x144" href="/touch-icon-ipad-retina.png" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link href="{{ asset('css/mainb.css') }}" rel="Stylesheet" type="text/css" />
</head>
<body>
    <div>

<div class="caption">
    <h1>пульт управления</h1>
</div>
<div class="content">
  @yield('content')
  <div class="game_actions">
  <div class="delim">
      <div style="width:11%;">
      </div>
  </div>
  @php
$user = Auth::user()->name;
$amout = DB::table('cart')->where('user', $user)->count();
$pharmaceuticals = DB::table('lab')->where('user', $user)->count();

  @endphp
    <div class="block">
        <ul class="action_list">
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="{{ route('gem.gem.index') }}">палата</a>
                    <span class="ylwtitle">(@php  echo  $amout @endphp)</span>
            </li>
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="{{ route('pharmaceuticals.pharmaceuticals.index') }}">Формацефтика</a>
                    <span class="ylwtitle">(@php  echo  $pharmaceuticals @endphp)</span>
            </li>
        <!--    <li>
                <img width="16" height="16" alt="o" src="{{ asset('storage/images/ico.jpg') }}">
                    <a href="{{ route('canteen.canteen.index') }}">Столовая</a>
                    <span class="ylwtitle">(12)</span>
            </li>
                <ul>
 
                <li>
                    <img width="16" height="16" alt="o" src="{{ asset('storage/images/carzr.png') }}">
                        <a href="/Quests?t=637958294648680268">Карцр</a>
<span class="ylwtitle">(*)</span>                </li>-->

                <li>
                    <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                        <a href="/VetClinic?t=637958294648680268">Автопарк</a>
                        <span class="ylwtitle">(5)</span>
                </li>

<br>
                <li>Психиатрическая клиника
                    <ol>
                        <li><!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                            <a href="">Спец палата</a>
                            <span class="ylwtitle">(в разработке)</span></li>
                        <li><!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                            <a href="">Изолятор</a>
                            <span class="ylwtitle">(в разработке)</span></li>
                        <li><!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                            <a href="">Вызов</a>
                            <span class="ylwtitle">(в разработке)</span></li>
                    </ol>
                </li>

<br>

                
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="{{ route('stock.stock.index') }}">Склад</a>
            </li>
            <li>
               <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                <a href="">Магазин</a>
            </li>
            <li>
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="">Кабинет</a>
            </li>

            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="">Форум</a>
<span class="ylwtitle">(*)</span>            </li>
            <li>
               <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="">Чат</a>
<span class="ylwtitle">(*)</span>            </li>
            <li class="padtop_m">
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                <a class="ylwtext" href="">Справка по игре</a>
            </li>
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="">Почта</a>
            </li>
           
            <li>
                <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                    <a href="">Профиль</a>
<span class="ylwtext">(+)</span>            </li>
               @if (Auth::user()->klan > 0)
                   
              
                <li>
                    <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                        <a href="">Союз</a>
<span class="ylwtitle">(в разработке)</span>                </li>
                <li>
                    <!--<img width="16" height="16" alt="o" src="{{ asset('storage/images/palata.png') }}">-->
                        <a href="">Ординаторская</a>
<span class="ylwtitle">(в разработке)</span>                </li>
@else

@endif
        </ul>
    </div>
</div>
<div class="notify smallfont block">
@php

$lvls = Auth::user()->lvl;
$lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');

@endphp
    <span class="game_actions_text"><img width="16" height="16" src="/Themes/images/coins2.png"/>
{{ Auth::user()->coins}} монет</span>
    <img width="16" height="16" src="/Themes/images/diamond.png" />
    <span class="game_actions_text">721</span> <span>алмаз</span>
    <img width="16" height="16" src="{{ asset('storage/images/exp.png') }}" />

    <span class="game_actions_text">@php  echo  $lv @endphp </span> <span>/ <span class="next_exp">{{ Auth::user()->exp}}</span> опыта</span>

    <img width="16" height="16" src="/Themes/images/fruit-apple-half.png" />
    <span>{{ Auth::user()->lvl}} </span> <span>уровень</span>
</div>

</div>


<div class="padtop_m gray" style="text-align:center;">
    <div class="">

        <div>Вы зашли как {{ Auth::user()->name}}</div> <br>

    </div>
</div>


    </div>

</body>
</html>

