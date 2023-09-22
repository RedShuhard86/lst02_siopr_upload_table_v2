<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_wt/zero_style.css">
    <link rel="stylesheet" href="./css_wt/new_simple_style_1st.css">
    <title>Document</title>
</head>
<body>

<div class="block_session">
    <div class="block_session__name">
        <span id="ТорговаяСессияНазад"><img src="./img_wt/arrow_small.svg" alt=""></span>
        <p>Торговая сессия</p>
        <span id="ТорговаяСессияСтрокой">-</span>
        <span id="ТорговаяСессияВперед"><img src="./img_wt/arrow_small.svg" alt=""></span>
    </div>
<!--    <div class="block_session__buttons">-->
<!--        <div class="block_session__buttons__btn" id="ГруппаНомерЭтапаСтатус1">-->
<!--            <p>1 Этап</p>-->
<!--        </div>-->
<!--        <div class="block_session__buttons__btn" id="ГруппаНомерЭтапаСтатус2">-->
<!--            <p>2 Этап</p>-->
<!--        </div>-->
<!--        <div class="block_session__buttons__btn" id="ГруппаНомерЭтапаСтатус3">-->
<!--            <p>3 Этап</p>-->
<!--        </div>-->
<!--        <div class="block_session__buttons__btn" id="ГруппаНомерЭтапаСтатус4">-->
<!--            <p>4 Этап</p>-->
<!--        </div>-->
<!--        <div class="block_session__buttons__btn" id="ГруппаНомерЭтапаСтатус5">-->
<!--            <p>5 Этап</p>-->
<!--        </div>-->
<!--    </div>-->
    <div class="block_session__statistic">
        <div class="block_session__statistic__element" id="ГруппаКоличество1">
            <span id="КоличествоПринятыхЗаявок">-</span>
            <p>Принято заявок</p>
        </div>
        <div class="block_session__statistic__element" id="ГруппаКоличество2">
            <span id="КоличествоПройденаПервичнаяПроверка">-</span>
            <p>Пройдена первичная проверка</p>
        </div>
        <div class="block_session__statistic__element" id="ГруппаКоличество3">
            <span id="КоличествоПройденаВторичнаяПроверка">-</span>
            <p>Пройдена вторичная проверка</p>
        </div>
        <div class="block_session__statistic__element" id="ГруппаКоличество4">
            <span id="КоличествоОбработаноЗаявок">-</span>
            <p>Обработано заявок</p>
        </div>
        <div class="block_session__statistic__element" id="ГруппаКоличество5">
            <p>Распределение<br>не завершено</p>
        </div>
    </div>
    <div class="block_session__check">
        <div class="block_session__check__elem">
            <article>Первичная проверка</article>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon1.svg" alt="">
                    <span id="НадписьОтрицательныеОтФНСНажатие">Отрицательный от ФНС</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоОтрицательныхОтФНС">-</span>/<span id="КоличествоОтФНСВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon2.svg" alt="">
                    <span id="НадписьОтрицательныеОтПФРНажатие">Отрицательный от ПФР</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоОтрицательныхОтПФР">-</span>/<span id="КоличествоОтПФРВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon3.svg" alt="">
                    <span id="НадписьПодачиЗаявкиНаЗакрытуюЯрмарку">Неоплаченный штраф по несанкционированный торговле</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоЗаявокСНеоплаченнымиШтрафами">-</span>/<span id="КоличествоЗаявокСНеоплаченнымиШтрафамиВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon3.svg" alt="">
                    <span id="НадписьЗадолженностьНалогиСборыНажатие">Задолженность по налогам, сборам, пеням</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоЗаявокЗадолженностьНалогиСборы">-</span>/<span id="КоличествоЗаявокЗадолженностьНалогиСборыВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon4.svg" alt="">
                    <span id="НадписьНарушениеСпециализацииНажатие">Нарушение специализации</span>
                </div>
                <div class="check__elem__value">
                    <span id="НарушениеСпециализации">-</span>/<span id="НарушениеСпециализацииВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon4.svg" alt="">
                    <span id="НадписьНекорректныйИНННажатие">Некорректный ИНН</span>
                </div>
                <div class="check__elem__value">
                    <span id="НекорректныйИНН">-</span>/<span id="НекорректныйИННВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon5.svg" alt="">
                    <span id="НадписьРоботизированнаяПодачаНажатие">Роботизированная подача</span>
                </div>
                <div class="check__elem__value">
                    <span id="РоботизированнаяПодача">-</span>/<span id="РоботизированнаяПодачаВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon6.svg" alt="">
                    <span id="НадписьНекорректныеСведенияНажатие">Некорректные сведения</span>
                </div>
                <div class="check__elem__value">
                    <span id="НекорректныеСведения">-</span>/<span id="НекорректныеСведенияВсего">-</span>
                </div>
            </div>
            <div class="check__elem__last">
                <p>Всего не прошло</p>
                <p><span id="ВсегоНеПрошлоПроверкуПервичнаяКомпания">-</span>/<span id="ВсегоНеПрошлоПроверкуПервичнаяКомпанияВсего">-</span></p>
            </div>
        </div>
        <div class="block_session__check__elem">
            <article>Вторичная проверка</article>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon6.svg" alt="">
                    <span id="НадписьПовторныеЗаявкиНажатие">Повторная заявка</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоПовторныхЗаявок2">-</span>/<span id="КоличествоПовторныхЗаявокВсего2">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon7.svg" alt="">
                    <span id="НадписьПревышеноКоличествоПродавцовНажатие">Превышено количество продавцов</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоПревышеноКоличествоПродавцов">-</span>/<span id="КоличествоПревышеноКоличествоПродавцовВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon8.svg" alt="">
                    <span id="НадписьЧерныйСписокНажатие">Черный список</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоЧерныйСписок">-</span>/<span id="КоличествоЧерныйСписокВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon4.svg" alt="">
                    <span id="НадписьНепредоставленныеОригиналыДокументовНажатие">Непредставленные оригиналы документов</span>
                </div>
                <div class="check__elem__value">
                    <span id="НепредоставленныеОригиналыДокументов">-</span>/<span id="НепредоставленныеОригиналыДокументовВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon3.svg" alt="">
                    <span>Не уникальный</span>
                </div>
                <div class="check__elem__value">
                    <span id="КоличествоЗаявокСНеуникальнымиПродавцами">-</span>/<span id="КоличествоЗаявокСНеуникальнымиПродавцамиВсего">-</span>
                </div>
            </div>
            <div class="check__elem">
                <div class="check__elem__name">
                    <img src="./img_wt/icon4.svg" alt="">
                    <span id="НадписьПодачиЗаявкиНаЗакрытуюЯрмаркуНажатие">Подача заявок на закрытую ярморку</span>
                </div>
                <div class="check__elem__value">
                    <span id="ПодачаЗаявокНаЗакрытуюЯрмарку">-</span>/<span id="ПодачаЗаявокНаЗакрытуюЯрмаркуВсего">-</span>
                </div>
            </div>
            <div class="check__elem__last">
                <p>Всего не прошло</p>
                <p><span id="ВсегоНеПрошлоПроверкуВторичнаяКомпания">-</span>/<span id="ВсегоНеПрошлоПроверкуВторичнаяКомпанияВсего">-</span></p>
            </div>
