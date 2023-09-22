<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="./css_wt/style_wt_1s.css">
    <script src="./js_wt/script_wt_1s.js"></script>
    <script language="JavaScript">

function parseDataFromString(data) {
    if (typeof data === 'string' || data instanceof String)
        data = jQuery.parseJSON(data);

    return data;
}

function initChart  (pobj) {
  obj =	parseDataFromString(pobj); 
  document.getElementsByClassName("category")[0].style.display = "block";
  Highcharts.chart("container", obj);
      
};

function buttonFireEvent(propertyName, data) {
    if (document.createEventObject) {
        //для нормальных браузеров
        var evt = document.createEventObject();
        evt.propertyName = propertyName;
        evt.data = data;
        evt.cancelBubble = true;
        evt.returnValue = false;
        document.fireEvent('onclick',evt);
    } else {
        //конечно же для IE
        var evt = document.createEvent("MouseEvent");
        evt.initMouseEvent ("click", false, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        evt.propertyName = propertyName;
        evt.data = data;
        document.body.dispatchEvent(evt);
    }
}

function getCategory  (val1, val2, indexBlock, text) {
  var val3 = val1 - val2;

    document.getElementsByClassName('cat' + indexBlock + '__title')[0].innerHTML = text;

  if (val3 >= 0) {
    document.getElementsByClassName('cat' + indexBlock)[0].children[2].classList = "less";
  }
  if (val3 < 0) {
    val3 = Math.abs(val3);
    document.getElementsByClassName('cat' + indexBlock)[0].children[2].classList = "more";
  }
  document.getElementsByClassName('cat' + indexBlock)[0].children[0].innerHTML = val1;
  document.getElementsByClassName(
    'cat' + indexBlock
  )[0].children[1].innerHTML = '/' + val2;
  document.getElementsByClassName('cat' + indexBlock)[0].children[2].innerHTML = val3;
};
function setDataForStat(v1,v2,v3,v4){
    $('.v1_info b').html("&emsp;"+v1);
    $('.v2_info b').html("&emsp;"+v2);
    $('.v3_info b').html("&emsp;"+v3);
    $('.v4_info b').html("&emsp;"+v4);
}

function getInfoBlock(data) {
	obj =	parseDataFromString(data); 

    var infCount = 0;

    $('#title1').html(obj['block0'].title)

    for(var i = 0; i < obj['block0'].hrefs.length; i++) {
        $('.info-data-0').append('<p class="category__info__block__href" id="' + obj['block0'].hrefs[i].id  + '" onclick="infoSelect( &quot;' + obj['block0'].hrefs[i].title +   ' &quot; , &quot;' +obj['block0'].hrefs[i].id +'&quot;)"  > ' + obj['block0'].hrefs[i].title + ' </p>');
        infCount++
    }
    
    $('#title2').html(obj['block1'].title)

    for(var i = 0; i < obj['block1'].hrefs.length; i++) {
        $('.info-data-1').append('<p class="category__info__block__href" id="' + obj['block1'].hrefs[i].id  +'" onclick="infoSelect( &quot;' + obj['block1'].hrefs[i].title +   ' &quot; , &quot;' +obj['block1'].hrefs[i].id +'&quot;)"> ' + obj['block1'].hrefs[i].title + ' </p>');
        infCount++
    }

    $('#title3').html(obj['block2'].title)

    for(var i = 0; i < obj['block2'].hrefs.length; i++) {
        $('.info-data-2').append('<p class="category__info__block__href" id="' + obj['block2'].hrefs[i].id + '" onclick="infoSelect( &quot;' + obj['block2'].hrefs[i].title +   ' &quot; , &quot;' +obj['block2'].hrefs[i].id +'&quot;)"> ' + obj['block2'].hrefs[i].title + ' </p>');
        infCount++
    }

    $('#title4').html(obj['block3'].title)

    for(var i = 0; i < obj['block3'].hrefs.length; i++) {
        $('.info-data-3').append('<p class="category__info__block__href" id="' + obj['block3'].hrefs[i].id + '" onclick="infoSelect( &quot;' + obj['block3'].hrefs[i].title +   ' &quot; , &quot;' +obj['block3'].hrefs[i].id +'&quot;)"> ' + obj['block3'].hrefs[i].title + ' </p>');
        infCount++
    }

}

function infoSelect (name, id) {
	url = false;
	if(name == 'Субъекты категорирования ' && id == 'ОбщаяФорма.кс_СубъектыКатегорирования')
		url = 'table/1337';
	else if(name == 'Списки для контроля ' && id == 'Обработка.юк_Категорирование.Форма')
		url = 'table/30002';
		
	else if(name == 'Проект Перечня ' && id == 'Документ.юк_ПроектПеречняСубъектовКатегорирования.Форма.ФормаСписка')
		url = 'table/30006';
		
	else if(name == 'Решения РГ Префектур ' && id == 'Документ.кс_РешенияРГ.Форма.ФормаСписка')
		url = 'table/988';
	else if(name == 'Распоряжения Префектур ' && id == 'Документ.кс_РаспоряжениеНаППРФ.Форма.ФормаСписка')
		url = 'table/10017';
		
	else if(name == 'Результаты категорирования и паспортизации торговых объектов ' && id == 'Отчет.кс_РезультатыКатегорированияИПаспортизацииТорговыхОбъектовПоППРФ1273.Форма')
		url = 'report/1264?variant=Основной';
	else if(name == 'Категорирование предприятий розничной торговли ' && id == 'Отчет.кс_КатегорированиеПредприятийРозница.Форма')
		url = false;
	else if(name == 'Категорирование предприятий розничной торговли по № 1273-ПП РФ ' && id == 'Отчет.кс_КатегорированиеПредприятийРозничнойТорговлиПо1273ППРФ.Форма')
		url = false;
	else if(name == 'Отчет по измененным субъектам категорирования за период ' && id == 'Отчет.аз_ОтчетПоИзмененнымСубъектамУчетаЗаПериод.Форма')
		url = 'report/1293';
	else if(name == 'Согласование паспортов безопасности торговых объектов ' && id == 'Отчет.кс_ИнформацияОСогласованииПаспортовБезопасностиТорговыхОбъектов.Форма')
		url = 'report/1263';
		
	if(url)
		//location.href=url;
	window.open(url, '_blank').focus();
}


    </script>
	
</head>
<body>


<style> 
@media \0screen\,screen\9 {
.filter {
display: table;
    text-align: center;
}
} 
</style>
    
	<div class="category">

        <div><h2> Категорирование </h2></div>

        <div class="filter" style="background-color: #ffffff; display: flex; justify-content: center; padding-top: 20px; padding-bottom: 20px; width: 100%;">
            <span onclick="selectFilter(1)" class="filter__element filter-selected" id="button__filter__1">
                <span>Все показатели</span>
            </span>
            <span onclick="selectFilter(2)" class="filter__element" id="button__filter__2">
                <span>Предложено к включению в Перечень / Категорировано

                </span>
            </span>
            <span onclick="selectFilter(3)" class="filter__element" id="button__filter__3" style="width: 423px">
                <span>Присвоено категорий / Разработано паспортов безопасности	</span>
            </span>
        </div>

        <div style="display: flex; height: 455px; width: 100%; background-color: #ffffff; position: relative;">
            <div style="display: flex; flex-direction: column; width: 60px">
                <div onclick="selectItem('all')" class="category-titles" id="cat__elem__1"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAUCAYAAABroNZJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKMSURBVHgBpZNLT1NRFIW/e29flNIHBaStsQUb0RC0ECEmiNaBUWTgQJ040KHM/AHGgYmJMVEH/gBkooYYGBDnYBDEYCQBIqI8WqUFLW2xpfTdemFALCk1ykpOTnLO3uusvfc6wnR7W559Qix1mZXp14WSIcVJlrIZErk8qXyeUZ2efuexfyexiBIfLAYWUaBUajjZ4sKj1jJjNOO32IqSKHYfaASB7+U1vNAFWfMHOTj4ms7LV+i6cB6fz0fi4X00sVhpJcuSmo9BEa0mQ5O9ApvVitmgJ5vN4hsbJdTcyl/LGTI6WNUY+SEeIRX7xuLCAuFwiAq9njqZ0Pp2uDTJVjMdqTC3oh4ssVXSkh3XUeX23aZcgr61jc8Ie5PMpdL8On0Gx43rRMtFTIKcZDCirnAipP1EolHevxtnQFDyUm50OJsrrmQoEkP59DHn7tzlUW8vFzsvgaRnYyNBmSqHqdKEo6UFt1ZD5JB9J29nOrnKSmIrfuKyR07Y7Tzr6SEQCJBKJhmZ+sLcm5scjqjp1CiZTaYpFwXsalUhST4YpD4fYt1mo7+vj4mBfkRJQUcixlmFRLVCx7izFl0gjEulZjKd3Xp6O1f48++82kwiVlfjjkUZlD1/3GhgOCOX0diEb/4rzT9XSNQ7ubrsYc/pdNTWYMhkeKIzMhXZ4Hkqx9iSF6/XS6PTiTadYXV6mt0oULIlcN5kZsK/glmS6A2EqFPKFatUhGUn5zbjPKgxUSUV2qvA9pK8GsJBGspUfJJHfu1AFWWJOF06LSPxJGtSGRnypZX8L0RBUqyzD0g6HYp0KtesEvPuYgE5Qbgtby5RrfGQiN8rFiNYrB5KYba72zHT3jo06T7lKBX3G21+70g+XJEkAAAAAElFTkSuQmCC"  style="width: 17px; height: 20px; margin-right: 5px;"> Все</div>
                <div onclick="selectItem('ЦАО')" class="category-titles" id="cat__elem__10"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAATBSURBVHgBrZZZbFRVGMd/d5t96XRxujFDFxZbgYIaFMT4IiohkSghxBCFB32WRJ/0gbi8iiFGiWJwAcODRk1MCCRCAAUDtmKRQqGW1nba6WydTmemM3dm7vXMNCHRMNBGv/ty7/lu7vc7/285V6KKmcLutJ6bm2U2+j5zg6fIZSZA13AuDWINbqOm7kVU1XrH70nC7rjOAgHKj+nUSeLhN5Hl5Tjsz2MqbjDEa3qCZPYQVoudWv9buDxr/3+A9EySa1+/Ixzga+hBle042tvITccxEil0I81MpJeS3cf6Xfv4d7xqACoLNLOYxzzzLYoMydJ3gsOkZEjiWRAZIGsSUpnZXgsCYKG2YICyJbMKN8IiQFm4kondUiBXUIVakkgHFZCe+0voeo7ZVJj6hrZ7fvOuAGOjFwiNfUFb+2Zslo3M1TZw/XLtbX+pVqLO6yN5K3F77eFnAqJGIDR+gv7fhnj0sTewO3yLB8jnc5w99QrLOuOM3czSUHcBz5Yn4VQvsqJjXdVEst7HrOKlucXP+PUhiOm4tj7C4JUjaNJHZGbDxGIvCDXOVwWQqzn+HLqE1d5Jf79BMn2BkdAxIenW+Z2XNE6P5KgLBNmxrYeIO4N7TatIjLikWYrGGF53lGzGJlT8nsmxwywaoL/vA1wuN/5GlXQ6RSyhoChKxVcO1NZQT6BGI1XQUEoS8R8HK77M7CRe12FicYmO5XuFOhvZ8MTn1cJUT8Gz2w8xNXmO2ZkuIpMH6Oj0kgpH5hUQNbhuQzvxaBSXw44xncOGpdyhWGwBpqc9NPkzyPanSMS+ZPyvKItW4Ozp17FYPfh8Co1NQUz1QzL5zyq+glri6sBF+novcfKH4wS6l2EoZnl4kEiIYPIaNK2Int1HobSCpuanWTRAMPic2P0ECkdJpVxkU0cozO2s+Gy6wsDlfmyShWDKQ/TXYVSrVp42NDZvwl9/g3BsveDRWN3zEi53HYsGWNm9WUjqYC4bpViyY9FGcbrmW7A805rUGjLXxsgkwsi6iZEtVnx+/zKK0su4vTvEe27uZVVrIJ1Okp05SCK/G9tcM9GhY1hrjqJ5JQKr43QFcjywcQrVEiI0epPclErkcpA/vtlLnbwBuvzktQD+1rRIpWvxADabC1NqojnwOB7vKq4cPE6ud4BXv3oPQ50RishiFIcxDDftKzxCJdGu3TFiB/aT2eWge+0e0YLDhMN9LAlsqgpQ9TCamrxlxhNZrDYrqqISCoVEXSwlr+eJRiI0NNxXaU+73SlS4yQej4mCrRUgJWKRKXFfJ2pnBofTSmtrE05n7SIPo8k4E8c+xeyUxVBpITp4g/u2v4bN6xVHsQPNoongDlRNpVgoVCANwyA7Mkzk/MeYHQ8RDf2O9ZpBy7v7q4apCuBb2YUjlaX4yU8kGk3qlptk9e041Qep8fmQJVnsfD63uq5X1gyjRFo/h338F6ZPXMSeEWfFzj046+urhbn7/4CeThP9+QxzuQgTJ98Wve7G5u9AEcNGVj0UCuI4dshINh1zaIacaxhpbAQzKxPcvR9FKNOyect8oP/6QzIzOkpmfIDkYB+56FXmxsbJpCOohobNU49WClKzaR2uJV14u3tw1P5z19UA/gZSXvUsU8OntgAAAABJRU5ErkJggg=="  style="width: 17px; height: 20px; margin-right: 5px;"> ЦАО</div>
				<div onclick="selectItem('САО')" class="category-titles" id="cat__elem__2"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAASoSURBVHgBnZZLbFRlFMd/986jdzqvTmeGTjszhRYIYtraYJGCPBag0QgJhpi48pHgxsiChUsSXbI1GpWNiYkJBjWKAU0hkAAxtkBN5NFCi6SdttOZ6TzaGeZxp/dev7nVhQ0d236zmJvvcc7/O+f/P+eTWGEYhjEg/jYtn3/yJMfE0Cmyk/fIxLJodpkmX4DQM31s7v8Im832NHM/SZL04dMWJFYG8Hg5gMTMXUaH3qeSVHA3d2F3u5Akg4XZHKo+jMMfpGfvJ3h97cvNfS0AvP00P1ZWOTRNIxEbILTxNVr2HaXJv+0/6+mZ30lMX2J2ckAAOL5as6sHkL7yDa6RuyI0EmnjNGkRPEd7O3q1QmU6ATIoFgNJf0zetg33s/tWZbcugHx+gcnJGNFoFL0yzcjMNPmy3Qy7JEs4Z6ZY1KxUZDGHhm4Y+K0lmgrzJBIJMpkMnZ2dNDQ0rA/A0OAgLaFWcrkcdmH89NwehitRrLLGom7BLVeEWytF8S2ji5/MG8of9Amr6XQaVVW5c+cOfX19K/qQ6wGoVqu4XC4KhQJqcAcWZ0jc1OD11qumw/f2Rnlpmxe7pHIscsU8o7R2UXKE0BYXlxhu6PVc1Aewq383mq6Z0ir7OtEcHuFeoqoW+KD9M0Yffo+U/YGTHZ8SzzvNMwWliQXZLaTZZKaku+e5ei7qp8BqteJ2upiYmEBxOLBaLOb8z6kj7HDdpr/1oVCHwfmZVxktbzfXGhsb0XWdVDJFOBKpyZl1AYjH4xSLRTOXzc3NIpI6rU0K0fmKWLUxy4v8mNyztLlBIvIPzwJuOx6P2zy7sDBvEjEQCLBmAMO3btEc8Js3qLE4Im6zPRTDpSxlTdINZPGpLatlW0Ju2trClEplMgJ8IjFLMjnLmgH09vaKgyki7VHhSBbSk7j2KM9vjzKmy6hLo9c7x820X0izSAGPec6pOMy9iqLQuWWzSeKWUIg1AwgL7auCyXOplCCibirBMCkIbQ6NLleR7rCPqp5jo5DqmdtFdNkm8m8wPj5uqqAWgbZwG36/f+0AauP+/XuMjz2kxqNIOCIkY8dmLLJFybG9o4UjB3ai37hPLj3JBjVB0t5pdpcb16+Z3BGB4NChlwUHgusDEBI3jzUoNDqdOIaGWMhGUCUPsUUfvbNnOPfdV2QLGhvc86jOt9A1G5mbQ3hbishbt6IW8vgkqZ6L+gAyA5ewdGxCqgFQK7wy9gt9b57EarNT5mNGptIEW2zYvR6Otcqo8xm6Lp7F6utFKpdQYzHiN64T7elZHwA9GMR7+TKlo0fpPnWK4udfcPCd/TiE1mujWKpgt1lFvViqD1NjY8TD79L8wk5uXbhAaPQB1l39rDsC+0+cYDCTJnXxIlfPn0cXhckQ5KpJs8b0RseS+GulxhDt2imAjZz5Evu3Z7GI9HUcOED34cP1XPz/gyT51yOGjx8nIwwmPFl00XIdojpaXG42COk9sVRxlqskVLGmFmnM2mhUnTjFnoPnzqEsRWvFB8mqXkSFuCgkDXYeXP2V7J+DJOdE/89nmSql8Eo2go4gZa+LYKCD9ud3E921B0n0D4fX+6+5FQH8DaiH4KJ8MgRrAAAAAElFTkSuQmCC"  style="width: 17px; height: 20px; margin-right: 5px;">САО</div>
                <div onclick="selectItem('СВАО')" class="category-titles" id="cat__elem__3"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAWUSURBVHgBnVZ7UFRVGP/O3Xv37i7ssjyEdZF2WVZAJUJLjB5aYIaMjDaWQ/ZHTI4WlDOS6WSNtk4TTdiMllQTPZ3RdCjLx2QOSWyaqwYjIoEsyEMWZZF9sO+9u/fe0wVyUmJg6Zu5M2fO/d3f9zu/853vXAQzjKYmXUyKQlzi78T5iAMdzwOIE6GPDWCjOzH4XXZ2v3MmfKIZYFF7q74sWSWuQByxzW/hT1MKkRE43Oy3YV6RLqpUJNDzXypVpiQkOi4YjYAjISUhwjhbqUrAv/KrXAnhRCoK3WSusFzYy3kQwSEWQcBHUQMoiNWcnXuySJ522ADdlkh4IxaQ7ELSwQFx0UCrAggpAA7BdiyscXTMBwTAaeEh0BwV4YNkrVsx4XMkPPh/CbjWkr4DU6KrcGCktcGr5T+49ShxLwL/wz8eW2JN/IvarrHxD4e1S1QxpD7cDwWN3exb2/f0WSfyE1Ml76jPyFYlkYbZ8XCcK4pe6aJo80QMPaGKHCKxmQ4yzs/2arXzNPTuGI6odkfxRydLPq0AROLnGQaLBYtPD4LvVFpBWDM6HxdNAkUikEtEoFWNux0n48bcMMvkbe0LZRm/mfosV49498SwhFjtHt2oyWNKARI33E+KhQoLwxK9VFFt6yG9CpkYvtz6NGxenQMyCQXxyqgxbGm+HkSIh4u9mgsKhuMN5Rkl2WuicqPVSBYaGquSmQloMGi1fBBWSITtlUogIRTC8oOXU/eDUHmzYuVwY8gFHMcBy/JjeLFELqx/vBZkLOTxPrw7ea6oUiSsXXAreUYCNm0CKnOlZE/SEyTl6cVA8MgTpxEly2ScOEujhKqDDZCoICHzvlhIih134Oj5HuAxAY8vGHio+xJTz2G+3NMNFo5DoCsWV51/X7c2YgHbKtI3i1n0bFjoaZyP93md3OphP/tOlmY4t/OWR9hvCuyeMPRavYI7NCTG0JCuloNKSQPBhuVrP7I05hRfr3PEhh9xDLLtTAArVGry09paXUxEAmiWIEglQIDFIE0j6KAPifUZnUd+MulP2NxBqGuxQu3ZXliQmghpyXHg8DAwYPeDdYSB382pDXd4HA7WJtOLHP02dgdQ0LRuXY8rIgEI82TYjRhLLVPhvch3xMqJMoPhX+ygiwWEMGxYmQVFi1NASpPQ0ncv99mG9JKEOMlrzV3MhoeLr1cFZbhtslzk5ALI5S4H/8liQ8++DxfOr8upjL3S4iwRegDfD5jrEVoPPVspnIaTTUqXl0GJ0cjp9o8eQ+AJnlstX7a1+OW99sZBN1SOGL8d+eNwirrjZlTfpLkmTkTlla1/Jtv9dkXptbjCNx/72E/Gb1TKRLJocHeIJIr+/a/k7biDPW40q257fPKNxYu67sxtqbmwk/F75rk5mc7DYJZkPV/kpTvKTd3qIRx0VXtM1d9MKUC+dNsBTEkKFHRY7Q5JUc59UfznrxchihIBIhBg4f5FaHw3MBaOoDAmhHl+9F6+qyuHwyxUVNeDqVOoZBxGAm4Qc8E6n7Gq9O58/7mOQ5KEekqedDkUCH+FAXcINbecwIxRLUejPaDQbrfvGnE6DwnvVtluD7/h8fnqCYSeGh6+vcvvD3zPseyKm4O3th4z9eEWS2Cuc8S+SxDwLubYk1KrvcZvbw5N6cDEyH7OUJim033NhUPWggUxD7RdOj+npmaftf5MXWdbe8eD586dC75aXma/9Gej2mw2g35hfnunA93whyC1q7unrPnIzhNT8U/7QzLUbrxup2Yf0iXPUQ94IMNDq8riM/NzBdPnmbpDFpdMMz+aptf83OrLmjV38d4Oa1DKs8yplr9a17f9+F7zdPzTOnBPLHlBMUupKVy2KHMpgflc24g3QxFNcwQSdaYkKZvbe4dMzWd+OWYzn/BESvk3wc98mb0VjmoAAAAASUVORK5CYII="  style="width: 17px; height: 20px; margin-right: 5px;">СВАО</div>
                <div onclick="selectItem('ВАО')" class="category-titles" id="cat__elem__4"><img src="data:image/png;base64,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"  style="width: 17px; height: 20px; margin-right: 5px;">ВАО</div>

				  <div onclick="selectItem('ЮВАО')" class="category-titles" id="cat__elem__10"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAVlSURBVHgBrVZ7bBRFGP9mdvdu9959XQseLaWltOVRQRAa1Ao1liBFElP8A6LFYKygEqLGoP8UgwmJER8gWoihaP8wipEqhPgACvVJbJDKoxTaUsrRu+Pa3m1v7/Y1M24xJiYW6Bl/ye7szsz3+3755ptvBsF/wI9vuvxamD2p6/wKQ+MmSW4jiARyFPuTLUs2w5V0uBCkif2vSPmVZeqJWMiOe3rZBtVBg27Tljt1mrHX6TH5/hv0gWVb4PJE+TCkgb76u6cuxN6dsfO5EbfuFCrM4qz7Q/lDFalCv5Rwg3whrysQy9vVs6Js+kQ5eUgDiKDqkXO+R6hBYETiABlkn8/rVuNDqsiG/YiZbEoKYSaKeJk1/dLfdu07hE1Sl7F7/h4w0hLQ2Ag4csrp909VEo27IcEJHHCLr0GgQOVMa9xpvc9fd0rlk5NIIxgMhiFySWJwrhAYA/TMfOD3dIDhEowz5kyYYZmcTUcAKlLtO6fNgYb5xdxpfW1GreYbSPTGmNpiFjk1wkFNdgS+HfWjxaEodI26YdCwQx3u0cXcaPjwNu79R1chdV4V2i8Ixo74KGwcz8ntBLBADvVmulTMcax3bVV0ls0OUn5MuEh4eZ4BHJR7ZAhSN5S5FfDbTbisu8CPTRWygjY/waJLpE/l+qA+qSOuLyIEAPR/ObltEhqa8ZlsRTfTRetGNeHwpet8N6XAKnwyVPhikGXXYZZnFAocCsy2+uZZT1xBPTyPtog2ttqi0O02wAPD+NMpWaR6whF47QnprvtKzS19N1BTaYAcMAla45aokuMhG05e9QZSzA2EIsizi9Cd8kJYRDBi2CBBBZBkrKdSiXVl+UbH8CgkrY0eMg12Oq7T1gkLKMol2zGGWn8GTCrLJ9WaAacpI6u7eiHypaf4equZD6IVCt6kkMA8iCoFzQqmlXew0Xm2tCpz+L14Au/Ly2RrELD2P7ptR0HWRsbzNe4SOCUI2gT6/YIifVpc4bwIUDnPgCxvBP34gGtobI4IJjxoRqGWhKAKRaHEkK1eBs3hyVciEaj3uikiFIi1BOuzs8xZ65pBnbCApK5/KArUZ5jwjs9J9JTOWjgellz4COYmbOJNASv5QVDtGI5hPyiUh4ccN27aqphXJvlhlfVZGRpGWwmDZEITZLgFxhXQL8LVn89YSYTgiq7Bu9PrYX1xPzSf7LQvWmyPOsbmtNNsOE5zQEEYwqYAB/QAIMbYw3gwB3NgG03i1oWb6I6hEVhTnKc13EoAN15nWxuwTXUuF8/pZZoJXH0NhGkA9s0uIKtr3JFOpmiDxyK+3ShhtFk+A3GFvZWSzW8+zvq14vHMgXYM6Dmng7ZlVkB7od3G221kzgeH4OvxfN3yMPriVSsBC9HBWJIryXBRZ298Bj7RO7eVEMNKB5usUoc8FsCUqmRIkjRiLT84uFieotnUyV65oLb0h0q3PRYMRrnsi9e4I0+/rT2WloAxdO6BKpHntg+pOfce6V6EZBpAVkICsraIrmlW+5c5tv6t0mu1N0eBUY0VePrYsqITVh0wDp0Ns2dXvgTRtAWMYXMdSA3L0e8c5guPDtTisFmORcmJhoeGweN2U80wLgsCX6IoCfD5MkCLh9k9uT/RmVkdXH8INVW9TBpux3/H47jSqmaYoV9UnfAzk9+l5pCvmMBkZpqGVYxoU+PW10sZhU+oVRNcpJcuSB2EEl+HrqSQmptNTt2Jf6IXEvTbLmFuJITjXl5o0jTX0iDJY9iDPy/N7mw+PzD7BS2q10zhw+D0J99QXMm9Y0Y1L8LA/yXgn8AHn3cudUmonulcZULmJ7lcpMfm0A+YPGmp3qb1pEP2J7Qfa/mo6FDSAAAAAElFTkSuQmCC"  style="width: 17px; height: 20px; margin-right: 5px;">ЮВАО</div>
				 <div onclick="selectItem('ЮАО')" class="category-titles" id="cat__elem__11"><img src="data:image/png;base64,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"  style="width: 17px; height: 20px; margin-right: 5px;">ЮАО</div>               
			   <div onclick="selectItem('ЮЗАО')" class="category-titles" id="cat__elem__5"><img src="data:image/png;base64,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"  style="width: 17px; height: 20px; margin-right: 5px;">ЮЗАО</div>
                <div onclick="selectItem('ЗАО')" class="category-titles" id="cat__elem__6"><img src="data:image/png;base64,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"  style="width: 17px; height: 20px; margin-right: 5px;">ЗАО</div>
                <div onclick="selectItem('СЗАО')" class="category-titles" id="cat__elem__7"><img src="data:image/png;base64,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"  style="width: 17px; height: 20px; margin-right: 5px;">СЗАО</div>
                <div onclick="selectItem('ЗелАО')" class="category-titles" id="cat__elem__8"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAZ1SURBVHgBnVRtcFTlFX7e+7F3P7KbZLObJTGBfBFCkprEJKQdDWJtUTGDVKAi1CqdqtPWYYZBtNp2zFCr0ynj+KfOaEGodiZKrTZA0SHGUByaGvnYpFkJKSSYr93sZnfzcXf37t773tcbGGZgQUDPr/ee855znuc5574E38L++2fcJQ9mrovLfB0n6KJgYd7sspn2D9/DR61HoH2TWty1nMf/hu/8ew8WXyt29BVszraSjxRBtemZiafjAt1CBC2U6yDtLevxdGvr1TW7d2Gp96+ouykA7/8JuZKAHRKEX6XHzvyo8g5b0LV9zuf5rER0uBoT1da6RBkKWbY77HOdIKOuR9eerliTnsd44QmTFS+0vwpPekxId3iyuLUpjXtgMiJ8CkPNnj1oBCfc/cwebadOhO3U66mADsQIkDAl7+XNnJ4acQiEI1DsNlgk9vy+fWgvlIVfCxzpaHxM7QmExSaDaZMrUz8M6K9dF4BO9JnJsEnTwTW//Xtpu2jSfhwIkU9/uQL5M17GZoZkAoFd1C5FeOPEzx+TTifO3teCGl8no4PIHwJx1pVrO9v+YPpE5PFdf1iMFeelArjRCDLNGOOIHoonQBrKtRfGgqztrF/YYMnG4nHMnmCEQG0JgW70A+RigYTVBv+mh7DH2Qtvhr/TZkHNTEzYMBEmHbVl+rbZGCF2qxaNJ+mNAcRl+K1iau/CBSrtH5YkxsQlJpHZwlHzW67loVKDMeh5M+j/rSDGh2aSENy4Ae86z+A0G0VRzaQ7NGN502wiGeFpacFQQLQWuFVV4NV3iI7oDQF8EcG0ZOYgy/TlnMxkp2Ri61c1aRnNNUm156hjr0EaFq8D0rEsUEFEYPVq/HPBKLqob341cDiSdWhFTVJurknZLSa6MUNSO5QUfd5uRsw7hnB6Pz7d0d6J+ObVLOhxMqUgl4ScOe77VS6ne3gs+tTCW+ha7WRG0zzz+VFE16zF+0tiOEhOgdOYwYbDU/y4nAgmfpNXWFKe7xaKdF3+i92qD45N47NNz2Iovd9VSzhvHicespg4TdPIk+Phab9V0j44cNQ2GP08652f8NjCeB7h5hU4XE6xnzsBsww4QyL8xRTP9i/c+6IlNWJ3jO83lqSkwC0+I5mSBgg0GaV703uRy8+vbhMb8t3q4MdDiDfEKh9JRXJ2GbIyBoYDk+Hba2ZjsysF3je3chWOLnPiTdqFOEmhcs6D26Wl2M0dgXWQLWs8lDSvL8o+YqTpRjKfckw/+sFEb1tDIaSKAkvtz19O/Mfox67YgdaH7TmNS9jq71VxPT+rRb18LDSRTFKSUjTOJNjIskT8S0WwapE770ZHjRW7tU8uNJ+v8nD2ncZPXoVSMQ9E11hhcGRUkTVOoaKQZCLhP/cH/viIWLtlHXeqvCR5z3Ob4bpqBK1tc1OtbfjdwD5M3FpN3vXlKjtOqEZ5qoKoUVIwHrC9NJs8p/6i5R/7WPeSlK7Oa1NAeMK9kjgwpilU1xU6bB4eG/CwePFQSkMqHgETRVRLMU9FsbZ3Isx2LH8cb1xinz6CS8ZFOkjnuf5FWQd7m2sJ08Ebt0pCkzsdVtOYRo31I+zCCzCYnSpOqVSqnJUGoOsQRP5CUI4pi87l5m2lVGecsS+r6rt9xRVDYecP2V2XN79CgctMH57gdpdWTLx1y7/6mHQ+SHTPAgTMtm1KlpOQpAI1Jhvyc6jzFEERKM6HRxEbHYGntBzUbEZUmWWe/lMwTUdIcqEDReu/rPJHuJ8acrLrLeEV/vGD/Id8DCv3v50P8X8ypKpaZnHlckRTwRlsNSM1p3QxEywW+AdOEzoThWTLgGAAmAkGWLK/F+y2TLRsGgW1sMP5LfS+dPbzxn8NABRY2KHbGpm75g69Or85xqtz44ictRHljI8Jdkcqb826ZNEDD/LmsnLKm83J6b6Tquw9LsZ5AQVLT+rLnoih4QeaHqfae8Ep7bHX26FckymuY11dTBDCT9ZXZu76uzxFCrxdteAzm5T6rb+VXG63Md6L+I0HA5HwFD3+0nOqGu+T6r/fZ6jF/AOxx+9vfvD1vmsxvykAl+zYG8I95YvYi3K3WC8rLtirq4gpNw+q4oHFyZgWjhAlPI7ESB9zl0xCd1PfbIzfWr5O+/hGtW8KwKW7Ha+hyTFgWW6IWc1l4FYKlNnzdJqYwpApk3xhcml95xXSde8Wtedmi34FToHmLEIp7NUAAAAASUVORK5CYII="  style="width: 17px; height: 20px; margin-right: 5px;">ЗелАО</div>
                <div onclick="selectItem('ТинАО')" class="category-titles" id="cat__elem__9"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAUCAYAAABroNZJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKMSURBVHgBpZNLT1NRFIW/e29flNIHBaStsQUb0RC0ECEmiNaBUWTgQJ040KHM/AHGgYmJMVEH/gBkooYYGBDnYBDEYCQBIqI8WqUFLW2xpfTdemFALCk1ykpOTnLO3uusvfc6wnR7W559Qix1mZXp14WSIcVJlrIZErk8qXyeUZ2efuexfyexiBIfLAYWUaBUajjZ4sKj1jJjNOO32IqSKHYfaASB7+U1vNAFWfMHOTj4ms7LV+i6cB6fz0fi4X00sVhpJcuSmo9BEa0mQ5O9ApvVitmgJ5vN4hsbJdTcyl/LGTI6WNUY+SEeIRX7xuLCAuFwiAq9njqZ0Pp2uDTJVjMdqTC3oh4ssVXSkh3XUeX23aZcgr61jc8Ie5PMpdL8On0Gx43rRMtFTIKcZDCirnAipP1EolHevxtnQFDyUm50OJsrrmQoEkP59DHn7tzlUW8vFzsvgaRnYyNBmSqHqdKEo6UFt1ZD5JB9J29nOrnKSmIrfuKyR07Y7Tzr6SEQCJBKJhmZ+sLcm5scjqjp1CiZTaYpFwXsalUhST4YpD4fYt1mo7+vj4mBfkRJQUcixlmFRLVCx7izFl0gjEulZjKd3Xp6O1f48++82kwiVlfjjkUZlD1/3GhgOCOX0diEb/4rzT9XSNQ7ubrsYc/pdNTWYMhkeKIzMhXZ4Hkqx9iSF6/XS6PTiTadYXV6mt0oULIlcN5kZsK/glmS6A2EqFPKFatUhGUn5zbjPKgxUSUV2qvA9pK8GsJBGspUfJJHfu1AFWWJOF06LSPxJGtSGRnypZX8L0RBUqyzD0g6HYp0KtesEvPuYgE5Qbgtby5RrfGQiN8rFiNYrB5KYba72zHT3jo06T7lKBX3G21+70g+XJEkAAAAAElFTkSuQmCC"  style="width: 17px; height: 20px; margin-right: 5px;">ТинАО</div>
				 
		   </div>
            <div style="height: 455px;  position: absolute; left: 60px; top: 0px" id="container" class="category__graph">
                
             <figure class="highcharts-figure">
            </div>
        </div>
        <div class="category__stats" style="position: relative; left: -2px">
		<table>
  <tr style="width: 100%">
    <td><div class="category__status__block">
                <div class="category__status__block__count">
                    <span onclick="countSelectClick('category1')" id="cat1" class="cat1" style="display: flex; font-size: 20px; margin-left: 24px;">
                        <span class="prev"> </span>
                        <span class="current"></span>
                        <span class="more"></span>
                    </span>
                </div>
                <div class="category__status__block__title cat1__title">
                </div>
            </div></td>
	<td><div class="category__status__block">
                <div class="category__status__block__count">
                    <span onclick="countSelectClick('category2')" id="cat2" class="cat2" style="display: flex; font-size: 20px; margin-left: 24px;">
                        <span class="prev"></span>
                        <span class="current"></span>
                        <span class="less"></span>
                    </span>
                </div>
                <div class="category__status__block__title cat2__title">
                </div>
            </div></td>
	<td><div class="category__status__block"><div class="category__status__block__count">
                <span onclick="countSelectClick('category3')" id="cat3" class="cat3" style="display: flex; font-size: 20px; margin-left: 24px;">
                    <span class="prev"></span>
                    <span class="current"></span>
                    <span class="more"></span>
                </span>
            </div>
            <div class="category__status__block__title cat3__title">
            </div></div></td>
	<td>
        <div style="margin-right: 0px"  class="category__status__block">
            <div style="width:50%;float:left;">
                <div class="category__status__block__count">
                    <span onclick="countSelectClick('category4')" id="cat4" class="cat4" style="display: flex; font-size: 20px; margin-left: 24px;">
                        <span class="prev"> </span>
                        <span class="current"> </span>
                        <span class="more"></span>
                    </span>
                </div>
                <div class="category__status__block__title cat4__title">
                </div>
            </div>
            <div style="width:50%;float:left;">
                <table style="font-size: 14px; margin-top:20px;">
                    <tr><td>Загружено</td><td class="v1_info"><b></b></td></tr>
                    <tr><td>Проверено</td><td class="v2_info"><b></b></td></tr>
                    <tr><td>Требует исправлений</td><td class="v3_info"><b></b></td></tr>
                    <tr><td>Подтверждено</td><td class="v4_info"><b></b></td></tr>
                </table>
            </div>
        </div>
    </td>
  </tr>
</table>
            
            
            
            
        </div>
		
		<div> 
			<table style="background: white; width: 100%">
  <tr >
    <td style="vertical-align: top;"><div class="category__info__block">
                <span class="info-data-0" style="display: block; margin-left: 24px;">
                    <p class="category__info__block__title" id="title1" onclick="infoSelect('title1')">Субъекты категорирования</p>
                </span>
            </div></td>
	<td style="vertical-align: top;">
            <div class="category__info__block"><span class="info-data-1" style="display: block; margin-left: 24px;">
                <p class="category__info__block__title" id="title2" onclick="infoSelect('title2')">Проект Перечня</p>
            </span></div></td>
	<td style="vertical-align: top;"><div class="category__info__block"><span class="info-data-2" style="display: block; margin-left: 24px;">
                <p class="category__info__block__title" id="title3" onclick="infoSelect('title3')">Решения РГ Префектур</p>
            </span></div></td>
	<td style="vertical-align: top;">
            <div style="margin-right: 0px" class="category__info__block"><span class="info-data-3" style="display: block; margin-left: 24px;">
                <p class="category__info__block__title" id="title4" onclick="infoSelect('title4')">Отчеты</p>
            </span></div></td>
  </tr>
</table>
		</div>
	
        <div class="category__info">
            
            
        </div>
    </div> 


<script>
var isIE = /*@cc_on!@*/false || !!document.documentMode;
if (!isIE) {
        //для нормальных браузеров
		
$('.category__graph').css('width', document.body.offsetWidth - 100);
$('.category__status__block').css('width', (document.body.offsetWidth - 58) / 4);
$('.category__info__block').css('width', (document.body.offsetWidth - 132) / 4);
$('.category__info__block').css('background', 'white');
$('.category__info__block').css('margin-right', 15);

    } else {
        //конечно же для IE
$('.category__graph').css('width', document.body.offsetWidth - 100);
$('.category__status__block').css('width', (document.body.offsetWidth - 98) / 4);
$('.category__info__block').css('width', (document.body.offsetWidth - 125) / 4);
$('.category__info__block').css('background', 'white');
$('.category__info__block').css('margin-right', 15);
    }

$(window).resize(function(){
   var isIE = /*@cc_on!@*/false || !!document.documentMode;
if (!isIE) {
        //для нормальных браузеров
		
$('.category__graph').css('width', document.body.offsetWidth - 100);
$('.category__status__block').css('width', (document.body.offsetWidth - 58) / 4);
$('.category__info__block').css('width', (document.body.offsetWidth - 132) / 4);
$('.category__info__block').css('background', 'white');
$('.category__info__block').css('margin-right', 15);

    } else {
        //конечно же для IE
$('.category__graph').css('width', document.body.offsetWidth - 100);
$('.category__status__block').css('width', (document.body.offsetWidth - 98) / 4);
$('.category__info__block').css('width', (document.body.offsetWidth - 125) / 4);
$('.category__info__block').css('background', 'white');
$('.category__info__block').css('margin-right', 15);
    }
});


$(window).on(function(){ 
	console.log(12)
} )

</script>
    <style>
        * {
            font-family: "robotoregular", "Arial";
        }
		.highcharts-tooltip span {
    height:auto;
    width:350px;
    overflow:auto;
    white-space:normal !important; // add this line...
}
        .main-title { 
            font-weight: 500;
font-size: 20px;
line-height: 23px;

/* Text/Main text color */
color: #333333;
display: block;
margin-bottom: 20px;
        }

        .filter { 
            background-color: #ffffff; display: flex; justify-content: center; padding-top: 20px; padding-bottom: 0px !important; width: 100%;
        }
        .category-side-panel {
            display: flex; height: 455px; width: 100%; background-color: #ffffff;
        }
        .category-side-panel div { 
            display: flex; flex-direction: column;
        }
        .filter__element {
             cursor: pointer;
            display: flex;
flex-direction: row;
align-items: flex-start;
padding: 3px 12px;
align-items: center;
justify-content: center;
margin-right: 10px;
position: static;
width: 374px;
height: 24px;
/* Text/White text color */
background: #FFFFFF;
/* Secondary color/Line */
border: 1px solid #DFE4EE;
box-sizing: border-box;
border-radius: 8px;
        }



        .filter__element span { 
            font-style: normal;
font-weight: normal;
font-size: 13px;
line-height: 18px;
color: #767784;

        }

        .filter-selected span { 
            font-style: normal;
font-weight: normal;
font-size: 13px;
line-height: 18px;
/* identical to box height, or 138% */

/* Text/White text color */
color: #FFFFFF;

        }
            .filter-selected {
                display: flex;
flex-direction: row;
align-items: flex-start;
padding: 3px 12px;
align-items: center;
justify-content: center;

position: static;
width: 374px;
height: 24px;
background: #1978e2;
border-radius: 8px;
            }
        body { 
            background-color: #E5E5E5;
        }

.category__info__block__title {
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 22px;
}

.category__info__block__href { 
font-style: normal;
font-weight: normal;
font-size: 13px;
cursor: pointer;
line-height: 18px;
/* identical to box height, or 138% */
text-decoration-line: underline;

/* Main colors/Active */
color: #1A78E2;
}

        .category__info__block { 

width: 448px;

background: #FFFFFF;
border-radius: 8px;
 margin-right: 15px;
        }

        .category__info { 

            display: flex;
                margin-top: 15px;
        }
        .less {
            color: #F5666F;
            margin-left: 12px;
        }

        .less::after {
    content: ''; 
    position: absolute; /* Абсолютное позиционирование */border: 8px solid transparent; border-top: 8px solid #F5666F;
    margin-left: 12px;
    margin-top: 7px;
   }

        .more {
            color: #52C773;
            margin-left: 12px;
        }

        .more::after {
    content: ''; 
    position: absolute; /* Абсолютное позиционирование */
    border: 8px solid transparent; border-bottom: 8px solid #52C773;
    margin-left: 12px;
   }

        .prev {
            color: #E5E5E5;

        }

        .category__status__block__title { 
            margin-left: 24px;
            font-size: 13px;
        }

            .category__stats { 
                display: flex;
                margin-top: 15px;
            }

        .category__status__block { 
            height: 105px;
            width: 448px;
            border-radius: 5px;
            background-color: #ffffff;
            margin-right: 15px;
            border-top-left-radius: 31px;

        }

        .category-titles:hover {
            background-color: rgba(237, 244, 252, 1);
        }
        
        .category__status__block__count {
            display: flex;
			padding-top: 37px;
            cursor: pointer;
        }

.category {
  flex-direction: column;
}

.category__graph {
    display: flex;
    background-color: white;
}
.category-titles {
    font-size: 12px;
    color: #767784;
    display: flex;
	margin-top: 17px;
    font-weight: 400;
    align-items: center;
    cursor: pointer;
}
    </style>
<script>
function getData() { 
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=Kategorirovanie&func=getData",
        success: function(data) {
			initChart(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции getData');
        }
    });
}
function getData2(param1,param2) {
	var param = utf8_to_b64('param1='+param1+'&param2='+param2);
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=Kategorirovanie&func=getData&param="+param,
        success: function(data) {
			initChart(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции getData2');
        }
    });
}
function changesSinceLastLogin(param1 = false) {
	if(param1) {
		var param = utf8_to_b64('param1='+param1);
		var dataParam = "wp=Kategorirovanie&func=ИзменённыхОбъектов&param="+param;
	} else {
		var dataParam = "wp=Kategorirovanie&func=ИзменённыхОбъектов";
	}
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: dataParam,
        success: function(data) {
			var datax = JSON.parse(data);
			for(var i = 0; i < datax.length; i++) {
				getCategory(datax[i].КоличествоНачало, datax[i].КоличествоКонец, i+1, datax[i].Категория);
			}
			var len = (datax.length-1)
			setDataForStat(datax[len].Загружено,datax[len].Проверено,datax[len].ТребуетИсправления,datax[len].Подтверждено,)
        },
        error:  function(){
            alert('Ошибка получения данных для функции changesSinceLastLogin');
        }
    });
}
function fillLinkBlock() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=Kategorirovanie&func=ЗаполнитьБлокСсылок",
        success: function(data) {
			getInfoBlock(data)
        },
        error:  function(){
            alert('Ошибка получения данных для функции changesSinceLastLogin');
        }
    });
}
var curItem = 'all';
function selectItem  (item) {
	getData2(item, 1);
	changesSinceLastLogin(item);
	curItem = item;
  
};

