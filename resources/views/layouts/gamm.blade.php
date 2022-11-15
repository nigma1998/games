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
  @yield('content')
  <div class="game_actions">
  <div class="delim">
      <div style="width:11%;">
      </div>
  </div>
    <div class="block">
        <ul class="action_list">
            <li>
                <img width="16" height="16" alt="o" src="{{ asset('storage/images/car.jpg') }}">
                    <a href="{{ route('gem.gem.index') }}">Камера</a>
                    <span class="ylwtitle">(18)</span>
            </li>
            <li>
                <img width="16" height="16" alt="o" src="{{ asset('storage/images/ico.jpg') }}">
                    <a href="{{ route('canteen.canteen.index') }}">Столовая</a>
                    <span class="ylwtitle">(12)</span>
            </li>
                <li>
                    <img width="16" height="16" alt="o" src="{{ asset('storage/images/ogorod.jpg') }}">
                    <a href="/AutoPark?t=637958294648680268">Огород</a>
                        <span class="ylwtitle">(26)</span>
                </li>
                <li>
                    <img width="16" height="16" alt="o" src="{{ asset('storage/images/carzr.png') }}">
                        <a href="/Quests?t=637958294648680268">Карцр</a>
<span class="ylwtitle">(*)</span>                </li>
                <li>
                    <img width="16" height="16" alt="o" src="{{ asset('storage/images/name.png') }}">
                        <a href="/VetClinic?t=637958294648680268">Автопарк</a>
                        <span class="ylwtitle">(5)</span>
                </li>
            <li>
                <img width="16" height="16" alt="o" src="/Themes/images/Patients/patient5.png" />
                <a href="{{ route('gem.diamond.index') }}">Пальма</a>
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

    <span class="game_actions_text">3.417g</span> <span>/ <span class="next_exp"></span> опыта</span>

    <img width="16" height="16" src="/Themes/images/fruit-apple-half.png" />
    <span>{{ Auth::user()->lvl}} </span> <span>уровень</span>
</div>

</div>


<div class="padtop_m gray" style="text-align:center;">
    <div class="padbottom_m msg logininfo">

        <div>Вы зашли как ТуманныеНочи | <a class="footer_link" href="/Logout">Выйти</a></div>

    </div>
</div>


    </div>

</body>
</html>
