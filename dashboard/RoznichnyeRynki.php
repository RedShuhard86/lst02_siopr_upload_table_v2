<!doctype html>
<html>
<head>


    <title>Розничные рынки</title>
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
                }                pieData.title = Highcharts.numberFormat(customRound(total, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ');
            }
            legendSettings = {
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
            }            if (!pieData.itemMargin && pieData.autoItemMargin) {
                var linesCounter = 0;

                for (var i = 0; i < pieData.data.length; ++i) {
                    linesCounter += labelLinesCounter(pieData.data[i].name, container, pieData._legendWidth / 100);
                }                pieData.itemMargin = container.offsetHeight - linesCounter * 20;

                if (pieData.itemMargin > 0) {
                    pieData.itemMargin /= pieData.data.length + 1;

                    if (pieData.itemMargin > 40) {
                        pieData.itemMargin = 40;
                    }
                } else {
                    pieData.itemMargin = 0;
                }
            }            if (!pieData.numbersAfterComma && pieData.numbersAfterComma !== 0) {
                pieData.numbersAfterComma = 1;
            }            if (!pieData._legendState) {
                pieData._legendState = [];

                for (var i = 0; i < pieData.data.length; ++i) {
                    pieData._legendState.push(true);
                }
            }            if (pieData.total) {
                calcPieTotal(pieData);
            }            var chart = Highcharts.chart(container, {
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
                                }                                return '<b>' + Highcharts.numberFormat(customRound(this.y, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') +
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
        }        function drawTotalOnCenter(pieData, chart, id) {
            if (pieData.title) {
                var label = $('#' + id + '_total');

                if (label) {
                    label.remove();
                }                var textX = chart.plotLeft + (chart.plotWidth * 0.5);
                var textY = chart.plotTop + (chart.plotHeight * 0.44);
                var textWidth = 100;
                textX = textX - (textWidth / 2);

                chart.renderer.label('<div id="' + id + '_total" style="width: ' + textWidth +
                    'px; text-align: center"><span class="pie-chart-subtitle">Всего</span></br><span class="pie-chart-title">' +
                    pieData.title + '</span></div>', textX, textY, null, null, null, true).add();
            }
        }        function attachSectionSwitcherAction(td, tr, options) {
            $(td).off().on("click", function () {
                if (!$(td).hasClass("big-data-block__data-set-switcher-section__button_selected")) {
                    var $infoBlock = $("#infoBlock" + options.id);
                    $infoBlock.find(".big-data-block__data-set-switcher-section__button_selected").removeClass("big-data-block__data-set-switcher-section__button_selected");
                    $(td).addClass("big-data-block__data-set-switcher-section__button_selected");
                    var $selectedTab = $infoBlock.find(".big-data-block__data-set-switcher__button_selected")[0];
					
                    if (typeof $selectedTab !== "undefined") {
					
                        buttonFireEvent('tabSelectionEvent', 'chartButton_' + options.id + '_' + parseInt($selectedTab.id.substr($selectedTab.id.length - 1, 1)) + '; ' +
                            'sectionButton_' + options.id + '_' + parseInt(td.id.substr(td.id.length - 1, 1)));
                    } else {
                        buttonFireEvent('tabSelectionEvent', 'sectionButton_' + options.id + '_' + parseInt(td.id.substr(td.id.length - 1, 1)));
                    }
                    //TODO удалить, после доработок со стороны 1С
                    //renderChart(options, [parseInt(tr.id.substr(tr.id.length - 1, 1)), parseInt(td.id.substr(td.id.length - 1, 1))]);
                }
            });
        }        function attachDataSetsSwitcherAction(td, options) {
            $(td).off().on("click", function () {
                if (!$(td).hasClass("big-data-block__data-set-switcher__button_selected")) {
                    var $infoBlock = $("#infoBlock" + options.id);
                    $infoBlock.find(".big-data-block__data-set-switcher__button_selected").removeClass("big-data-block__data-set-switcher__button_selected");
                    $(td).addClass("big-data-block__data-set-switcher__button_selected");
                    var $selectedSection = $infoBlock.find(".big-data-block__data-set-switcher-section__button_selected")[0];
                    if (typeof $selectedSection !== "undefined") {
                        buttonFireEvent('tabSelectionEvent', 'chartButton_' + options.id + '_' + parseInt(td.id.substr(td.id.length - 1, 1)) + '; ' +
                            'sectionButton_' + options.id + '_' + parseInt($selectedSection.id.substr($selectedSection.id.length - 1, 1)));
                        //TODO удалить, после доработок со стороны 1С
                        //renderChart(options, [parseInt(td.id.substr(td.id.length - 1, 1)), parseInt($selectedSection.id.substr($selectedSection.id.length - 1, 1))]);
                    } else {
                        buttonFireEvent('Event', 'chartButton' + options.id + '_' + parseInt(td.id.substr(td.id.length - 1, 1)));
                        //TODO удалить, после доработок со стороны 1С
                        //renderChart(options, [parseInt(td.id.substr(td.id.length - 1, 1))]);
                    }
                }
            });
        }        function addTabs(parent, options, switcherIndex) {
            for (var i = 0; i < options.dataSets.length; i++) {
                var td = document.createElement("td");
                td.id = "dataSet" + i;
                td.className = "big-data-block__data-set-switcher__button" + (i === switcherIndex ? " big-data-block__data-set-switcher__button_selected" : "");
                td.innerHTML = options.dataSets[i].name;
                attachDataSetsSwitcherAction(td, options);
                parent.appendChild(td);
                var tdGap = document.createElement("td");
                tdGap.className = "big-data-block__data-set-switcher__gap";
                parent.appendChild(tdGap);
            }
        }        function appendSectionsTab(parent, options, dataSetIndex, sectionIndex) {
            for (var i = 0; i < options.dataSets.length; i++) {
                if (i === dataSetIndex) {
                    var table = document.createElement("table");
                    table.className = "big-data-block__sections-switcher_selected";
                    var tbody = document.createElement("tbody");
                    var tr = document.createElement("tr");
                    tr.id = "dataSet_section" + i;

                    for (var j = 0; j < options.dataSets[i].sections.length; j++) {
                        var td = document.createElement("td");
                        td.id = "section" + j;
                        td.className = "big-data-block__section-switcher__button" + (j === sectionIndex ? " big-data-block__data-set-switcher-section__button_selected" : "");
                        td.innerText = options.dataSets[i].sections[j].name;
                        attachSectionSwitcherAction(td, tr, options);

                        tr.appendChild(td);
                    }
                    tbody.appendChild(tr);
                    table.appendChild(tbody);
                    parent.appendChild(table);
                }
            }
        }        function addTabCaption(parent, options) {
            var td = document.createElement("td");
            td.className = "big-data-block__data-set-switcher__tab_caption";
            td.innerHTML = options.tabCaption;
            parent.appendChild(td);

            var tdGap = document.createElement("td");
            tdGap.className = "big-data-block__data-set-switcher__gap";
            parent.appendChild(tdGap);
        }
        function addComboBox(parent, options, switcherIndex) {
            var td = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";
            for (var i = 0; i < options.dataSets.length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.id = i;
                option.innerText = options.dataSets[i].name;

                select.appendChild(option);
            }            select.selectedIndex = switcherIndex;
            select.onchange = function () {
                // Фикс для ie5, иначе selectedIndex будет -1
                var index = this.selectedIndex;

                renderChart(options, [this.value]);

                if (options.selectOnChange) {
                    options.selectOnChange(index);
                }
            };

            td.appendChild(select);
            parent.appendChild(td);
        }        function addComboBoxByArray(parent, options, switcherIndex, optionName) {
            var td = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";
            for (var i = 0; i < options[optionName].length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.id = i;
                option.innerText = options[optionName][i];

                select.appendChild(option);
            }            select.selectedIndex = optionName === 'comboBox1' ? switcherIndex[0] : switcherIndex[1];

            select.onchange = function () {
                // Фикс для ie5, иначе selectedIndex будет -1
                var index = this.selectedIndex;

                renderChart(options, [
                    optionName === 'comboBox1' ? this.value : switcherIndex[0],
                    optionName === 'comboBox2' ? this.value : switcherIndex[1]
                ]);

                if (options.selectOnChange) {
                    options.selectOnChange(index, optionName);
                }
            };

            td.appendChild(select);
            parent.appendChild(td);

            if (optionName === 'comboBox2' && options.needToHideSecondComboBox) {
                options.needToHideSecondComboBox = false;
                select.style.display = 'none';
            }
        }        function addDataSetsSwitcher(parent, options, dataSetIndex, dataSetIndex2, sectionIndex, showLegend, h) {
            var pDiv = document.createElement("table");
            pDiv.className = "big-data-block__section-switcher__panel";
            pDiv.id = "switcher_" + options.id;
            var pDivtbody = document.createElement("tbody");
            pDivtbody.className = "big-data-block__sections-switcher_tbody";
            var switcherRow = document.createElement("tr");

            var table = document.createElement("table");
            table.className = "big-data-block__data-set-switcher";
            var tbody = document.createElement("tbody");
            var tr = document.createElement("tr");

            if (options.tabCaption) {
                addTabCaption(tr, options);
            }            if (options.tabType && options.tabType === "combobox") {
                addComboBox(tr, options, dataSetIndex);
            } else {
                if (options.tabType && options.tabType === "combobox_double") {
                    addComboBoxByArray(tr, options, [dataSetIndex, dataSetIndex2], 'comboBox1');
                    addComboBoxByArray(tr, options, [dataSetIndex, dataSetIndex2], 'comboBox2');
                } else if (options.dataSets.length > 1) {
                    addTabs(tr, options, dataSetIndex);
                }
            }
            tbody.appendChild(tr);
            table.appendChild(tbody);

            var mainSwitcherCell = document.createElement("td");
            mainSwitcherCell.className = "big-data-block__sections-switcher_td-first";
            mainSwitcherCell.appendChild(table);
            switcherRow.appendChild(mainSwitcherCell);

            if (showLegend) {
                var mainSwitcherCell2 = document.createElement("td");
                mainSwitcherCell2.appendChild(getLegendTableHorizontal(options.dataSets[dataSetIndex].series, h));
                switcherRow.appendChild(mainSwitcherCell2);
            }            if ((options.dataSets[dataSetIndex]) && (options.dataSets[dataSetIndex].sections)) {
                var sectionSwitcherCell = document.createElement("td");
                sectionSwitcherCell.className = "big-data-block__sections-switcher_cell";
                appendSectionsTab(sectionSwitcherCell, options, dataSetIndex, sectionIndex);
                switcherRow.appendChild(sectionSwitcherCell);
            }            pDivtbody.appendChild(switcherRow);
            pDiv.appendChild(pDivtbody);
            parent.appendChild(pDiv);
        }        var pieColors = [
            ['#40B3EE', '#BEE9FF', '#40B3EE'],
            ['#EFFF8B', '#CCF136', '#EFFF8B'],
            ['#40B3EE', '#BEE9FF', '#40B3EE'],
            ['#EFFF8B', '#CCF136', '#EFFF8B'],
        ];

        function showDataFullness(percent) {
            var percentContainer = document.getElementById('data-fullness');
            percentContainer.innerText = percent + '%';
        }        // function showSpecialMarketsPlacesInfo(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 1,
        //         type: "list",
        //         dataSets:[{dataList:dataList}]
        //     };
        //
        //     renderChart(options);
        //
        //     $(".js-btn-id-click").off().on('click',function (e) {
        //         var $el = $(e.target);
        //         var id = $el.attr('data-btn-id');
        //         buttonFireEvent('buttonId', id);
        //     });
        // }        // function showSpecialMarketsPlaces(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 2,
        //         type: "list",
        //         dataSets:[{dataList: dataList}]
        //     };
        //
        //     renderChart(options);
        // }
        function showPieMarket(data) {
            showPie(data, 1);
        }        function showPieShMarket(data) {
            showPie(data, 2);
        }        function showPieRight(data) {
            showPie(data, 5);
        }        function showPie(dataList, id) {
            dataList = parseDataFromString(dataList);

            var total = 0;
            for (var i = 0; i < dataList.length; i++) {
                total += dataList[i].y;
                dataList[i].color = dataList[i].color ?
                    getLinearGradient(dataList[i].color) :
                    getLinearGradient(pieColors[i]);
            }            var options = {
                id: id,
                type: "pieChart",
                dataSets: [{
                    id: 1,
                    total: total,
                    data: dataList,
                    hideDataLine: true,
                    dataLabelFormat: 'onlyValues',
                    numbersAfterComma: 0,
                    padding: id !== 5 ? '0 50px 0 80px' : '20px 50px 35px 80px',
                    autoItemMargin: true
                }]
            };

            renderChart(options);
        }        function showMarketsRegion(data) {
            data = parseDataFromString(data);

            addLinearGradientToSeries(data[0].series);

            var options = {
                id: 3,
                type: "columnChart",
                useLegendChart: true,
                dataSets: data
            };

            return renderChart(options);
        }        function showMarketsSquare(data) {
            data = parseDataFromString(data);
            addLinearGradientToSeries(data[0].series);

            var options = {
                id: 6,
                type: "columnChart",
				numbersAfterComma: 1,
                dataSets: data
            };

            return renderChart(options);
        }        function showMarketsPlace(dataSets) {
            dataSets = parseDataFromString(dataSets);
            var finalDataSets = [];

            for (var j = 0; j < dataSets.length; ++j) {
                var dataSet = dataSets[j];
                var series;

                if (dataSet.data) {
                    for (var i = 0; i < dataSet.data.length; ++i) {
                        if (dataSet.data[i].colors) {
                            dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                            dataSet.data[i].colors = undefined;
                        } else {
                            dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                        }
                    }                    series = [{
                        name: dataSet.seriesName ? dataSet.seriesName : 'Количество',
                        data: dataSet.data
                    }];
                } else {
                    series = undefined;
                }                finalDataSets.push({
                    name: dataSet.tabName,
                    categories: dataSet.categories,
                    series: series
                });
            }            var options = {
                id: 4,
                type: "barChart",
                tabCaption: "Мест:",
                dataSets: finalDataSets
            };

            renderChart(options);
        }
        function showMarkets(dataList) {
            dataList = parseDataFromString(dataList);

            var options = {
                id: 3,
                type: "list",
                dataSets: [{name: "1", id: 1, dataList: dataList}]
            }
            renderChart(options);
        }
        function showObjects(quantityDataList, squareDataList) {
            quantityDataList = parseDataFromString(quantityDataList);
            squareDataList = parseDataFromString(squareDataList);

            var options = {
                id: 4,
                type: "list",
                dataSets: [
                    {name: "Количество", id: 1, dataList: quantityDataList},
                    {name: "Площадь", id: 2, dataList: squareDataList}
                ]
            }
            renderChart(options);
        }
        // function showObjects_V2(dataSets) {
        //     dataSets = parseDataFromString(dataSets);
        //
        //     var options = {
        //         id: 4,
        //         type: "list",
        //         dataSets: dataSets
        //     }
        //
        //     renderChart(options);
        // }        // function showTradingPlaces(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 5,
        //         type: "list",
        //         dataSets:[{name:"1",id:1,dataList:dataList}]
        //     }
        //
        //     renderChart(options);
        // }        // function showSellers(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 6,
        //         type: "list",
        //         dataSets:[
        //             {name:"Площадь",id:2,dataList:dataList}]
        //     }
        //
        //     renderChart(options);
        // }
        function showTradingPlacesByDistricts(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);

            var series = [{
                name: 'Количество',
                color: getPrimaryGradient(),
                data: data
            }];

            var options = {
                id: 7,
                type: "columnChart",
                dataSets: [{categories: categories, series: series}]
            };

            renderChart(options);
        }        function showMarketsByDistricts(categories, dataSpecial, dataUniversal) {
            categories = parseDataFromString(categories);
            dataSpecial = parseDataFromString(dataSpecial);
            dataUniversal = parseDataFromString(dataUniversal);

            var series = [{
                name: "Специализированные",
                color: getPrimaryGradient(),
                data: dataSpecial
            },
                {
                    name: "Универсальные",
                    color: getSecondaryGradient(),
                    data: dataUniversal
                }];

            var options = {
                id: 8,
                type: "columnChart",
                dataSets: [{categories: categories, series: series}]
            };

            renderChart(options);
        }
        function showPrices(dataList) {
            dataList = parseDataFromString(dataList);

            var options = {
                id: 9,
                type: "list",
                dataSets: [
                    {name: "Площадь", id: 2, dataList: dataList}]
            }
            renderChart(options,1);
        }
    </script>
</head>
<body>
<?// require_once 'menu.php'; ?>

<div class="main-content">
    <div class="main-content__selection">

        <div class="section__content">
            <div class="section__content__container">
                <div><h2> Розничные рынки </h2></div>
                <!-- <table class="section__small-blocks-table">
                    <tbody>
                    <tr>
                        <td class="small-data-block" id="data_fullness_block">
                            <div class="small-data-block__header-part" id="data-fullness"></div>
                            <div class="small-data-block__text-part">Полнота данных</div>
                            <div class="small-data-block__array">
                                <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAEpSURBVGhD7Zk9CsJAEEZn19YD2Ao5h6AoxONYKVZWopVn8BQGBAvxGIJg5QFszZrZbEih5fwQmAdLkq2+N7MLm8SFCugwPl07iwloYwLamIA2JqCNCWhjAtrQCTxvUB6nccDjkib5ITtOY/DwfsV753vgZjtw2Tw+c8KyhEL5gXBeQbif0gwfZAJ+tI6Vb2glijTDA10HhpN62fxILFklSJcQrnlpCfI9IC3Bsolrib2IBIsA4rJcRIJNAJGQYBWQgFUAqxyrXVW9AbsRu1J1hwI2AYnwCIuAVHiEXEAyPEIqgIe3/+HxZEofHqH7Ol29A5TFQqzyDWQdKK9b0co3sGziNnyHXmj8eAOuP4jD5weR8Ij9odHGBLQxAW1MQBsT0MYEtDEBXQC+9sGinlaxRrQAAAAASUVORK5CYII="
                                        alt="">
                            </div>
                        </td>
                        <td class="section__small-blocks-table__gap"></td>
                        <td class="small-data-block" id="interactive_maps_block">
                            <div class="small-data-block__header-part " id=""><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA3hJREFUSA3tVltIlFEQnrO6rpcUK6KHKKGkQB801MLSygqDHqywC1YWW5QZREQUUdJLSWBQdtW1MrpI2pO9dbPrBpFR+ZSg0YUoi8ysbFFzT9/s7vzubu26C4IvDXz/mTPX/585P2eIRphWIL9pGN4hMtwYGg5twBYgOlxn2KcBVcB34AYwHwiJOLHgE/h9wOghPC3QrwUeAeLrvT6FfCUQAQQkcWiGhfA/wB8BJvp5TcG+AvgCiG0X+GNAFrAX6ABE1w6+FIgB/iIxYgWX6Togsj7wFwH+OpY7AdHxV20EYgFv4naVANw+sf0MvgwYAxgkSkMAhvtWB/QDouf1F1AL8NcNRXxglwNPAInx09tJhIZMP6yxa3tNAQRJwHFAbIL13mUD3wb9wPZa28/s0o8vJ3iC5nnFIOURsgOT7AmObpmiVogPq9zN59wmgzaePenn5xPpZ/962FSyDL6i4rWblLJRjK5UmSUfPAoliQInFss53DIEfWpLRIBuF/+oJgsdxy+oi1CPfx4elxM/lOrDi0V59irsH54c9E7bbXWk1Qwa0BlG4KEYrSUpKlJzLfzEmhLwdfg9pEiDGZVUxbfUgwYGpwv41I0Ihf/FQV7T71AFsRyeiyFogkDKYS0191j6HCihyIc1sQQNZf3f41CqFNDmf48DlgaKETvV/on5zgybun70UOXV25RuPUDbjzXQ247OIWPI79QDyzjgDsBzV4XT6SSTyf+9oPGi5pdvqKrxPtU3NZOjjwcVopZX7+l04z1amZdJu1fnU1qy/8jmFQAsz0E8D/FcxNeOTp4wTlfvXKMdt05qz1DgkvfcPKHP7i7WGVMnufZsi0td52el6EtlVl2cP1ObIyIM3aIZKbrp6A6fGMaQAWchvsxx5RFPhi7n8aPjdfmmJUagxFExBj82IU7vKsrX7VcOugJzQEZ7fXnLstz0F3HRUcZgmDktyfBjG5lAJLGsPAsXxlrM+3/19qeKUNbs1MlUunQuyplBliizW6wwIhDVk0lVqdmbuV20c/X8pHcfu213nrUu7OzuMeZrJP57fnJH8XkuiLaYy5wDzlnFi7L1tsJ5Fp++uWeyahplvqCmW7/5eHo2Gwpmx/f2/j5lb2lb9bbja1SoiSVWJCbGWPrtKCGncytmqCekdLXKKbkrBiGsJuvinEO1e9bl/AEl4VRiLWl3gQAAAABJRU5ErkJggg=="
                                    alt=""></div>
                            <div class="small-data-block__text-part " id="">Интерактивные карты</div>
                            <div class="small-data-block__array">
                                <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAEpSURBVGhD7Zk9CsJAEEZn19YD2Ao5h6AoxONYKVZWopVn8BQGBAvxGIJg5QFszZrZbEih5fwQmAdLkq2+N7MLm8SFCugwPl07iwloYwLamIA2JqCNCWhjAtrQCTxvUB6nccDjkib5ITtOY/DwfsV753vgZjtw2Tw+c8KyhEL5gXBeQbif0gwfZAJ+tI6Vb2glijTDA10HhpN62fxILFklSJcQrnlpCfI9IC3Bsolrib2IBIsA4rJcRIJNAJGQYBWQgFUAqxyrXVW9AbsRu1J1hwI2AYnwCIuAVHiEXEAyPEIqgIe3/+HxZEofHqH7Ol29A5TFQqzyDWQdKK9b0co3sGziNnyHXmj8eAOuP4jD5weR8Ij9odHGBLQxAW1MQBsT0MYEtDEBXQC+9sGinlaxRrQAAAAASUVORK5CYII="
                                        alt="">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table> -->


                <table class="section__big-blocks-table">
                    <tbody>


                    <col>


                    <col width="20">


                    <col>


                    <tr class="section__big-blocks-table__row" style="z-index: 400">


                        <td class="big-data-block" id="infoBlock1">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество розничных рынков по типам
                                            (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="1"
                                                 data-height="300px"
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
                                     style="overflow: hidden; height:300px ">

                                </div>

                            </div>
                        </td>


                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>


                        <td class="big-data-block" id="infoBlock2">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество торговых мест на розничных рынках
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="2"
                                                 data-height="300px"
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
                                     style="overflow: hidden; height:300px ">

                                </div>

                            </div>
                        </td>


                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <tr class="section__big-blocks-table__row" style="z-index: 390">


                        <td class="big-data-block" id="infoBlock3" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество розничных рынков по округам
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
                                                 data-height="450px"
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
                                     style="overflow: hidden; height:450px ">

                                </div>

                            </div>
                        </td>


                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <tr class="section__big-blocks-table__row" style="z-index: 370">


                        <td class="big-data-block" id="infoBlock6" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Суммарная площадь рынков по округам
                                            (тыс. м²)
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="6"
                                                 data-height="350px"
                                                 data-height-min="300px"
                                                 class="resize-btn"
                                            >


                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                                     style="overflow: hidden; height:350px ">

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
function showDataFullnessOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getDataFullnessFromServer",
        success: function(data) {
           
			showDataFullness(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showDataFullness');
        }
    });
}function showPieMarketOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getPieMarketFromServer",
        success: function(data) {
           
            let newData = JSON.parse(data)
            for (let i = 0; i <  newData.length; i++) {
               
               if (i  % 2 == 0 ) {
                newData[i].color = ['#EFFF8B' , '#CCF136']
               } else {
                newData[i].color = ["#1A78E2", "#40B3EE"]
                
               }
              
               
           }
		   if(newData.length == 3) {
			   newData[1].name = 'Специализированные';
			   newData[1].y = newData[1].y + newData[2].y;
			   newData = newData.filter((num, index) => index !== 2)
		   }
		   
           let json = JSON.stringify(newData)
			showPieMarket(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showPieMarket');
        }
    });
}function showPieShMarketOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getPieShMarketFromServer",
        success: function(data) {
            let newData = JSON.parse(data)
            for (let i = 0; i <  newData.length; i++) {
               if(newData[i].name == "Продовольственные"){
				   newData[i].name = "Занято рабочих мест";
			   }
               if(newData[i].name == "Непродовольственные"){
				   newData[i].name = "Свободно рабочих мест";
			   }
               if (i  % 2 == 0 ) {
                newData[i].color = ['#EFFF8B' , '#CCF136']
               } else {
                newData[i].color = ["#1A78E2", "#40B3EE"]
                
               }
              
               
           }
       
           let json = JSON.stringify(newData)
            
			showPieShMarket(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showPieShMarket');
        }
    });
}function showMarketsRegionOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getMarketsRegionFromServer",
        success: function(data) {
      
            let newData = JSON.parse(data)
           
            for (let i = 0; i <  newData[0].series.length; i++) {
                if (i  % 2 == 0 ) {
                    newData[0].series[i].color  = ['#EFFF8B' , '#CCF136']
          } else {
            newData[0].series[i].color  = ["#1A78E2", "#40B3EE"]
                 }
              
                
        //         for (let q = 0; q <  newData[0].series[i].data.length; q++)
               
        //        if (q  % 2 == 0 ) {
        //         newData[0].series[i].data[q].color = ['#EFFF8B' , '#CCF136']
        //   } else {
        //     newData[0].series[i].data[q].color = ["#1A78E2", "#40B3EE"]
        //          }
        }
     
        let json = JSON.stringify(newData)
			showMarketsRegion(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showMarketsRegion');
        }
    });
}function showMarketsPlaceOnline(btn) {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getMarketsPlaceFromServer",
        success: function(data) {
           
			var JSONx;
			var datax = JSON.parse(data);
			if(btn == 'chartButton4_0') {
				JSONx = [{"tabName": "Занятых", "categories": datax[0], "data": datax[2]},{"tabName": "Свободных"}];
			}
			else if(btn == 'chartButton4_1')  {
				JSONx = [{"tabName": "Занятых"},{"tabName": "Свободных", "categories": datax[0], "data": datax[1]}];
			}
			showMarketsPlace(JSONx); 
        },
        error:  function(){
            alert('Ошибка получения данных для функции showMarketsPlace');
        }
    });
}
function showPieRightOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getPieRightFromServer",
        success: function(data) {
            let newData = JSON.parse(data)
            for (let i = 0; i <  newData.length; i++) {
               
               if (i  % 2 == 0 ) {
                newData[i].color = ['#EFFF8B' , '#CCF136']
               } else {
                newData[i].color = ["#1A78E2", "#40B3EE"]
                
               }
           }
       
           let json = JSON.stringify(newData)
			showPieRight(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showPieRight');
        }
    });
}function showMarketsSquareOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getMarketsSquareFromServer",
        success: function(data) {
            let newData = JSON.parse(data)
            for (let i = 0; i <  newData.length; i++) {
                for (let q = 0; q < newData[i].series.length; q++) {
                    if (i  % 2 == 0 ) {
                        newData[i].series[q].color = ['#EFFF8B' , '#CCF136']
               } else {
                newData[i].series[q].color = ["#1A78E2", "#40B3EE"]
                
               }}
           }
           let json = JSON.stringify(newData)
			showMarketsSquare(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showMarketsSquare');
        }
    });
}function setActualDateOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=RoznichnyeRynki&func=getActualDate",
        success: function(data) {
			setActualDate(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции setActualDate');
        }
    });
} 
	$(document).ready(function () {
        attachButtonsEventPerformers();


		showDataFullnessOnline();
		showPieMarketOnline();
		showPieShMarketOnline();
		showMarketsRegionOnline();
		//showMarketsPlaceOnline("chartButton4_0");
		//showPieRightOnline();
		showMarketsSquareOnline();
		setActualDateOnline();
		
		$(document).on('click', '#dataSet0', function(event) {showMarketsPlaceOnline("chartButton4_0");})
		$(document).on('click', '#dataSet1', function(event) {showMarketsPlaceOnline("chartButton4_1");})
		
    });
</script>

</html>