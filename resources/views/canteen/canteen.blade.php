@extends('layouts.gamm')
@section('content')



<div class="content">
    <div class="block">
@include('inc.message')
    <div>
        <img width="16" height="16" src="/Themes/images/refresh.png"/>
        <a href="{{ route('gem.gem.index') }}">Обновить</a>
        <a href="{{ url('home') }}">Домой</a>
    </div>



    <ul class="delim-list padtop_s">
      @foreach($userlist as $userlist)
      @if($userlist->total_time = $userlist->total_time)
      <li class="padtop_s first-li">
              <td> <img class="icon" width="48" height="48" src="{{ Storage::url($userlist->image_url)}}"/> </td>
          <div class="row">
              <div>
                      <span class="patienttitle">{{ $userlist->product_name }}</span>
<span class="minor smallfont">

@php
// реализация самого таймера
$timeh = date('H', strtotime($userlist->updated_at));
$timei = date('i', strtotime($userlist->updated_at));
$times = date('s', strtotime($userlist->updated_at));

// за основу взята функция mktime
$s = $times; // переменная секунда
$x = $timeh;// переменная час
$r = $timei + $userlist->total_time;// переменная минуты здесь же мы прибовляем время которая храниться в бд
$m = date("m", strtotime($userlist->updated_at));// переменная месяц
$e = date("d", strtotime($userlist->updated_at));// переменная день
$i = date("Y", strtotime($userlist->updated_at));// переменная год

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
  До окончания

    @if($daysRemaining > 0)
    {{$daysRemaining}} д,
    @else

    @endif
    @if($hoursRemaining > 0)
    {{$hoursRemaining}} ч,
    @else

    @endif
    @if($minutesRemaining > 0)
     {{$minutesRemaining}} минут,
     @else

     @endif
     @if($secondsRemaining > 0)
     {{$secondsRemaining}} секунда
     @else

     @endif
   </span>                    </div>
                 <div>

@php
$tameh = date('H', strtotime($userlist->dat));
$tamei = date('i', strtotime($userlist->dat));
$tames = date('s', strtotime($userlist->dat));




$sar = $tames;
$xix = $tameh;
$rar = $tamei + Auth::user()->button;
$mab = date("m", strtotime($userlist->dat));
$ey = date("d", strtotime($userlist->dat));
$ir = date("Y", strtotime($userlist->dat));

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
  <div class='blog'>До следующего опроса
    @if($days > 0)
    {{$days}} д,
    @else

    @endif

    @if($hours > 0)
    {{$hours}} ч,
    @else

    @endif

    @if($minutes > 0)
    {{$minutes}} минут,
    @else

    @endif

    @if($ref > 0)
     {{$ref}} секунда
     @else

     @endif



  @else
</div>
    <a href="{{ route('gem.taim.edit', ['taim' => $userlist->id]) }}">Быстрый допрос</a></br>
    <a href="{{ route('gem.proba.edit', ['proba'=> $userlist->id]) }}">Личный допрос</a>



@endif


@else

</br>
    <a href="{{ route('gem.nonesk.edit', ['nonesk'=> $userlist->id]) }}">Завершить допрос</a>
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
                            <span class="patienttitle">Свободная кухня</span>
<span class="minor smallfont"></span>                    </div>
                    <div>

    <img width="16" height="16" src="/Themes/images/diagnosis.png"/>
<a href="{{ route('gem.gem.edit', ['gem'=> $userlist->id]) }}">Принять подозреваемого</a>
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
    <span class="drugtitle">Новая кухня</span>
    <div>
                <img width="16" height="16" src="/Themes/images/cart.png"/>
                <a href="{{ route('canteen.canteen.create') }}">Купить</a>
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

@endsection
