@extends('layouts.gamm')
@section('content')

<div class="content">


@foreach($bonus as $bonus)
<div class="block padtop_s">
    <ul>
    <li class="padtop_s">
        <img width="48" height="48" src="/Themes/images/misc/brusnika.png" class="icon"/>
                 <span><a href="/Rooms/ChangeVitamin?vitaminId=1&page=1">{{ $bonus->name }}</a></span><span class="minor">,</span>
                <span class="smallfont minor">цена</span>
                <img width="16" height="16" src="/Themes/images/coins2.png"/>
                <span class="ylwtitle">{{ $bonus->price }}</span>
        <div class="smallfont">
            <div>
                <span class="minor">Опыт: </span>
                <img width="16" height="16" src="/Themes/images/exp2.png"/>
                <span class="money">{{ $bonus->exp }}</span>
                <br/>
                <span class="minor">При использовании медикаментов,</span>
                <br/>
                <span class="minor">ускоряет выздоровление на </span>
                <span class="money">{{ $bonus->total_time }} мин.</span>
                            <a class="minor" href="/Rooms/ChangeCurrentVitamin?details=1&page=1">подробнее</a>
                <br/>
            </div>
        </div>
        <div style="clear: both"></div>
    </li>


@endforeach

<!--
    <div class="padtop_m">
        <img width="16" height="16" src="/Themes/images/warning.png"/>
        <span class="warningtext"><a href="/Purchases/Blender">Блендер</a> и <a href="/Purchases/Cofemachine">Кофемашина</a> может увеличить эффективность и повысить количество получаемого опыта в несколько раз.</span>
    </div>
</ul>
</div>
-->
@endsection
