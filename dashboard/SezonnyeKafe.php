<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
    <title>Сезонные кафе</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>
    <script>
        function drawPieChart(container, pieData) {
            var calcPieTotal = function () {
                var total = 0;
                for (var i = 0; i < pieData.data.length; ++i) {
                    if (pieData._legendState[i]) {
                        total += pieData.data[i].y;
                    }
                }
                pieData.title = Highcharts.numberFormat(customRound(total, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ');
            }
            var legendSettings = {
                align: 'right',
                layout: 'vertical',
                verticalAlign: 'middle',
                floating: false
            };
            if (pieData.legendType === 'top') {
                legendSettings.align = 'center',
                    legendSettings.layout = 'horizontal',
                    legendSettings.verticalAlign = 'top',
                    legendSettings.floating = true,
                    pieData._legendWidth = undefined
            } else {
                if (pieData.isMaximized) {
                    pieData._legendWidth = pieData.legendWidthInPercentagesWhenMaximized ? pieData.legendWidthInPercentagesWhenMaximized : 32;
                } else {
                    pieData._legendWidth = pieData.legendWidthInPercentages ? pieData.legendWidthInPercentages : 32;
                }
            }
            if (!pieData.itemMargin && pieData.autoItemMargin) {
                var linesCounter = 0;
                for (var i = 0; i < pieData.data.length; ++i) {
                    linesCounter += labelLinesCounter(pieData.data[i].name, container, pieData._legendWidth / 100);
                }
                pieData.itemMargin = container.offsetHeight - linesCounter * 20;
                if (pieData.itemMargin > 0) {
                    pieData.itemMargin /= pieData.data.length + 1;
                    if (pieData.itemMargin > 40) {
                        pieData.itemMargin = 40;
                    }
                } else {
                    pieData.itemMargin = 0;
                }
            }
            if (!pieData.numbersAfterComma && pieData.numbersAfterComma !== 0) {
                pieData.numbersAfterComma = 1;
            }
            if (!pieData._legendState) {
                pieData._legendState = [];
                for (var i = 0; i < pieData.data.length; ++i) {
                    pieData._legendState.push(true);
                }
            }
            if (pieData.total) {
                calcPieTotal(pieData);
            }
            var chart = Highcharts.chart(container, {
                chart: {
                    marginTop: 0,
                    marginBottom: 0,
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    events: {
                        redraw: function () {
                            drawTotalOnCenter(pieData, chart, pieData.id);
                        }
                    }
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.' + pieData.numbersAfterComma + 'f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            color: '#010101',
                            enabled: true,
                            connectorWidth: pieData.hideDataLine ? 0 : 1,
                            connectorPadding: pieData.hideDataLine ? -10 : 10,
                            formatter: function () {
                                if (pieData.dataLabelFormat) {
                                    switch (pieData.dataLabelFormat) {
                                        case 'onlyPercentages':
                                            return Highcharts.numberFormat(customRound(this.percentage, pieData.numbersAfterComma), pieData.numbersAfterComma,
                                                '.', ' ') + ' %';
                                        case 'onlyValues':
                                            return '<b>' + Highcharts.numberFormat(customRound(this.y, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') +
                                                '</b>';
                                        case 'both':
                                            return '<b>' + Highcharts.numberFormat(customRound(this.y, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') +
                                                '</b> / ' +
                                                Highcharts.numberFormat(customRound(this.percentage, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') + ' %';
                                    }
                                }
                                return '<b>' + Highcharts.numberFormat(customRound(this.y, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') +
                                    '</b> / ' + Highcharts.numberFormat(customRound(this.percentage, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') + ' %';
                            }
                        },
                        showInLegend: true,
                        size: pieData.isMaximized ? 400 : 200,
                        events: {
                            click: pieData.onItemClick ? pieData.onItemClick : null
                        },
                        point: {
                            events: {
                                legendItemClick: function (event) {
                                    if (event.target.y === 0) {
                                        return false;
                                    } else {
                                        if (pieData.total) {
                                            pieData._legendState[event.target.index] = !pieData._legendState[event.target.index];
                                            calcPieTotal(pieData);
                                            drawTotalOnCenter(pieData, chart, pieData.id);
                                        }
                                    }
                                }
                            }
                        }
                    }
                },
                legend: {
                    layout: legendSettings.layout,
                    symbolRadius: 2,
                    symbolWidth: 10,
                    symbolHeight: 10,
                    width: pieData._legendWidth + '%',
                    align: legendSettings.align,
                    verticalAlign: legendSettings.verticalAlign,
                    floating: legendSettings.floating,
                    itemMarginTop: pieData.itemMargin ? pieData.itemMargin / 2 : 5,
                    itemMarginBottom: pieData.itemMargin ? pieData.itemMargin / 2 : 0,
                    padding: 0,
                    enabled: pieData.legendType !== 'none',
                    navigation: {
                        activeColor: getPrimaryColor()
                    },
                    labelFormatter: function () {
                        return labelFormatter(this.name.toUpperCase(), container, pieData._legendWidth / 100);
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Процент',
                    colorByPoint: true,
                    innerSize: '64%',
                    data: pieData.data
                }]
            });
            drawTotalOnCenter(pieData, chart, pieData.id);
            for (var i = 0; i < chart.series[0].data.length; ++i) {
                if (chart.series[0].data[i].y === 0) {
                    chart.series[0].data[i].setVisible(false);
                }
            }
        }
        function drawTotalOnCenter(pieData, chart, id) {
            if (pieData.title) {
                var label = $('#' + id + '_total');
                if (label) {
                    label.remove();
                }
                var textX = chart.plotLeft + (chart.plotWidth * 0.5);
                var textY = chart.plotTop + (chart.plotHeight * 0.44);
                var textWidth = 100;
                textX = textX - (textWidth / 2);
                chart.renderer.label('<div id="' + id + '_total" style="width: ' + textWidth +
                    'px; text-align: center"><span class="pie-chart-subtitle">Всего</span></br><span class="pie-chart-title">' +
                    pieData.title + '</span></div>', textX, textY, null, null, null, true).add();
            }
        }
        function showDataFullness(percent) {
            let percentContainer = document.getElementById('data-fullness');
            percentContainer.innerText = percent + '%';
        }
        function showChangesInLayout(dataSet) {
            dataSet = parseDataFromString(dataSet);
            addLinearGradientToSeries(dataSet.series, true);
            let options = {
                id: 1,
                type: "barChart",
                dataSets: [{categories: dataSet.categories, series: dataSet.series}]
            };
            renderChart(options);
        }
        function showNumberOfProtocols(dataSet) {
            dataSet = parseDataFromString(dataSet);
            addLinearGradientToData(dataSet);
            let options = {
                id: 2,
                type: "pieChart",
                dataSets: [
                    {
                        data: dataSet,
                        total: true,
                        hideDataLine: true,
                        numbersAfterComma: 0,
                        dataLabelFormat: 'onlyValues',
                        autoItemMargin: true
                    }
                ]
            };
            renderChart(options);
        }
        function showNumberOfObjectsByArea(dataSet) {
            dataSet = parseDataFromString(dataSet);
            addLinearGradientToData(dataSet);
            var options = {
                id: 3,
                type: "pieChart",
                dataSets: [
                    {
                        data: dataSet,
                        total: true,
                        hideDataLine: true,
                        numbersAfterComma: 0,
                        dataLabelFormat: 'onlyValues',
                        autoItemMargin: true
                    }
                ]
            };
            renderChart(options);
        }
        function showNumberOfObjectsByDistrict(dataSet) {
            dataSet = parseDataFromString(dataSet);
            addLinearGradientToSeries(dataSet.series);
            var options = {
                id: 4,
                type: "columnChart",
                dataSets: [{categories: dataSet.categories, series: dataSet.series}]
            };
            renderChart(options);
        }
        function showTop5TypesOfKitchens(dataSet) {
            dataSet = parseDataFromString(dataSet);
            addLinearGradientToData(dataSet);
            var options = {
                id: 5,
                type: "pieChart",
                dataSets: [
                    {
                        data: dataSet,
                        total: true,
                        hideDataLine: true,
                        numbersAfterComma: 0,
                        dataLabelFormat: 'onlyValues',
                        autoItemMargin: true
                    }
                ]
            };
            renderChart(options);
        }    </script>
</head>
<body>
<? // require_once 'menu.php'; ?>
<div class="main-content">
    <div class="main-content__selection">
        <div class="section__content">
            <div class="section__content__container">

                <table class="section__big-blocks-table">
                    <tbody>

                    <col>

                    <col width="20">

                    <col>

                    <tr class="section__big-blocks-table__row" style="z-index: 400">

                        <td class="big-data-block" id="infoBlock1" colspan="3">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Изменения в схеме размещения (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="1"
                                                 data-height="200px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                                     style="overflow: hidden; height:200px ">
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 390">

                        <td class="big-data-block" id="infoBlock2">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество составленных протоколов ГИН,
                                            ОАТИ (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="2"
                                                 data-height="294px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_2"
                                     style="overflow: hidden; height:294px ">
                                </div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_1">
                                    <span>Показать все</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>

                        <td class="big-data-block" id="infoBlock3">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество объектов по площади (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
                                     style="overflow: hidden; height:350px ">
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 380">

                        <td class="big-data-block" id="infoBlock4">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество объектов по округам (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="4"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_4"
                                     style="overflow: hidden; height:350px ">
                                </div>
                            </div>
                        </td>

                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>

                        <td class="big-data-block" id="infoBlock5">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Топ-5 видов кухонь (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="5"
                                                 data-height="294px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_5"
                                     style="overflow: hidden; height:294px ">
                                </div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_2">
                                    <span>Посмотреть по округам</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <!--    <tr class="section__big-blocks-table__row-gap"></tr>-->
                    <tr class="section__big-blocks-table__row"></tr>
                    </tbody>
                </table>
                <table class="date_actual-table">
                    <tr>
                        <td>
                            Данные актуальны на
                        </td>
                        <td id="date-actual">
                            неизвестно
                        </td>
                    </tr>
                    <tr class="section__big-blocks-table__row-gap"></tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<script language="JavaScript">
    //Полнота данных
    function showDataFullnessOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getDataFullnessFromServer",
            success: function (data) {
                showDataFullness(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showDataFullness');
            }
        });
    }// 1) Изменения в схеме размещения (шт.)
    function showChangesInLayoutOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getChangesInLayoutFromServer",
            success: function (data) {
                showChangesInLayout(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showChangesInLayout');
            }
        });
    }// 2) Количество составленных протоколов ГИН, ОАТИ (шт.)
    function showNumberOfProtocolsOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getNumberOfProtocolsFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData[i].color = ["#1A78E2", "#40B3EE"]
                    }
                }
                let json = JSON.stringify(newData)
                showNumberOfProtocols(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNumberOfProtocols');
            }
        });
    }// 3) Количество объектов по площади (шт.)
    function showNumberOfObjectsByAreaOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getNumberOfObjectsByAreaFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData[i].color = ["#1A78E2", "#40B3EE"]
                    }

                }
                let json = JSON.stringify(newData)
                showNumberOfObjectsByArea(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNumberOfObjectsByArea');
            }
        });
    }// 4) Количество объектов по округам (шт.)
    function showTop5TypesOfKitchensOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getTop5TypesOfKitchensFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData[i].color = ["#1A78E2", "#40B3EE"]
                    }

                }
                let json = JSON.stringify(newData)
                showTop5TypesOfKitchens(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showTop5TypesOfKitchens');
            }
        });
    }// 4) Количество объектов по округам (шт.)
    function showNumberOfObjectsByDistrictOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getNumberOfObjectsByDistrictFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.series.length; i++) {

                    if (i % 2 == 0) {
                        newData.series[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData.series[i].color = ["#1A78E2", "#40B3EE"]
                    }

                }
                let json = JSON.stringify(newData)
                showNumberOfObjectsByDistrict(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNumberOfObjectsByDistrict');
            }
        });
    }
    // Установка даты актуальности
    function setActualDateOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=SezonnyeKafe&func=getActualDate",
            success: function (data) {
                setActualDate(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции setActualDate');
            }
        });
    }
    $(document).ready(function () {
        attachButtonsEventPerformers();
        showDataFullnessOnline();
        showChangesInLayoutOnline();
        showNumberOfProtocolsOnline();
        showNumberOfObjectsByAreaOnline();
        showTop5TypesOfKitchensOnline();
        setActualDateOnline();
        showNumberOfObjectsByDistrictOnline();
    });
</script>
</html>
