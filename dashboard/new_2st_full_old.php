<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_wt/zero_style.css">
    <link rel="stylesheet" href="./css_wt/new_simple_style_2st.css">
    <title>Document</title>
</head>
<body>

<div class="block_session">
    <div class="block_session__name">
        <span id="ТорговаяСессияНазад"><img src="./img_wt/arrow_small.svg" alt=""></span>
        <p >Торговый период</p>
        <span id="ТорговыйПериод">-</span>
        <span id="ТорговаяСессияВперед"><img src="./img_wt/arrow_small.svg" alt=""></span>
    </div>
    <div class="block_session__check">
        <div class="block_session__check__elem">
            <div class="check__elem">
                <div class="check__elem__name">
                    <p>Первая заявочная</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <p>Принято</p>
                        <span id="КоличествоПринятоПерваяЗаявочная">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Снято</p>
                        <span id="КоличествоСнятоВПервуюЗаявочную">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Лист ожидания</p>
                        <span id="КоличествоВЛистеОжиданияПерваяЗаявочная">-</span>
                    </div>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <p>Вторая заявочная</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <p>Принято</p>
                        <span id="КоличествоПринятоВтораяЗаявочная">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Пройдена первичная проверка</p>
                        <span id="КоличествоПройденаПервичнаяПроверка">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Не пройдена первичная проверка</p>
                        <span id="КоличествоНеПройденаПервичнаяПроверка">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Пройдена вторичная проверка</p>
                        <span id="КоличествоПройденаВторичнаяПроверка">-</span>
                    </div>
                    <div class="check__elem__info__string">
                        <p>Не пройдена вторичная проверка</p>
                        <span id="КоличествоНеПройденаВторичнаяПроверка">-</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="block_session__check__elem">
            <div class="check__elem">
                <div class="check__elem__name">
                    <p>Обработка актов с нарушениями</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon6.svg" alt="">
                            <p id="ТекстЗаявкиКОтклонениюНажатие">Заявки к отклонению</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоЗаявокКОтклонению">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon6.svg" alt="">
                            <p id="ТекстЗаявкиКПриглашениюНажатие">Заявки к приглашению участвовать</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоЗаявокКПриглашениюУчаствовать">-</span>
                        </div>
                    </div>
                    <div class="check__elem__btn" id="ЗавершитьВводАктовНарушенийЗаПрошедшийПериод">
                        <p>Завершить ввод актов нарушений за проведенный период</p>
                    </div>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <p>Периодическая проверка</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon1.svg" alt="">
                            <p id="ТекстОтрицательныйОтветОтФНСПериодичНажатие">Отрицательный от ФНС</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоОтрицательныхОтФНСПериодич">-</span>/<span id="КоличествоОтрицательныхОтФНСВсегоПериодич">-</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <p>Первичная проверка</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon1.svg" alt="">
                            <p id="ТекстОтрицательныйОтветОтФНСНажатие">Отрицательный от ФНС</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоОтрицательныхОтФНС">-</span>/<span id="КоличествоОтрицательныхОтФНСВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon2.svg" alt="">
                            <p id="ТекстОтрицательныйОтветОтПФРНажатие">Отрицательный от ПФР</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоОтрицательныхОтПФР">-</span>/<span id="КоличествоОтрицательныхОтПФРВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon4.svg" alt="">
                            <p id="КомандаНарушениеСпециализацииНажатие">Нарушение специализации</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоНарушениеСпециализации">-</span>/<span id="КоличествоНарушениеСпециализацииВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon4.svg" alt="">
                            <p id="КомандаНекорректныйИНННажатие">Некорректный ИНН</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоНекорректныйИНН">-</span>/<span id="КоличествоНекорректныйИННВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon5.svg" alt="">
                            <p id="НадписьРоботизированнаяПодачаНажатие">Роботизированная подача</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="РоботизированнаяПодача">-</span>/<span id="РоботизированнаяПодачаВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon6.svg" alt="">
                            <p id="НадписьНекорректныеСведенияНажатие">Некорректные сведения</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="НекорректныеСведения">-</span>/<span id="НекорректныеСведенияВсего">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block_session__check__elem">
            <div class="check__elem" style="padding-bottom: 30px;">
                <div class="check__elem__name">
                    <p>Прием подтверждений</p>
                </div>
                <div class="check__elem__time" style="padding-top: 10px;">
                    <div class="elem__time__block" id="ГруппаВремяДоОкончанияПриема">
                        <span id="ОсталосьВремени">--:--:--</span>
                    </div>
                    <div class="elem__time__info">
                        <div class="check__elem__info__string">
                            <p>Запросы на смену площадки</p>
                            <p><span id="КоличествоЗапросовНаСменуПлощадки">-</span>/<span id="КоличествоЗапросовНаСменуПлощадкиВсего">-</span></p>
                        </div>
                        <div class="check__elem__info__string">
                            <p>Не прислали подтверждение</p>
                            <span id="КоличествоНеПрислалиПодтверждениеВсего">-</span>
                        </div>
                        <div class="check__elem__btn" id="НаправитьОповещенияОЗавершенииПриема">
                            <p>Направить оповещения о завершении приема</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="check__elem" id="ГруппаВторичнаяПроверка">
                <div class="check__elem__name">
                    <p>Вторичная проверка</p>
                </div>
                <div class="check__elem__info">
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon6.svg" alt="">
                            <p id="ТекстПовторнаяЗаявкаВторичнаяПроверкаНажатие">Повторная заявка</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоПовторнаяЗаявкаВторичнаяПроверка">-</span>/<span id="КоличествоПовторнаяЗаявкаВторичнаяПроверкаВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon9.svg" alt="">
                            <p id="ТекстПревышеноКоличествоПродавцовНажатие">Превышено количество продавцов</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоПревышеноПродавцов">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon8.svg" alt="">
                            <p id="ТекстЧерныйСписокНажатие">Черный список</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоЧерныйСписок">-</span>/<span id="КоличествоЧерныйСписокВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon3.svg" alt="">
                            <p id="ТекстНеоплаченныеШтрафы">Неоплаченные штрафы</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоНеоплаченныеШтрафы">-</span>/<span id="КоличествоНеоплаченныеШтрафыВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon3.svg" alt="">
                            <p id="ТекстНеуникальныйПродавец">Не уникальный продавец</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоНеУникальныйПродавец">-</span>/<span id="КоличествоНеУникальныйПродавецВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon4.svg" alt="">
                            <p id="ТекстНеопределенныеОригиналыДокументовНажатие">Непредставленные оригиналы документов</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоНеопределенныеОригиналыДокументов">-</span>/<span id="КоличествоНеопределенныеОригиналыДокументовВсего">-</span>
                        </div>
                    </div>
                    <div class="check__elem__info__string">
                        <div class="elem__info__name">
                            <img src="./img_wt/icon4.svg" alt="">
                            <p id="КомандаПодачиЗаявкиНаЗакрытуюЯрмаркуНажатие">Подача заявки на закрытую ярмарку</p>
                        </div>
                        <div class="elem__info__value">
                            <span id="КоличествоПодачиЗаявкиНаЗакрытуюЯрмарку">-</span>/<span id="КоличествоПодачиЗаявкиНаЗакрытуюЯрмаркуВсего">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block_session_bottom">
    <p>Результаты распределения заявок</p>
    <div class="block_session_bottom__btn" id="УстановкаКонечныхСтатусовЗаявок">
        <p>Установка конечных статусов заявок</p>
    </div>
    <div class="block_session_bottom__btn" id="ZavershEjednRaspr">