function selectFilter(index) {
	getData2(curItem, index);
	$('.category__info__block').css('background', 'white');
	$('.filter-selected').removeClass('filter-selected');
	$('.filter__element:nth-child(' + index + ')').addClass('filter-selected');
}

function countSelectClick(name) {
	/*
	getData2(name, 1);
	$('.category__info__block').css('background', 'white');
	$('.filter-selected').removeClass('filter-selected');
	$('.filter__element:nth-child(1)').addClass('filter-selected');
	*/
	var dateStart = '01011970';
	let url = 'report/1293?Период='+dateStart+'-'+curDate;
	window.open(url, '_blank').focus();
}

function utf8_to_b64( str ) {
    return window.btoa(unescape(encodeURIComponent( str )));
}

var dateStart = '01011970';
var curDate = new Date();
var dd = String(curDate.getDate()).padStart(2, '0');
var mm = String(curDate.getMonth() + 1).padStart(2, '0');
var yyyy = curDate.getFullYear();
curDate = dd + '' + mm + '' + yyyy;
$.ajax({
	type: 'POST',
	url: 'selector_1s.php', // Обработчик собственно
	data: "wp=Kategorirovanie&func=ВернутьДатуОтсутсвия",
	success: function(data) {
		dateStart = data.substr(0,10).replace(/\./g, '');
	},
	error:  function(){
		alert('Ошибка получения данных для функции ВернутьДатуОтсутсвия');
	}
});
 
fillLinkBlock();
changesSinceLastLogin();
getData();
</script>
</body>
</html>