<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Камера</title>
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
    <h1>Камера</h1>
</div>
<div class="content">
    <div class="block">

    <div>
        <img width="16" height="16" src="/Themes/images/refresh.png"/>
        <a href="{{ url('/gem') }}">Обновить</a>
        <a href="{{ url('home') }}">Домой</a>
    </div>
    @include('inc.message')

    <ul class="delim-list padtop_s">
      @foreach($laf as $lafLis)
      @if($lafLis->total_time = $lafLis->total_time)
      <li class="padtop_s first-li">
              <td> <img class="icon" width="68" height="68" src="{{ Storage::url($lafLis->image_url)}}"/> </td>
          <div class="row">
              <div>
                      <span class="patienttitle">{{ $lafLis->product_name }}</span>
<span class="minor smallfont"></span>                    </div>
              <div>

@php
// реализация самого таймера
$timeh = date('H', strtotime($lafLis->updated_at));
$timei = date('i', strtotime($lafLis->updated_at));
$times = date('s', strtotime($lafLis->updated_at));

// за основу взята функция mktime
$s = $times; // переменная секунда
$x = $timeh;// переменная час
$r = $timei + $lafLis->total_time;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$m = date("m", strtotime($lafLis->updated_at));// переменная месяц
$e = date("d", strtotime($lafLis->updated_at));// переменная день
$i = date("Y", strtotime($lafLis->updated_at));// переменная год

$endOfDiscount = mktime($x,$r,$s,$m,$e,$i);
$now = time(); // текущее время
$secondsRemaining = $endOfDiscount - $now; // оставшееся время

$minut;
$hour;
$day;

$daysRemaining = floor($secondsRemaining / $day); //дни, до даты
$secondsRemaining -= ($daysRemaining * $day);     //обновляем переменную

$hoursRemaining = floor($secondsRemaining / $hour); // часы до даты
$secondsRemaining -= ($hoursRemaining * $hour);     //обновляем переменную

$minutesRemaining = floor($secondsRemaining / $minut); //минуты до даты
$secondsRemaining -= ($minutesRemaining * $minut);     //обновляем переменную
@endphp

@if ($daysRemaining > -1)
  <div class='blog'>До окончания {{$daysRemaining}} д, {{$hoursRemaining}} ч, {{$minutesRemaining}} минут, {{$secondsRemaining}} секунда</div>

@php
$tameh = date('H', strtotime($lafLis->dat));
$tamei = date('i', strtotime($lafLis->dat));
$tames = date('s', strtotime($lafLis->dat));




$sar = $tames;
$xix = $tameh;
$rar = $tamei + $lafLis->button;
$mab = date("m", strtotime($lafLis->dat));
$ey = date("d", strtotime($lafLis->dat));
$ir = date("Y", strtotime($lafLis->dat));

  $end = mktime($xix,$rar,$sar,$mab,$ey,$ir);
  $naw = time(); // текущее время
  $ref = $end - $naw; // оставшееся время

  $minut;
  $hour;
  $day;

  $days = floor($ref / $day); //дни, до даты
  $ref -= ($days * $day);     //обновляем переменную

  $hours = floor($ref / $hour); // часы до даты
  $ref -= ($hours * $hour);     //обновляем переменную

  $minutes = floor($ref / $minut); //минуты до даты
  $ref -= ($minutes * $minut);     //обновляем переменную
@endphp
  @if ($days > -1)
  <div class='blog'>До следующего опроса {{$days}} д, {{$hours}} ч, {{$minutes}} минут, {{$ref}} секунда</div>


  @else

    <a href="{{ route('gem.taim.edit', ['taim' => $lafLis->id]) }}">Сократить время</a>



@endif


@else


    <a href="{{ route('gem.nonesk.edit', ['nonesk'=> $lafLis->id]) }}">Завершить допрос</a>