<!--            <div class="check__elem__btn">-->
<!--                <p>Выполнить распределение мест</p>-->
<!--            </div>-->
        </div>
        <div class="block_session__check__elem">
            <article>Результаты распределения</article>
            <p>Итоговый реестр на первый торговый период</p>
            <div class="check__elem__date" id="ИтоговыйРеестрНаПервыйТорговыйПериод">
                <span>дд.мм</span> - <span>дд.мм</span>
            </div>
            <p>Предварительный реестр на торговую сессию</p>
            <div class="check__elem__date" id="ПредварительныйРеестрНаТорговуюСессию">
                <span>дд.мм</span> - <span>дд.мм</span>
            </div>
            <div class="check__elem__btn" id="ЗавершитьЗаявочнуюКомпанию">
                <p >Завершить заявочную кампанию</p>
            </div>
        </div>
    </div>
</div>
<div class="block_session_bottom">
    <div class="block_session_bottom__elem">
        <p>Итоги<br>распределения</p>
    </div>
    <div class="block_session_bottom__elem color_green">
        <p>Удовлетворено</p>
        <span id="Прошло">-</span>
    </div>
    <div class="block_session_bottom__elem color_red">
        <p>Отклонено в результате проверки</p>
        <span id="ОтклоненоВРезультатеПроверок">-</span>
    </div>
    <div class="block_session_bottom__elem color_red">
        <p>Отклонено в результате распределения</p>
        <span id="ОтклоненоВРезультатеРаспределения">-</span>
    </div>
    <div class="block_session_bottom__elem color_red">
        <p>Отклонено всего</p>
        <span id="Отклонено">-</span>
    </div>
    <div class="block_session_bottom__elem color_blue">
        <p>В листе ожидания</p>
        <span id="ВОчереди">-</span>
    </div>
</div>