<!--        <p>-->
            Завершить еженедельное распределение
<!--        </p>-->
    </div>
</div>

<script src="./js_wt/app.js"></script>
<script>
    var obj = {};
    function updateHtml(data) {
        // console.log(data);
        if(data.indexOf('Unauthorized') == -1){
            var datax = JSON.parse(data);
            updateProperties(obj, datax);

            for (var elementName in datax.ЭлементыФормы) {
                var elementData = datax.ЭлементыФормы[elementName];
                var $element = $('#' + elementName);
                if ($element.length) {
                    setElementProperties(elementData, elementName);
                } else {
                    //console.log('#' + elementName + '- Не существует');
                }
            }

            for (var elementName in datax.Переменные) {
                var elementData = datax.Переменные[elementName];
                var $element = $('#' + elementName);

                if(typeof(elementData) == 'object')
                    elementData = 0;

                if ($element.length) {
                    $element.text(elementData);
                    //$element.css('background','red');
                    if($element.is(":visible")) {
                    } else {
                        //console.log('#' + elementName + '- НЕВИДИМКА!!!');
                    }
                } else {
                    //console.log('#' + elementName + '- Не существует');
                }
            }
        }else{
            alert('Не авторизированы.')
        }

    }

    //Выполнение функции в 1с
    function execFunc(funcName, json = false, param = false) {
        if(funcName == '')
            return;

        var params = "wp=YVDWeek&func=" + funcName;
        jsonParam = {
            "strParam1":obj.Переменные,
        };
        if (json) {
            if (param) {

                jsonParam = {
                    "strParam1":obj.Переменные,
                    "param2":param,
                };
                params = "wp=YVDWeek&func=" + funcName + "&json=true&param=" + JSON.stringify(obj.Переменные);
            } else {
                params = "wp=YVDWeek&func=" + funcName + "&json=true&param=" + JSON.stringify(jsonParam);
            }
        }

        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: params,
            success: function(data) {
                updateHtml(data);
                //console.log(funcName);
            },
            error:  function(){
                alert('Ошибка получения данных для функции ' + funcName);
            }
        });
    }
    function getServerUrl (){
        let domain = "";
        if(location.hostname == 'localhost'){
            domain = 'http://lst02.camco';
        }else{
            domain = location.origin;
        }
        let link_extractor = domain + "/api/extractor.php";
        return link_extractor;
    }
    function getStartDate(){
        let date = $('#ТорговыйПериод').text().split(' - ');
        let tokens = date[0].split('.');
        let result = tokens[2]  + tokens[1]  + tokens[0];
        return result;
    }
    async function getSessionNum(){
        let num = -1;
        let link = getServerUrl();
        await $.ajax({
            type: 'POST',
            url: link,
            data: JSON.stringify({actions: 'GetSessionNum', params: {data: getStartDate()}}),
            success: function(data) {
                num = data;
            },
            error:  function(){
                alert('Ошибка получения данных для функции.');
            }
        });
        return parseInt(num);
    }
    function utf8_to_b64( str ) {
        return window.btoa(unescape(encodeURIComponent( str )));
    }

    function getColorHex(string) {
        // Извлекаем подстроку в скобках
        var colorName = string.match(/\((.*?)\)/)[1];
        // Ищем цвет в глобальном объекте color
        var colorData = color[colorName];
        // Возвращаем hex-код цвета
        return colorData.hex;
    }

    function setElementProperties(properties, elementId) {
        // Находим элемент по id
        var element = $('#' + elementId);

        // Предустановка значений

        // Устанавливаем классы видимости и доступности
        if (properties.Видимость === true) {
            element.addClass('visibility');
            element.removeClass('no-visibility');
        } else if (properties.Видимость === false) {
            element.addClass('no-visibility');
            element.removeClass('visibility');
        }
        if (properties.Доступность === true) {
            element.prop( "disabled", false );
            element.addClass('availability');
            element.removeClass('no-availability');
        } else if (properties.Доступность === false) {
            element.prop( "disabled", true );
            element.addClass('no-availability');
            element.removeClass('availability');
        }

        // Устанавливаем цвет фона
        if (properties.ЦветФона) {
            element.css('background-color', getColorHex(properties.ЦветФона));
        }

        // Устанавливаем классы только для просмотра и гиперссылки
        if (properties.ТолькоПросмотр === true) {
            element.addClass('onlyView');
            element.removeClass('no-onlyView');
        } else if (properties.ТолькоПросмотр === false) {
            element.addClass('no-onlyView');
            element.removeClass('onlyView');
        }
        if (properties.Гиперссылка === true) {
            element.addClass('link');
            element.removeClass('no-link');
        } else if (properties.Гиперссылка === false) {
            element.addClass('no-link');
            element.removeClass('link');
        }
    }

    function updateProperties(globalObject, newObject) {
        for (const key in newObject) {

            if (newObject.hasOwnProperty(key)) {
                if (typeof newObject[key] === 'object') {
                    if (!globalObject[key]) {
                        globalObject[key] = {};
                    }
                    updateProperties(globalObject[key], newObject[key]);
                } else if ((newObject[key] !== null && newObject[key] !== '') || (key === 'ТорговыйПериод' || key === 'ОсталосьВремени')) {
                    globalObject[key] = newObject[key];
                }
            }
        }
    }

    $(document).ready(function() {
        //Установка данных ПриОткрытии
        execFunc('ПриОткрытии');

        //Торговая сессия назад нажатие
        $(document).on('click', '#ТорговаяСессияНазад', function(){
            if($(this).is('.no-availability')) {
                //console.log('Кнопка заблокирована');
                return;
            }
            execFunc('ТорговаяСессияНазадНажатие', true);
        });
        $(document).on('click', '.elem__info__name p', async function(){
            let id = $(this).attr('id');
            let link = getServerUrl();
            let num_ses = await getSessionNum();
            // let num_ses = 29;
            let send_data = {actions: 'GetDataFrom2st', params: {act: id, numsess: parseInt(num_ses),data: getStartDate()}};
            // console.log(send_data);
            if(id && id.indexOf('Нажатие')){
                $.ajax({
                    type: 'POST',
                    url: link,
                    data: JSON.stringify(send_data),
                    success: function(data) {
                        console.log(data);
                        if(data){
                            let doc = location.origin + "/dashboard/document/40011?uid=" +data;
                            window.open(doc, '_blank')
                        }
                    },
                    error:  function(){
                        alert('Ошибка получения данных для функции.');
                    }
                });
            }else{
                console.log("Пустышка.")
            }
        });
        //Торговая сессия вперед нажатие
        $(document).on('click', '#ТорговаяСессияВперед', function(){
            if($(this).is('.no-availability')) {
                //console.log('Кнопка заблокирована');
                return;
            }
            execFunc('ТорговаяСессияВпередНажатие', true);
        });
        //ЗавершитьВводАктовНарушенийЗаПрошедшийПериод
        $(document).on('click', '#ЗавершитьВводАктовНарушенийЗаПрошедшийПериод', function(){
            if($(this).is('.no-availability')) {
                //console.log('Кнопка заблокирована');
                return;
            }
            execFunc('ЗавершитьВводАктовНарушенийЗаПрошедшийПериод', true);
        });
        //НаправитьОповещенияОЗавершенииПриема
        $(document).on('click', '#НаправитьОповещенияОЗавершенииПриема', function(){
            if($(this).is('.no-availability')) {
                //console.log('Кнопка заблокирована');
                return;
            }
            execFunc('НаправитьОповещенияОЗавершенииПриема', true);
        });
        //ЗавершитьЕженедельноеРаспределение
        /*
        Процедура ЗавершитьЕженедельноеРаспределение(Команда) // web
            СтандартнаяОбработка = Ложь;
            МассивРезультата = ЗавершитьЗаявочнуюКампаниюНаСервере(НомерСессии,ДатаС);
            Если ЗначениеЗаполнено(МассивРезультата) Тогда
                ТекДанныеФормы = Новый Структура;
                ТекДанныеФормы.Вставить("Ссылка",МассивРезультата);
                ПараметрыФормы = Новый Структура;
                ПараметрыФормы.Вставить("Отбор",ТекДанныеФормы);
                ОткрытьФорму("Документ.хс_РаспределениеЗаявокЯрмаркиВыходногоДня.Форма.ФормаСписка", ПараметрыФормы,,"ФормаЯрмаркиВыходногоДняПерваяЗаявочнаяКампанияЗавершитьЗаявочнуюКампанию");
            КонецЕсли;
        КонецПроцедуры
        */
        //Перехват кликов в блоках Первичная и Вторичная проверка
        $(document).on('click', '.elem__info__value span', async function(){
            let id = $(this).attr('id');
            let num_ses = await getSessionNum();
            console.log(id);
            // a_7200=0&a_6862148=0
            let link = location.origin + "/dashboard/table/911?a_7209="+num_ses;
            // let link =  "localhost:8080/dashboard/table/911?a_7200=0&a_6862148=0&a_7209=29";
            let bool = false;
            if(id == 'КоличествоОтрицательныхОтФНСВсегоПериодич'){
                bool = true;
                link += "&a_7200=0&a_7208_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'КоличествоОтрицательныхОтФНСВсего'){
                bool = true;
                link += "&a_7200=1&a_7208_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'КоличествоОтрицательныхОтПФРВсего'){
                bool = true;
                link += "&a_7200=1&a_7208_Ssylka=e9887106-fb1c-4330-90b4-3a00431acf7b&a_7201_Ssylka=e9887106-fb1c-4330-90b4-3a00431acf7b&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'КоличествоНекорректныйИННВсего'){
                bool = true;
                link += "&a_7200=1&a_7208_Ssylka=a6ed7198-5aea-46f7-a554-3ead7bfa10b8&a_7201_Ssylka=a6ed7198-5aea-46f7-a554-3ead7bfa10b8&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'НекорректныеСведенияВсего'){
                bool = true;
                link += "&a_7200=1&a_7208_Ssylka=5511375f-bdcc-43da-a2f5-1514df3553bd"
            }
            if(id == 'РоботизированнаяПодачаВсего'){
                bool = true;
                link += "&a_7200=1&a_7201_Ssylka=faec9290-0faa-48cf-a461-60fdcbfcbba"
            }


            // if(id == 'КоличествоЗаявокСНеоплаченнымиШтрафамиВсего'){
            //     bool = true;
            //     link += "&a_7208_Ssylka=d1b165f9-3130-4fa6-b26a-cc69317a2acf"
            // }
            // if(id == 'НекорректныеСведенияВсего'){
            //     bool = true;
            //     link += "&a_7208_Ssylka=5511375f-bdcc-43da-a2f5-1514df3553bd"
            // }
            // if(id == 'НарушениеСпециализацииВсего'){
            //     bool = true;
            //     link += "&a_7208_Ssylka=4e5a99ad-723c-4c8e-8386-f91f8f159496&a_7201_Ssylka=4e5a99ad-723c-4c8e-8386-f91f8f159496&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            // }


            if(bool){
                window.open(link, "_blank");
            }

        })
        $(document).on('click', '#ZavershEjednRaspr', async function(){
            let link = getServerUrl();
            let date = getStartDate();
            let num_ses = await getSessionNum();
            $(this).addClass('btn-block');
            if(date){
                let send_data = {actions: "GetWt_1st_json", params: {
                        date: date,
                        numsess: parseInt(num_ses),
                        f_or_s: 1
                    }};
                await $.ajax({
                    type: 'POST',
                    url: link,
                    data: JSON.stringify(send_data),
                    success: function(data) {
                        if(data){
                            let doc = location.origin + "/dashboard/document/40011?uid=" +data;
                            window.open(doc, '_blank')
                        }

                    },
                    error:  function(){
                        alert('Ошибка получения данных для функции.');
                    }
                });

            }
            $(this).removeClass('btn-block');

        })
        // $(document).on('click', '#ЗавершитьЕженедельноеРаспределение', function(){
        //     if($(this).is('.no-availability')) {
        //         //console.log('Кнопка заблокирована');
        //         return;
        //     }
        //     execFunc('ЗавершитьЗаявочнуюКампаниюНаСервере', true);
        // });
        //УстановкаКонечныхСтатусовЗаявок
        $(document).on('click', '#УстановкаКонечныхСтатусовЗаявок', function(){
            if($(this).is('.no-availability')) {
                //console.log('Кнопка заблокирована');
                return;
            }
            if(obj.Переменные.НомерСессии > 0) {
            } else {
                alert('Выберите другой период, по которому заполнен номер сессии!');
            }
            //execFunc('УстановкаКонечныхСтатусовЗаявок', true);
        });
    });
</script>
</body>
</html>