@endif
<!--здесь должно отображаться таймер до следующего сокращение времени-->
              </div>
          </div>
          <div style="clear: both"></div>

      </li>



@else

  @foreach($has as $lafL)


            <li class="padtop_s first-li">
                    <img class="icon_l" width="48" height="48" src="{{ Storage::url($lafL->url)}}">
                <div class="row">
                    <div>
                            <span class="patienttitle">Свободная палата</span>
<span class="minor smallfont"></span>                    </div>
                    <div>

    <img width="16" height="16" src="/Themes/images/diagnosis.png"/>
<a href="{{ route('gem.gem.edit', ['gem'=> $lafLis->id]) }}">Принять подозреваемого</a>
                    </div>
                </div>
                <div style="clear: both"></div>

            </li>


            @endforeach

@endif

                  @endforeach

  @forelse($has as $lafL)
            <li class="padtop_m">

<div>
    <img class="icon" width="48" height="48" src="{{ Storage::url($lafL->url)}}"/>
    <span class="drugtitle">Новая палата</span>
    <div>
                <img width="16" height="16" src="/Themes/images/cart.png"/>
                <a href="{{ route('gem.gem.create') }}">Купить</a>
            за
                <img width="16" height="16" src="/Themes/images/diamond.png"/>
            <span class="ylwtitle">1000 алмазов</span>
     </div>
     <div style="clear: both"></div>
</div>

            </li>

            @empty
            @endempty
    </ul>
    <ul class="padtop_m">
        <li>
            <img width="16" height="16" src="/Themes/images/pill.png"/>
            <a href="/Rooms/ChangeCurrentVitamin?t=637958294648680268&page=1">Выбрать полезный напиток</a>:
                <div style="margin-left:21px">
                    Живительный напиток
                </div>
        </li>
        <li class="padtop_m">
            <img width="16" height="16" src="/Themes/images/receptionist.png"/>
            <a href="/Reception?t=637958294648680268">Приемная</a>
        </li>
    </ul>

</div>
    <div class="game_actions">
    <div class="delim">
        <div style="width:11%;">
        </div>
    </div>
    <div class="block">
        <ul class="action_list">
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/bed.png">
                    <a href="/Rooms?t=637958294648680268">Палаты</a>
                    <span class="ylwtitle">(18)</span>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/pharmacy.png">
                    <a href="/Pharmacy?t=637958294648680268">Лаборатории</a>
                    <span class="ylwtitle">(12)</span>
            </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/car-red.png">
                    <a href="/AutoPark?t=637958294648680268">Автопарк</a>
                        <span class="ylwtitle">(26)</span>
                </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/tornado-icon.png">
                        <a href="/Quests?t=637958294648680268">ЧП Торнадо</a>
<span class="ylwtitle">(*)</span>                </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/VetClinic/cat_01.png">
                        <a href="/VetClinic?t=637958294648680268">Ветеринария</a>
                        <span class="ylwtitle">(5)</span>
                </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/Patients/patient5.png" />
                <a href="/TournamentsBoard?t=637958294648690268">Доска турниров</a>
            </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/Tasks/tasks.png" />
                    <a href="/DiamondsTasks?t=637958294648690268">Алмазные задания</a>
                </li>

                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/Tasks/tasks.png" />
                        <a href="/DailyTasks?t=637958294648690268">Ежедневные задания</a>
                        <span class="ylwtitle">(1)</span>
                </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/misc/cup-3.png">
                    <a href="/Competitions?t=637958294648690268">Соревнования</a>
                        <span class="ylwtitle">(*)</span>
                </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/warehouse.png">
                    <a href="/Warehouse">Склад</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/cart.png">
                <a href="/Purchases?t=637958294648690268">Магазин</a>
            </li>
            <li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/cabinet-icon.png">
                    <a href="/Cabinet?t=637958294648690268">Кабинет</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/emergency-icon.png">
                <a href="/Operation">Операционная</a>
            </li>
            <li class="padtop_m">
                <img width="16" height="16" alt="o" src="/Themes/images/globe-green.png">
                    <a class="epic" href="/WorldEvents">События</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/diamond.png">
                <a href="/Bank?t=637958294648690268">Алмазы</a>
                    <span class="ylwtext">(</span><span class="epic">100%</span> <span class="ylwtext"> <img width="16" height="16" alt="o" src="/Themes/images/diamond.png"> алмазов в подарок)</span>
            </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/diamond.png">
                    <a class="epic" href="/WorldEvents">Cкидки на оборудование!</a>
                </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/folder.png">
                    <a href="/Forum">Форум</a>