<script src="./js_wt/app.js"></script>
<script>
    var obj = {};

    function updateHtml(data) {
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
                if ($element.length) {
                    $element.text(elementData);
                    //$element.css('background','red');
                    if($element.is(":visible")) {
                    } else {
                        //	console.log('#' + elementName + '- НЕВИДИМКА!!!');
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

        var params = "wp=YVDFirst&func=" + funcName;
        jsonParam = {
            "strParam1":obj.Переменные,
        };
        if (json) {
            if (param) {

                jsonParam = {
                    "strParam1":obj.Переменные,
                    "param2":param,
                };
                params = "wp=YVDFirst&func=" + funcName + "&json=true&param=" + JSON.stringify(obj.Переменные);
            } else {
                params = "wp=YVDFirst&func=" + funcName + "&json=true&param=" + JSON.stringify(jsonParam);
            }
        }

        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: params,
            success: function(data) {
                updateHtml(data);
                console.log(funcName);
            },
            error:  function(){
                alert('Ошибка получения данных для функции ' + funcName);
            }
        });
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
                } else if (newObject[key] !== null && newObject[key] !== '') {
                    globalObject[key] = newObject[key];
                }
            }
        }
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
        let date = $('#ТорговаяСессияСтрокой').text().split(' - ');
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
    $(document).ready(function() {
        //Установка данных ПриОткрытии
        execFunc('ПриОткрытии');
        //Торговая сессия назад нажатие
        $(document).on('click', '#ТорговаяСессияНазад', function(){
            if($(this).is('.no-availability')) {
                console.log('Кнопка заблокирована');
                return;
            }
            execFunc('ТорговаяСессияНазадНажатие', true);
        });
        $(document).on('click', '#ЗавершитьЗаявочнуюКомпанию', async function (){
            let link = getServerUrl();
            let date = getStartDate();
            let num_ses = await getSessionNum();
            $(this).addClass('btn-block');
            if(date){
				jsonParam = {
					"strParam1":obj.Переменные,
				};
				params = "wp=YVDFirst&func=ЗавершитьЗаявочнуюКампаниюНаСервере&json=true&param=" + JSON.stringify(jsonParam);

				$.ajax({
					type: 'POST',
					url: 'selector_1s.php', // Обработчик собственно
					data: params,
					success: function(data) {
						data.forEach((dataItem) => {
							let doc = location.origin + "/dashboard/document/40011?uid=" + dataItem;
							window.open(doc, '_blank');
						});
					},
					error:  function(){
						alert('Ошибка получения данных для функции ЗавершитьЗаявочнуюКампаниюНаСервере');
					}
				});			
            }
            $(this).removeClass('btn-block');

        })
        //Торговая сессия вперед нажатие
        $(document).on('click', '#ТорговаяСессияВперед', function(){
            if($(this).is('.no-availability')) {
                console.log('Кнопка заблокирована');
                return;
            }
            execFunc('ТорговаяСессияВпередНажатие', true);
        });
        //Перехват кликов в блоках Первичная и Вторичная проверка
        $(document).on('click', '.check__elem__value span', async function(){
            let id = $(this).attr('id');
            let num_ses = await getSessionNum();
            console.log(id);
            let link = location.origin + "/dashboard/table/911?a_7200=0&a_6862148=0&a_7209="+num_ses;
            // let link =  "localhost:8080/dashboard/table/911?a_7200=0&a_6862148=0&a_7209=29";
            let bool = false;
            if(id == 'КоличествоОтФНСВсего'){
                bool = true;
                link += "&a_7208_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=3a1e64fe-2eb1-4719-b1db-20542cfbb356&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'КоличествоОтПФРВсего'){
                bool = true;
                link += "&a_7208_Ssylka=e9887106-fb1c-4330-90b4-3a00431acf7b&a_7201_Ssylka=e9887106-fb1c-4330-90b4-3a00431acf7b&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'КоличествоЗаявокСНеоплаченнымиШтрафамиВсего'){
                bool = true;
                link += "&a_7208_Ssylka=d1b165f9-3130-4fa6-b26a-cc69317a2acf"
            }
            if(id == 'НекорректныйИННВсего'){
                bool = true;
                link += "&a_7208_Ssylka=a6ed7198-5aea-46f7-a554-3ead7bfa10b8&a_7201_Ssylka=a6ed7198-5aea-46f7-a554-3ead7bfa10b8&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(id == 'НекорректныеСведенияВсего'){
                bool = true;
                link += "&a_7208_Ssylka=5511375f-bdcc-43da-a2f5-1514df3553bd"
            }
            if(id == 'РоботизированнаяПодачаВсего'){
                bool = true;
                link += "a_7201_Ssylka=faec9290-0faa-48cf-a461-60fdcbfcbba"
            }
            if(id == 'НарушениеСпециализацииВсего'){
                bool = true;
                link += "&a_7208_Ssylka=4e5a99ad-723c-4c8e-8386-f91f8f159496&a_7201_Ssylka=4e5a99ad-723c-4c8e-8386-f91f8f159496&a_7201_Ssylka=00000000-0000-0000-0000-000000000000"
            }
            if(bool){
                window.open(link, "_blank");
            }

        })
        $(document).on('click', '.check__elem__name span', async function(){
            let id = $(this).attr('id');
            let link = getServerUrl();
            let num_ses = await getSessionNum();
            let send_data = {actions: 'GetDataFrom1st', params: {act: id, numsess:parseInt(num_ses)}};
            // console.log(send_data);
            if(id && id.indexOf('Нажатие')){
                $.ajax({
                    type: 'POST',
                    url: link,
                    data: JSON.stringify(send_data),
                    success: function(data) {
                        if(data){
                            let doc = location.origin + "/dashboard/document/40011?uid=" +data;
                            window.open(doc, '_blank')
                        }
                        // console.log(data);
                        // let r = JSON.parse(JSON.parse(data));
                        // if(r.Result){
                        //     let array = r.Result.split('.');
                        //     if(array.length > 2 && array[2]){
                        //
                        //     }
                        // }
                    },
                    error:  function(){
                        alert('Ошибка получения данных для функции.');
                    }
                });
            }else{
                console.log("Пустышка.")
            }
        });
    });
</script>
</body>
</html>
