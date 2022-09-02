<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title> Приемная</title>
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
    <h1>камера</h1>
</div>
<div class="content">


<div class="block">
    <div>

        <h3>Ожидающие подозреваемые</h3>

    </div>
    <a href="{{ route('admin.nps.index') }}">Вернуться обратно</a>
    <ul class="delim-list padtop_s">

        <li class="padtop_s first-li ">

                    <div class="card-body">
                      <form  method="post" action="{{ route('gem.nonesk.update', ['nonesk'=> $lis]) }}" onchange="this.form.submit()" enctype="multipart/form-data">


                        <img class="icon" width="58" height="58" src="{{ Storage::url($lis->image_url)}}"/>
                        <div>
                            <a href="/Reception/Treat?repIndex=1&roomIndex=1&t=637967616171613494&page=1">{{$lis->product_name}}</a><span class="smallfont minor">, </span>
            <span class="smallfont minor">(Ксюша, 24 года)</span><span class="smallfont minor">, </span>
            <span class="smallfont minor">цена:</span>
            <img width="16" height="16" alt="o" src="/Themes/images/coins2.png" />
            <span class="smallfont minor">90</span>
<!--Здесь реализуеться очищение таблицы-->
                        </div>

            <div class="smallfont minor" style="margin-left:52px;">
                <div>

                </div>
                <span>Опыт:</span>
                <img width="16" height="16" src="/Themes/images/exp2.png"/><span class="money">{{$lis->exxp}}</span><span class="minor">, </span>


            </div>


                        @csrf
                        @method('put')

                        <div class="form-group">

                        <input type="hidden" class="form-control" name="product_name" id="product_name" value="">
                        </div>
                        <div class="form-group">

                        <input type="hidden" class="form-control" name="total_time" id="total_time" value="">
                        </div>
                        <div class="form-group">

                        <input type="hidden" class="form-control" name="exxp" id="exxp" value="">
                        </div>

                        <button class="btn btn-primary">Отправить на этап</button>


                      </form>
                      </li>
                    </ul>

                </div>
                    <div class="game_actions">
                    <div class="delim">
                        <div style="width:25%;">
                        </div>
                    </div>
                    <div class="block">
                        <ul class="action_list">
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/bed.png">
                                    <a href="/Rooms?t=637967616171623495">Палаты</a>
                                    <span class="ylwtitle">(12)</span>
                            </li>
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/pharmacy.png">
                                    <a href="/Pharmacy?t=637967616171623495">Лаборатории</a>
                                    <span class="ylwtitle">(12)</span>
                            </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/car-red.png">
                                    <a href="/AutoPark?t=637967616171623495">Автопарк</a>
                                        <span class="ylwtitle">(26)</span>
                                </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/tornado-icon.png">
                                        <a href="/Quests?t=637967616171623495">ЧП Торнадо</a>
                <span class="ylwtitle">(*)</span>                </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/VetClinic/cat_01.png">
                                        <a href="/VetClinic?t=637967616171623495">Ветеринария</a>
                                        <span class="ylwtitle">(4)</span>
                                </li>
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/Patients/patient5.png" />
                                <a href="/TournamentsBoard?t=637967616171623495">Доска турниров</a>
                            </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/Tasks/tasks.png" />
                                    <a href="/DiamondsTasks?t=637967616171623495">Алмазные задания</a>
                                </li>

                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/Tasks/tasks.png" />
                                        <a href="/DailyTasks?t=637967616171623495">Ежедневные задания</a>
                                        <span class="ylwtitle">(6)</span>
                                </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/misc/cup-3.png">
                                    <a href="/Competitions?t=637967616171623495">Соревнования</a>
                                        <span class="ylwtitle">(*)</span>
                                </li>
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/warehouse.png">
                                    <a href="/Warehouse">Склад</a>
                            </li>
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/cart.png">
                                <a href="/Purchases?t=637967616171623495">Магазин</a>
                            </li>
                            <li>
                            <li>
                                <img width="16" height="16" alt="o" src="/Themes/images/cabinet-icon.png">
                                    <a href="/Cabinet?t=637967616171623495">Кабинет</a>
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
                                <a href="/Bank?t=637967616171623495">Алмазы</a>
                                    <span class="ylwtext">(</span><span class="epic">100%</span> <span class="ylwtext"> <img width="16" height="16" alt="o" src="/Themes/images/diamond.png"> алмазов в подарок)</span>
                            </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/diamond.png">
                                    <a class="epic" href="/WorldEvents">Супер акция! 300 алмазов бесплатно!</a>
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
                                <img width="16" height="16" alt="o" src="/Themes/images/smallavas/ava_butterfly_scorpio-f.png">
                                    <a href="/Profile">Профиль</a>
                            </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/union.png">
                                        <a href="/Union?unionId=604a0805-075f-4338-821d-dfd570d655a1">Союз</a>
                <span class="ylwtitle">(*)</span>                </li>
                                <li>
                                    <img width="16" height="16" alt="o" src="/Themes/images/chat.png">
                                        <a href="/UnionHQ?unionId=604a0805-075f-4338-821d-dfd570d655a1">Ординаторская</a>
                                </li>
                        </ul>
                    </div>
                </div>

                </div>

                    </div>

                </body>
                </html>