<span class="ylwtitle">(*)</span>            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/chat.png">
                    <a href="/Chat">Чат</a>
<span class="ylwtitle">(*)</span>            </li>
            <li class="padtop_m">
                <img width="16" height="16" alt="o" src="/Themes/images/book-open.png">
                <a class="ylwtext" href="/Forum/Messages?topicId=974b7ae6-ea2f-47f0-9d0f-15747ac6d96b">Справка по игре</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/email.png">
                    <a href="/Email?mode=All">Почта</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/People.png">
                    <a href="/Friends">Друзья</a>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/fruit-apple-half.png">
                    <a href="/Profile">Профиль</a>
<span class="ylwtext">(+)</span>            </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/union.png">
                        <a href="/Union?unionId=604a0805-075f-4338-821d-dfd570d655a1">Союз</a>
<span class="ylwtitle">(*)</span>                </li>
                <li>
                    <img width="16" height="16" alt="o" src="/Themes/images/chat.png">
                        <a href="/UnionHQ?unionId=604a0805-075f-4338-821d-dfd570d655a1">Ординаторская</a>
<span class="ylwtitle">(*)</span>                </li>
        </ul>
    </div>
</div>
<div class="notify smallfont block">

    <span class="game_actions_text"><img width="16" height="16" src="/Themes/images/coins2.png"/>
13 784 273 856 монет</span>
    <img width="16" height="16" src="/Themes/images/diamond.png" />
    <span class="game_actions_text">721</span> <span>алмаз</span>
    <img width="16" height="16" src="/Themes/images/exp.png" />
    <span class="game_actions_text">3.417g</span> <span>/ <span class="next_exp">30g</span> опыта</span>
    <img width="16" height="16" src="/Themes/images/fruit-apple-half.png" />
    <span>43</span> <span>уровень</span>
</div>

</div>


<div class="padtop_m gray" style="text-align:center;">
    <div class="padbottom_m msg logininfo">

        <div>Вы зашли как ТуманныеНочи | <a class="footer_link" href="/Logout">Выйти</a></div>

    </div>

    <div id="treasuresLink" class="padbottom_m" style="display: none">
        <div><a href="http://xrpg.mobi"><img width="60" src="/Themes/images/icon_xrpg.png"/></a></div>
        <a style="color:#ab47fd" href="http://xrpg.mobi">Охота началась!</a>
    </div>

    <div style="text-align: center">
        <span class="minor">Добавь в закладки</span>
        <a style="color:#ab47fd" href="http://xospital.mobi">xospital.mobi</a>
    </div>

    <div>
        <a class="footer_link" href="/Support">Тех.поддержка</a>

        |
        <a class="footer_link" href="/Agreement">Соглашение</a>

        |
        <a class="footer_link" href="/Contacts">Контакты</a>
    </div>

    <div class="padtop_s padbottom_s">
        Онлайн-игра Интерны

        <br/>
        © Fruitshake 2022

               <div class="padtop_s">
                   <a class="gray" href="https://portal.fruitshake.mobi?src=3">Другие игры</a>
               </div>

    </div>
    <div class="smallfont">
        11.08.2022 15:44:24,
        15 мс,
        16+
    </div>

</div>


    </div>

</body>
</html>
