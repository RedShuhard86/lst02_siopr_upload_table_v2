<!doctype html>
<html>
<head>
    <title>ДТиУ: основные показатели</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>
    <script language="JavaScript">
        function drawSingleColumnChartHorizontal(container, category, needToShowCategory, series, index, max, options) {
            if (!options.numbersAfterComma && options.numbersAfterComma !== 0) {
                options.numbersAfterComma = 2;
            }
            Highcharts.chart({
                chart: {
                    marginTop: 0,
                    marginBottom: 0,
                    marginLeft: options && options._marginLeft ? options._marginLeft : undefined,
                    renderTo: container,
                    type: 'bar',
                    events: {
                        redraw: function () {
                            // Фикс (костыль) смещения влево для customBarChart, так как горизонтальные столбцы не связаны между собой
                            // Такой фикс из-за ie5
                            if (options.altNameStyle) {
                                if (options._itemFormatCounter) {
                                    if (options._itemFormatCounter === options.dataSets[0].categories.length - 1) {
                                        $(container).parent().find('div > .highcharts-axis-labels.highcharts-xaxis-labels > span').css('left', '0');
                                        options._itemFormatCounter = 0;
                                    } else {
                                        ++options._itemFormatCounter;
                                    }
                                } else {
                                    options._itemFormatCounter = 1;
                                }
                            }
                        }
                    }
                },
                title: {
                    text: ''
                },
                tooltip: {
                    headerFormat: '',
                    formatter: function () {
                        var res = Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                            options.numbersAfterComma, '.', ' ');                        return '<span style="color:' + this.point.color +
                            '">\u25CF</span> ' + this.series.name + ': <b>' + res + '</b><br/>';
                    }
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: needToShowCategory ? [category] : [''],
                    title: {
                        text: null
                    },
                    gridLineColor: "#e6e6e6",
                    gridLineDashStyle: "Solid",
                    gridLineWidth: 0,
                    gridZIndex: 1,
                    lineWidth: 0,
                    labels: {
                        useHTML: true,
                        align: "left",
                        reserveSpace: true,
                        style: options.labelStyles && options.labelStyles[index] ? options.labelStyles[index] : {
                            fontSize: '14px',
                            color: 'black',
                            fontFamily: 'Arial'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    minRange: 0.0001, // если убрать данный фикс, то при всех нулевых значениях в графике нули будут в центре блока, а не слева
                    max: max ? max : undefined,
                    maxPadding: 0.1,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, options && options.numbersAfterComma !== undefined && options.numbersAfterComma !== null ?
                                options.numbersAfterComma : 2, '.', ' ');
                        }
                    },
                    lineWidth: 0,
                    gridLineWidth: 0
                },
                plotOptions: {
                    bar: {
                        borderRadius: 8,
                        dataLabels: {
                            enabled: true,
                            formatter: function () {
                                return Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                                    options.numbersAfterComma, '.', ' ');
                            }
                        }
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                series: series
            });
        }        function drawCustomBarChart(container, options, dataSetIndex) {
            var max = 0;
            var categories = options.dataSets[dataSetIndex].categories;
            var series = options.dataSets[dataSetIndex].series;
            var data = series[0].data;
            var height = 10;            for (i = 0; i < data.length; i++) {
                if (data[i].y > max) {
                    max = data[i].y;
                }
                data[i].y = jQuery.parseJSON(data[i].y.toFixed(2));
            }
            max = max * 1.1;            if (options.altNameStyle) {
                var maxLength = 0;                for (var i = 0; i < categories.length; i++) {
                    if (categories[i].length > maxLength) {
                        maxLength = categories[i].length;
                    }
                    if (options.subTitles && options.subTitles[i]) {
                        height += 36;
                    }
                }
                for (var i = 0; i < categories.length; i++) {
                    if (options.subTitles && options.subTitles[i]) {
                        var newDivSubTitle = document.createElement("div");                        newDivSubTitle.innerText = options.subTitles[i];
                        newDivSubTitle.className = 'custom-bar-chart-subtitle';                        newDivSubTitle.style.fontSize = '14px';
                        newDivSubTitle.style.fontFamily = 'Arial';
                        newDivSubTitle.style.padding = '10px 0';
                        newDivSubTitle.style.paddingLeft = '14px';                        container.appendChild(newDivSubTitle);
                    }
                    var newDivData = document.createElement("div");                    $(newDivData).css("padding-left", '14px');
                    $(newDivData).css("height", (container.offsetHeight - height) / categories.length);                    container.appendChild(newDivData);                    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);                    var newSeries = [{
                        name: series[0].name,
                        data: [data[i]]
                    }];                    options._marginLeft = maxLength * 10;
                    drawSingleColumnChartHorizontal(newDivData, categories[i], true, newSeries, i, max, options);                    // Фикс (костыль) смещения влево для customBarChart, так как горизонтальные столбцы не связаны между собой
                    // Такой фикс из-за ie5
                    setTimeout(function () {
                        $(container).find('div > .highcharts-axis-labels.highcharts-xaxis-labels > span').css('left', '0');
                    }, 0);
                }
            } else {
                height += categories.length * 16;                for (var i = 0; i < categories.length; ++i) {
                    if (options.subTitles && options.subTitles[i]) {
                        height += 36;
                    }
                }
                for (var i = 0; i < categories.length; ++i) {
                    if (options.subTitles && options.subTitles[i]) {
                        var newDivSubTitle = document.createElement("div");                        newDivSubTitle.innerText = options.subTitles[i];
                        newDivSubTitle.className = 'custom-bar-chart-subtitle';                        newDivSubTitle.style.fontSize = '14px';
                        newDivSubTitle.style.fontFamily = 'Arial';
                        newDivSubTitle.style.padding = '10px 0';
                        newDivSubTitle.style.paddingLeft = '24px';                        container.appendChild(newDivSubTitle);
                    }
                    var newDivLabel = document.createElement("div");                    newDivLabel.innerText = categories[i];
                    $(newDivLabel).css("color", '#000000');
                    $(newDivLabel).css("font-size", '14px');
                    $(newDivLabel).css("padding-left", '24px');
                    $(newDivLabel).css("font-family", 'robotoregular');
                    $(newDivLabel).css("font-family", 'Arial');                    if (i === 0 && (options.subTitles && !options.subTitles[0] || !options.subTitles)) {
                        $(newDivLabel).css("padding-top", '20px');                        height += 20;
                    }
                    container.appendChild(newDivLabel);                    var newDivData = document.createElement("div");                    $(newDivData).css("padding-left", '14px');
                    $(newDivData).css("height", (container.offsetHeight - height) / categories.length);                    container.appendChild(newDivData);                    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);                    var newSeries = [{
                        name: series[0].name,
                        data: [data[i]]
                    }];                    drawSingleColumnChartHorizontal(newDivData, categories[i], false, newSeries, i, max, options);
                }
            }
        }        function drawPieChart(container, pieData) {
            var calcPieTotal = function () {
                var total = 0;                for (var i = 0; i < pieData.data.length; ++i) {
                    if (pieData._legendState[i]) {
                        total += pieData.data[i].y;
                    }
                }                pieData.title = Highcharts.numberFormat(customRound(total, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ');
            };
            let legendSettings = {
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
                var linesCounter = 0;                for (var i = 0; i < pieData.data.length; ++i) {
                    linesCounter += labelLinesCounter(pieData.data[i].name, container, pieData._legendWidth / 100);
                }
                pieData.itemMargin = container.offsetHeight - linesCounter * 20;                if (pieData.itemMargin > 0) {
                    pieData.itemMargin /= pieData.data.length + 1;                    if (pieData.itemMargin > 40) {
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
                pieData._legendState = [];                for (var i = 0; i < pieData.data.length; ++i) {
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
                                            pieData._legendState[event.target.index] = !pieData._legendState[event.target.index];                                            calcPieTotal(pieData);
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
            });            drawTotalOnCenter(pieData, chart, pieData.id);            for (var i = 0; i < chart.series[0].data.length; ++i) {
                if (chart.series[0].data[i].y === 0) {
                    chart.series[0].data[i].setVisible(false);
                }
            }
        }        function drawTotalOnCenter(pieData, chart, id) {
            if (pieData.title) {
                var label = $('#' + id + '_total');                if (label) {
                    label.remove();
                }
                var textX = chart.plotLeft + (chart.plotWidth * 0.5);
                var textY = chart.plotTop + (chart.plotHeight * 0.44);
                var textWidth = 100;
                textX = textX - (textWidth / 2);                chart.renderer.label('<div id="' + id + '_total" style="width: ' + textWidth +
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
                    tr.id = "dataSet_section" + i;                    for (var j = 0; j < options.dataSets[i].sections.length; j++) {
                        var td = document.createElement("td");
                        td.id = "section" + j;
                        td.className = "big-data-block__section-switcher__button" + (j === sectionIndex ? " big-data-block__data-set-switcher-section__button_selected" : "");
                        td.innerText = options.dataSets[i].sections[j].name;
                        attachSectionSwitcherAction(td, tr, options);                        tr.appendChild(td);
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
            parent.appendChild(td);            var tdGap = document.createElement("td");
            tdGap.className = "big-data-block__data-set-switcher__gap";
            parent.appendChild(tdGap);
        }        function addComboBox(parent, options, switcherIndex) {
            var td = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";
            for (var i = 0; i < options.dataSets.length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.id = i;
                option.innerText = options.dataSets[i].name;                select.appendChild(option);
            }
            select.selectedIndex = switcherIndex;
            select.onchange = function () {
                // Фикс для ie5, иначе selectedIndex будет -1
                var index = this.selectedIndex;                renderChart(options, [this.value]);                if (options.selectOnChange) {
                    options.selectOnChange(index);
                }
            };            td.appendChild(select);
            parent.appendChild(td);
        }        function addComboBoxByArray(parent, options, switcherIndex, optionName) {
            var td = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";
            for (var i = 0; i < options[optionName].length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.id = i;
                option.innerText = options[optionName][i];                select.appendChild(option);
            }
            select.selectedIndex = optionName === 'comboBox1' ? switcherIndex[0] : switcherIndex[1];            select.onchange = function () {
                // Фикс для ie5, иначе selectedIndex будет -1
                var index = this.selectedIndex;                renderChart(options, [
                    optionName === 'comboBox1' ? this.value : switcherIndex[0],
                    optionName === 'comboBox2' ? this.value : switcherIndex[1]
                ]);                if (options.selectOnChange) {
                    options.selectOnChange(index, optionName);
                }
            };            td.appendChild(select);
            parent.appendChild(td);            if (optionName === 'comboBox2' && options.needToHideSecondComboBox) {
                options.needToHideSecondComboBox = false;
                select.style.display = 'none';
            }
        }        function addDataSetsSwitcher(parent, options, dataSetIndex, dataSetIndex2, sectionIndex, showLegend, h) {
            var pDiv = document.createElement("table");
            pDiv.className = "big-data-block__section-switcher__panel";
            pDiv.id = "switcher_" + options.id;
            var pDivtbody = document.createElement("tbody");
            pDivtbody.className = "big-data-block__sections-switcher_tbody";
            var switcherRow = document.createElement("tr");            var table = document.createElement("table");
            table.className = "big-data-block__data-set-switcher";
            var tbody = document.createElement("tbody");
            var tr = document.createElement("tr");            if (options.tabCaption) {
                addTabCaption(tr, options);
            }
            if (options.tabType && options.tabType === "combobox") {
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
            table.appendChild(tbody);            var mainSwitcherCell = document.createElement("td");
            mainSwitcherCell.className = "big-data-block__sections-switcher_td-first";
            mainSwitcherCell.appendChild(table);
            switcherRow.appendChild(mainSwitcherCell);            if (showLegend) {
                var mainSwitcherCell2 = document.createElement("td");
                mainSwitcherCell2.appendChild(getLegendTableHorizontal(options.dataSets[dataSetIndex].series, h));
                switcherRow.appendChild(mainSwitcherCell2);
            }
            if ((options.dataSets[dataSetIndex]) && (options.dataSets[dataSetIndex].sections)) {
                var sectionSwitcherCell = document.createElement("td");
                sectionSwitcherCell.className = "big-data-block__sections-switcher_cell";
                appendSectionsTab(sectionSwitcherCell, options, dataSetIndex, sectionIndex);
                switcherRow.appendChild(sectionSwitcherCell);
            }
            pDivtbody.appendChild(switcherRow);
            pDiv.appendChild(pDivtbody);
            parent.appendChild(pDiv);
        }        function showEstimatedIncome(sum) {
            var estimatedIncomeContainer = document.getElementById('estimated-income');
            estimatedIncomeContainer.innerText = sum;
        }        function showNonstaticObjects(categories, data) {
            categories = parseDataFromString(categories);
            data = addGradientToBar(parseDataFromString(data));            var series = [{
                name: 'Количество',
                data: data
            }];            var options = {
                id: 1,
                type: "barChart",
                // Костыль к показу (ПОПРАВИТЬ!!!)
                dataSets: [{categories: ['Количество адресов', 'Количество адресов с договорами'], series: series}]
            };            renderChart(options);
        }        function showStaticObjects(categories, data) {
            categories = parseDataFromString(categories);
            data = addGradientToBar(parseDataFromString(data));            var series = [{
                name: 'Количество',
                data: data
            }];            var options = {
                id: 2,
                type: "barChart",
                title: "Количество объектов по городу",
                dataSets: [{categories: categories, series: series}]
            };            renderChart(options);
        }        function showObjectsByDistricts(categories, dataAllFood, dataAllNotFood, dataNetworkFood, dataNetworkNotFood, dataNotNetworkFood, dataNotNetworkNotFood) {
            categories = parseDataFromString(categories);
            dataAllFood = parseDataFromString(dataAllFood);
            dataAllNotFood = parseDataFromString(dataAllNotFood);
            dataNetworkFood = parseDataFromString(dataNetworkFood);
            dataNetworkNotFood = parseDataFromString(dataNetworkNotFood);
            dataNotNetworkFood = parseDataFromString(dataNotNetworkFood);
            dataNotNetworkNotFood = parseDataFromString(dataNotNetworkNotFood);            var series1 = [{
                name: 'Продовольственные',
                color: getTurquoiseColor(),
                data: dataAllFood
            },
                {
                    name: 'Непродовольственные',
                    color: getYellowColor(),
                    data: dataAllNotFood
                }];            var series2 = [{
                name: 'Продовольственные',
                color: getTurquoiseColor(),
                data: dataNetworkFood
            },
                {
                    name: 'Непродовольственные',
                    color: getYellowColor(),
                    data: dataNetworkNotFood
                }];            var series3 = [{
                name: 'Продовольственные',
                color: getTurquoiseColor(),
                data: dataNotNetworkFood
            },
                {
                    name: 'Непродовольственные',
                    color: getYellowColor(),
                    data: dataNotNetworkNotFood
                }];            var options = {
                id: 3,
                type: "columnChart",
                showLegend: true,
                dataSets: [{name: "Все", id: 0, categories: categories, series: series1},
                    {name: "Несетевые", id: 1, categories: categories, series: series3},
                    {name: "Сетевые", id: 2, categories: categories, series: series2}]
            };            renderChart(options);
        }        function showObjectsByDistricts_V2(dataSets) {
            dataSets = addGradientColumn(parseDataFromString(dataSets));            var options = {
                id: 3,
                type: "columnChart",
                showLegend: true,
                dataSets: dataSets
            };            renderChart(options);
        }        function showMainDept(categories, dataPlan, dataFact) {
            categories = parseDataFromString(categories);
            dataPlan = parseDataFromString(dataPlan);
            dataFact = parseDataFromString(dataFact);            var series = [{
                name: 'Количество объектов',
                color: getPrimaryGradient(),
                data: dataPlan
            },
                {
                    name: 'Действующих договоров',
                    color: getSecondaryGradient(),
                    data: dataFact
                }];            var options = {
                id: 4,
                type: "columnChart",
                showLegend: true,
                dataSets: [{categories: categories, series: series}]
            };            renderChart(options);
        }        function showPricesTop5(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            addLinearGradientToData(data, true);            var series = [{
                name: 'Процент',
                data: data
            }];            var options = {
                id: 5,
                type: "barChart",
                dataSets: [{categories: categories, series: series}]
            };            return renderChart(options);
        }        function showFines(categories, dataYearN, dataQuarterN, dataMonthN, dataYearR, dataQuarterR, dataMonthR) {
            categories = parseDataFromString(categories);
            dataYearN = parseDataFromString(dataYearN);
            dataQuarterN = parseDataFromString(dataQuarterN);
            dataMonthN = parseDataFromString(dataMonthN);
            dataYearR = parseDataFromString(dataYearR);
            dataQuarterR = parseDataFromString(dataQuarterR);
            dataMonthR = parseDataFromString(dataMonthR);            var sectionsYear = [{
                id: 1,
                name: 'шт.',
                color: getPrimaryColor(),
                data: dataYearN
            },
                {
                    id: 2,
                    name: 'руб.',
                    color: getPrimaryColor(),
                    data: dataYearR
                }];            var sectionsQuarter = [{
                id: 1,
                name: 'шт.',
                color: getPrimaryColor(),
                data: dataQuarterN
            },
                {
                    id: 2,
                    name: 'руб.',
                    color: getPrimaryColor(),
                    data: dataQuarterR
                }];            var sectionsMonth = [{
                id: 1,
                name: 'шт.',
                color: getPrimaryColor(),
                data: dataMonthN
            },
                {
                    id: 2,
                    name: 'руб.',
                    color: getPrimaryColor(),
                    data: dataMonthR
                }];            var options = {
                id: 6,
                type: "barChart",
                tabCaption: "За текущий:",
                dataSets: [{name: "Год", id: 1, categories: categories, sections: sectionsYear},
                    {name: "Месяц", id: 2, categories: categories, sections: sectionsMonth},
                    {name: "Квартал", id: 3, categories: categories, sections: sectionsQuarter}]
            };            renderChart(options);
        }        function showFines_V2(dataSets) {
            dataSets = addGradientColumnSection(parseDataFromString(dataSets));            var options = {
                id: 7,
                type: "barChart",
                tabCaption: "За текущий:",
                dataSets: dataSets
            };            renderChart(options);
        }
        // function showNTO(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 9,
        //         type: "list",
        //         dataSets:[{dataList:dataList}]
        //     };
        //
        //     renderChart(options);
            function showViolationsTop5(dataList) {
                dataList = parseDataFromString(dataList);
                var options = {
                    id: 11,
                    type: "list",
                    dataSets: [{dataList: dataList}]
                };
                renderChart(options);
            }
        function showAcceptedRequests(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            var series = [{
                name: 'Количество',
                color: getPrimaryGradient(),
                data: data
            }];            var options = {
                id: 7,
                type: "columnChart",
                dataSets: [{name: "Количество", id: 1, categories: categories, series: series}]
            };            renderChart(options);
        }        function getSeriesOne(data, id1, id2) {
            var res = [];
            for (var i = 0; i < data.length; i++) {
                if ((data[i].id1 === id1) &&
                    (data[i].id2 === id2)) {                    res.push({
                        name: 'Количество',
                        color: getPrimaryGradient(),
                        data: data[i].data
                    });
                    return res;
                }
            }
        }        function getTwoSeries(data, id1, id2) {
            var res = [];
            for (var i = 0; i < data.length; i++) {
                if ((data[i].id1 === id1) &&
                    (data[i].id2 === id2) &&
                    (data[i].isRecovered === undefined)) {                    res.push({
                        name: 'Начислено',
                        color: getPrimaryGradient(),
                        data: data[i].data
                    });
                    break;
                }
            }
            for (i = 0; i < data.length; i++) {
                if ((data[i].id1 === id1) &&
                    (data[i].id2 === id2) &&
                    (data[i].isRecovered === true)) {                    res.push({
                        name: 'Взыскано',
                        color: getPrimaryGradient(),
                        data: data[i].data
                    });
                    break;
                }
            }
            return res;
        }        function showRating(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            var options = {
                id: 9,
                type: "columnChart",
                tabType: "combobox_double",
                dataSets: [
                    {categories: categories, series: getSeriesOne(data, 0, 0)},
                    {categories: categories, series: getSeriesOne(data, 0, 1)},
                    {categories: categories, series: getSeriesOne(data, 0, 2)},
                    {categories: categories, series: getSeriesOne(data, 0, 3)},
                    {categories: categories, series: getSeriesOne(data, 0, 4)},                    {categories: categories, series: getSeriesOne(data, 10, 0)},
                    {categories: categories, series: getSeriesOne(data, 10, 1)},
                    {categories: categories, series: getSeriesOne(data, 10, 2)},
                    {categories: categories, series: getSeriesOne(data, 10, 3)},
                    {categories: categories, series: getSeriesOne(data, 10, 4)},                    {categories: categories, series: getTwoSeries(data, 20, 0)},
                    {categories: categories, series: getTwoSeries(data, 20, 1)},
                    {categories: categories, series: getTwoSeries(data, 20, 2)},
                    {categories: categories, series: getTwoSeries(data, 20, 3)},
                    {categories: categories, series: getTwoSeries(data, 20, 4)},                    {categories: categories, series: getSeriesOne(data, 30, 0)},
                    {categories: categories, series: getSeriesOne(data, 30, 1)},
                    {categories: categories, series: getSeriesOne(data, 30, 2)},
                    {categories: categories, series: getSeriesOne(data, 30, 3)},
                    {categories: categories, series: getSeriesOne(data, 30, 4)}
                ],
                comboBox1: [
                    "По полноте данных",
                    "По нарушениям на ярмарках",
                    "По штрафам"
                ],
                comboBox2: [
                    "текущий месяц",
                    "текущий квартал",
                    "текущий год",
                    "последняя торговая сессия",
                    "последний торговый период"
                ],
                needToHideSecondComboBox: true,
                selectOnChange: function (selectedIndex, optionName) {
                    if (optionName === 'comboBox1') {
                        $('#infoBlock9 select').eq(1).css('display', selectedIndex === 0 ? 'none' : 'initial');
                    }
                }
            };            renderChart(options);            // console.log($('#infoBlock9 select').first());
            // $('#infoBlock9 select').first().change(function(event) {
            //     console.log(event.target.selectedIndex);
            // });
            // var firstSelect = $('#infoBlock9 select')[0];
        }        function showTask(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            var series = [{
                name: 'Количество',
                color: getPrimaryGradient(),
                data: data
            }];            var options = {
                id: 8,
                type: "columnChart",
                dataSets: [{categories: categories, series: series}]
            };            renderChart(options);
        }// function showMarketsStatistics(dataListLastSession, dataListMonth, dataListYear, dataListLastPeriod) {
        //     dataListLastSession = parseDataFromString(dataListLastSession);
        //     dataListMonth = parseDataFromString(dataListMonth);
        //     dataListYear = parseDataFromString(dataListYear);
        //     dataListLastPeriod = parseDataFromString(dataListLastPeriod);
        //
        //     var options = {
        //         id: 12,
        //         type: "list",
        //         tabType: "combobox",
        //         tabCaption: "Период",
        //         dataSets:[
        //             { name: "Текущий месяц", dataList:dataListMonth},
        //             { name: "Текущий год", dataList:dataListYear},
        //             { name: "Последняя торговая сессия", dataList:dataListLastSession},
        //             { name: "Последний торговый период", dataList:dataListLastPeriod}]
        //     };
        //
        //     renderChart(options);
        // }
        function showTrash(data) {
            data = parseDataFromString(data);            var total = 0;            for (var i = 0; i < data.length; i++) {
                data[i].color = data[i].color ?
                    getLinearGradient(data[i].color) :
                    getLinearGradient(pieColors[i]);                total += data[i].y;
            }
            var options = {
                id: 6,
                type: "pieChart",
                dataSets: [{
                    id: 1,
                    data: data,
                    total: total,
                    hideDataLine: true,
                    dataLabelFormat: 'onlyPercentages',
                    numbersAfterComma: 0,
                    autoItemMargin: true,
                    padding: '0 50px 0 80px'
                    // padding: '0 350px 0 280px'
                }]
            };            renderChart(options);
        }        function showNTO(data) {
            data = parseDataFromString(data);            var total = 0;
            for (var i = 0; i < data.length; i++) {
                total += data[i].y;
                data[i].color = data[i].color ?
                    getLinearGradient(data[i].color) :
                    getLinearGradient(pieColors[i]);
            }
            var options = {
                id: 10,
                type: "pieChart",
                dataSets: [{
                    id: 1,
                    total: total,
                    data: data,
                    hideDataLine: true,
                    dataLabelFormat: 'onlyValues',
                    numbersAfterComma: 0,
                    padding: '0 50px 0 80px',
                    autoItemMargin: true
                }]
            };            renderChart(options);
        }        function showSpec(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            addLinearGradientToData(data, true);            var series = [{
                name: 'Количество',
                data: data
            }];            var options = {
                id: 11,
                type: "barChart",
                dataSets: [{categories: categories, series: series}]
            };            return renderChart(options);
        }        function showEGAS(data) {
            data = parseDataFromString(data);            var getItemFromEgas = function (id, items) {
                for (var i = 0; i < items.length; i++) {
                    if (items[i].id === id) {
                        return items[i];
                    }
                }
                // default
                return {
                    id: 0,
                    name: 'не определено',
                    color: ['#BEE9FF', '#1A78E2', '#EFFF8B']
                }
            }
            item = getItemFromEgas(data.selectedItem.id, data.items);            dataPie = [
                {
                    name: 'Несоответствие',
                    y: data.selectedItem.total - data.selectedItem.y,
                    color: getLinearGradient(['#BEE9FF', '#1A78E2', '#BEE9FF'])
                },
                {
                    name: 'Соответствие',
                    y: data.selectedItem.y,
                    color: getLinearGradient(item.color)
                }
            ];            var options = {
                id: 12,
                type: "pieChartCustomLegend",
                dataSets: [{
                    total: true,
                    data: dataPie,
                    legend: data.items,
                    legendItemIndex: data.selectedItem.id,
                    hideDataLine: true,
                    dataLabelFormat: 'onlyValues',
                    numbersAfterComma: 0,
                    legendType: 'top',
                    autoItemMargin: true
                }]
            };            renderChart(options);
        }        function showStatFairs(dataSets) {
            dataSets = addGradientColumn(parseDataFromString(dataSets), true);            var options = {
                id: 13,
                type: "barChart",
                dataSets: dataSets
            };            renderChart(options);
        }        function showCountError(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);            addLinearGradientToData(data, true);            var series = [{
                name: 'Количество',
                data: data
            }];            var options = {
                id: 14,
                type: "customBarChart",
                numbersAfterComma: 0,
                dataSets: [{categories: categories, series: series}]
            };            return renderChart(options);
        }    </script>
</head>
<body>
<? // require_once 'menu.php'; ?><div class="main-content">
    <div class="main-content__selection">
        <div class="section__content">
            <div class="section__content__container">
                <!-- <table class="section__small-blocks-table">
<tbody>
<tr>
    <td class="small-data-block">
        <div class="small-data-block__header-part" id="estimated-income"></div>
        <div class="small-data-block__text-part">Планируемая сумма поступлений за месяц по договорам...</div>
        <div class="small-data-block__array">
<img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAEpSURBVGhD7Zk9CsJAEEZn19YD2Ao5h6AoxONYKVZWopVn8BQGBAvxGIJg5QFszZrZbEih5fwQmAdLkq2+N7MLm8SFCugwPl07iwloYwLamIA2JqCNCWhjAtrQCTxvUB6nccDjkib5ITtOY/DwfsV753vgZjtw2Tw+c8KyhEL5gXBeQbif0gwfZAJ+tI6Vb2glijTDA10HhpN62fxILFklSJcQrnlpCfI9IC3Bsolrib2IBIsA4rJcRIJNAJGQYBWQgFUAqxyrXVW9AbsRu1J1hwI2AYnwCIuAVHiEXEAyPEIqgIe3/+HxZEofHqH7Ol29A5TFQqzyDWQdKK9b0co3sGziNnyHXmj8eAOuP4jD5weR8Ij9odHGBLQxAW1MQBsT0MYEtDEBXQC+9sGinlaxRrQAAAAASUVORK5CYII="
        alt="">
</div>
    </td>
    <td class="section__small-blocks-table__gap"></td>
    <td class="small-data-block" id="prices_monitoring_block">
        <div class="small-data-block__header-part"><img
    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAL1JREFUSA3tVtsNgCAMBONcruNMruNiqB8lp9QGqI0vTEyxHL3eSQjOtefrDngDgUGoGfk6AWQ61RtWj+pWjsQFU8VhnsL2kjgcmxITIRdLrY7dM8XQWmZ6n3qNYmob1UkuED6J1YqljZOwMIlqYqZWUQo3l2QZWltEcAZ+hGJqDtVJLhC+KrKKtRsnpxOWOGehFtOItQ5mr29WZ1ulBeKRSbWCH0Yan0U15rZ/jIrjUYl3o4PkqzCHsn/4XABJ3TNcWlAhzAAAAABJRU5ErkJggg=="
    alt=""></div>
<div class="small-data-block__text-part">Мониторинг цен</div>
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
                        <td class="big-data-block" id="infoBlock1">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество адресов в схеме размещения
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="1"
                                                 data-height="150px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                                     style="overflow: hidden; height:150px ">                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                        <td class="big-data-block" id="infoBlock2">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Стационарные торговые объекты (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="2"
                                                 data-height="150px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_2"
                                     style="overflow: hidden; height:150px ">                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 390">
                        <td class="big-data-block" id="infoBlock3">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Торговых объектов (по округам, шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
                                                 data-height="350px"
                                                 data-height-min="300px"
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
                                     style="overflow: hidden; height:350px ">                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                        <td class="big-data-block" id="infoBlock4">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Информация по НТО (шт.)</td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="4"
                                                 data-height="350px"
                                                 data-height-min="300px"
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_4"
                                     style="overflow: hidden; height:350px ">                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 380">
                        <td class="big-data-block" id="infoBlock5" colspan="3">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Рост цен на продовольственные продукты
                                            за месяц (топ-5)(%)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_5"
                                     style="overflow: hidden; height:230px ">                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 370">
                        <td class="big-data-block" id="infoBlock6">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Наличие договоров на вывоз мусора у
                                            стационарных объектов (%)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="6"
                                                 data-height="306px"
                                                 data-height-min="250px"
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                                     style="overflow: hidden; height:306px ">                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_1">
                                    <span>перейти в отчет</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                                <td class="big-data-block" id="infoBlock7">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Штрафы по несанкционированной
                                            торговле
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="7"
                                                 data-height="250px"
                                                 data-height-min="250px"
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_7"
                                     style="overflow: hidden; height:250px ">                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_2">
                                    <span>список протоколов</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_3">
                                    <span>отчет по несанкционированной торговле</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 360">
                        <td class="big-data-block" id="infoBlock8">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Согласовано заявок МВК (шт.)</td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="8"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_8"
                                     style="overflow: hidden; height:350px ">                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                        <td class="big-data-block" id="infoBlock9">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Рейтинг префектур</td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="9"
                                                 data-height="350px"
                                                 data-height-min="300px"
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_9"
                                     style="overflow: hidden; height:350px ">                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 350">
                        <td class="big-data-block" id="infoBlock10">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Согласование схем размещения НТО при
                                            СТО (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="10"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_10"
                                     style="overflow: hidden; height:350px ">                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                        <td class="big-data-block" id="infoBlock11">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Согласовано схем размещения НТО при СТО
                                            по специализациям (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="11"
                                                 data-height="294px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_11"
                                     style="overflow: hidden; height:294px ">                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_4">
                                    <span>перейти в отчёт</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 340">
                        <td class="big-data-block" id="infoBlock12" colspan="3">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Сверка с ФНС России полноты заполнения
                                            карточек хозяйствующих субъектов в ЕГАС СИОПР (%)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="12"
                                                 data-height="354px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_12"
                                     style="overflow: hidden; height:354px ">                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_5">
                                    <span>перейти в отчёт</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>                    <tr class="section__big-blocks-table__row" style="z-index: 330">
                        <td class="big-data-block" id="infoBlock13">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Статистика по ярмаркам</td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="13"
                                                 data-height="406px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_13"
                                     style="overflow: hidden; height:406px ">                                </div>                            </div>
                        </td>
                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>
                        <td class="big-data-block" id="infoBlock14">                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество нарушений на ярмарках
                                            выходного дня (топ-5, шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="14"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_14"
                                     style="overflow: hidden; height:350px ">                                </div>                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_6">
                                    <span>перейти в отчёт</span>                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>                                </div>                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <!--    <tr class="section__big-blocks-table__row-gap"></tr>-->
                    <tr class="section__big-blocks-table__row"></tr>
                    </tbody>
                </table>                <table class="date_actual-table">
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
</body><script language="JavaScript">
    // Верхняя панель
    function showEstimatedIncomeOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getEstimatedIncomeFromServer",
            success: function (data) {
                showEstimatedIncome(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showEstimatedIncome');
            }
        });
    }// 2) Количество рабочих мест
    function showNonstaticObjectsOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getNonstaticObjectsFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showNonstaticObjects(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNonstaticObjects');
            }
        });
    }// 2) Количество рабочих мест
    function showStaticObjectsOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getStaticObjectsFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showStaticObjects(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showStaticObjects');
            }
        });
    }// 3) Торговых объектов по округам - все
    function showObjectsByDistricts_V2Online(btn) {
        var param = utf8_to_b64('btn=' + btn);        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getObjectsByDistrictsFromServer&param=" + param,
            success: function (data) {
                var JSONx;
                var datax = JSON.parse(data);
                var series = [
                    {"name": "Продовольственные", "color": "#45c0d9", "data": datax[1]},
                    {"name": "Непродовольственные", "color": "#f6c13e", "data": datax[2]},
                ];                if (btn == 'все') {
                    JSONx = [
                        {"name": "Все", "id": 0, "categories": datax[0], "series": series},
                        {"name": "Несетевые", "id": 1, "categories": datax[0]},
                        {"name": "Сетевые", "id": 2, "categories": datax[0]}
                    ];
                } else if (btn == 'несетевые') {
                    JSONx = [
                        {"name": "Все", "id": 0, "categories": datax[0]},
                        {"name": "Несетевые", "id": 1, "categories": datax[0], "series": series},
                        {"name": "Сетевые", "id": 2, "categories": datax[0]}
                    ];
                } else if (btn == 'сетевые') {
                    JSONx = [
                        {"name": "Все", "id": 0, "categories": datax[0]},
                        {"name": "Несетевые", "id": 1, "categories": datax[0]},
                        {"name": "Сетевые", "id": 2, "categories": datax[0], "series": series}
                    ];
                }
                showObjectsByDistricts_V2(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showObjectsByDistricts_V2');
            }
        });
    }//4) Информация по НТО
    function showMainDeptOnline() {
        let datax = "";
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getMainDeptFromServer",
            success: function (data) {
                datax = JSON.parse(data);
                showMainDept(datax[0], datax[1], datax[2]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showMainDept');
            }
        });
    }// 5) Рост цен на продовольственные продукты за месяц (топ 5) (новое)
    function showPricesTop5Online() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getPricesTop5V2FromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                let newData = JSON.parse(datax[1]);
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#1A78E2', '#40B3EE']
                    } else {
                        newData[i].color = ["#28C75E", "#D1FFAC"]
                    }
                }
                let json = JSON.stringify(newData)
                showPricesTop5(datax[0], newData);
            },
            error: function () {
                alert('Ошибка получения данных для функции showPricesTop5');
            }
        });
    }// 6) Наличие договоров на вывоз мусора у стационарных объектов (новое)
    function showTrashOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getTrashFromServer",
            success: function (data) {
                let newData = JSON.parse(data);
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#1A78E2', '#40B3EE']
                    } else {
                        newData[i].color = ["#28C75E", "#D1FFAC"]
                    }
                }
                let json = JSON.stringify(newData);
                showTrash(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showTrash');
            }
        });
    }// 7) Штрафы по несанкционированной торговле
    function showFines_V2Online(period, index) {
        var param = utf8_to_b64('period=' + period);        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getFinesFromServer&param=" + param,
            success: function (data) {
                var datax = JSON.parse(data);                var series = [
                    {"name": "шт.", "id": 1, "color": "#1A78E2"},
                    {"name": "руб.", "id": 2, "color": "#1A78E2"}
                ];
                var JSONx = [
                    {"name": "Месяц", "id": 0, "categories": ["Наложенных", "Взысканных", "Неоплаченных"]},
                    {"name": "Квартал", "id": 1, "categories": ["Наложенных", "Взысканных", "Неоплаченных"]},
                    {"name": "Год", "id": 2, "categories": ["Наложенных", "Взысканных", "Неоплаченных"]}
                ];                if (index == 'шт.') {
                    series[0].data = datax[0];
                } else if (index == 'руб.') {
                    series[1].data = datax[1];
                }                if (period == 'Месяц') {
                    JSONx[0].sections = series;
                } else if (period == 'Квартал') {
                    JSONx[1].sections = series;
                } else if (period == 'Год') {
                    JSONx[2].sections = series;
                }
                showFines_V2(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showFines_V2');
            }
        });
    }// 8) Согласовано заявок на МВК
    function showTaskOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getAcceptedRequestsFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showTask(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showTask');
            }
        });
    }// 9) Рейтинг префектур(изменено, убран идентификатор id1 = 30)
    function showRatingOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getRatingFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showRating(datax.categories, datax.data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showRating');
            }
        });
    }// 10) Согласование схем размещения НТО при СТО
    function showNTOOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getNTOFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#1A78E2', '#40B3EE']
                    } else {
                        newData[i].color = ["#28C75E", "#D1FFAC"]
                    }
                }
                let json = JSON.stringify(newData)
                showNTO(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNTO');
            }
        });
    }// 11) Согласовано по специализациям
    function showSpecOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getSpecializationsFromServer",
            success: function (data) {                var datax = JSON.parse(data);
                let newData = JSON.parse(datax[1])
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData[i].color = ["#1A78E2", "#40B3EE"]
                    }
                }                let json = JSON.stringify(newData)
                showSpec(datax[0], json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showSpec');
            }
        });
    }//12) Сверка с ФНС России полноты заполнения карточек хозяйствующих субъектов в ЕГАС СИОПР (новое)  - chartButton_12_1
    function showEGASOnline(btn) {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getEGASFromServer",
            success: function (data) {
                var JSONx;
                var datax = JSON.parse(data);                var nameArr = ["ФИО Руководителя", "Статус 'Действует'", "ОКПФ", "КПП", "ОГРН", "ИНН", "Наименование хозяйствующего субъекта"];
                var collorsArr = [                    ["#1A78E2", "#1A78E2", "#1A78E2"],
                    ["#D1FFAC", "#28C75E", "#D1FFAC"],
                    ["#40B3EE", "#1A78E2", "#40B3EE"],
                    ["#D1FFAC", "#28C75E", "#D1FFAC"],                ];
                var items = [];
                for (var i = 1; i < datax.length; i++) {
                    items[i - 1] = {"id": i, "name": nameArr[i - 1], "color": collorsArr[i - 1]};
                }                var id = btn.substr(btn.length - 1);
                var selectedItem = {
                    "id": id,
                    "y": datax[datax.length - 1] - datax[id - 1],
                    "total": datax[datax.length - 1]
                };
                JSONx = {"items": items, "selectedItem": selectedItem};
                showEGAS(JSONx);            },
            error: function () {
                alert('Ошибка получения данных для функции showEGAS');
            }
        });
    }// 13) Статистика по ярмаркам(новое)   - chartButton13_0
    function showStatFairsOnline(btn) {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getStatFairsFromServer",
            success: function (data) {
                var JSONx;
                var datax = JSON.parse(data);
                var categories = datax[0];
                var places = datax[1];
                var percentage = datax[2];
                var series = [];                if (btn == 'chartButton13_0') {
                    series = [{"id": 13, "name": "", "data": places}];
                    JSONx = [{"name": "Шт.", "id": 1, "categories": categories, "series": series},
                        {"name": "%", "id": 2, "categories": categories}];
                } else if (btn == 'chartButton13_1') {
                    series = [{"id": 13, "name": "", "data": percentage}];
                    JSONx = [{"name": "Шт.", "id": 1, "categories": categories},
                        {"name": "%", "id": 2, "categories": categories, "series": series}];
                }
                showStatFairs(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showStatFairs');
            }
        });
    }// 14) Количество нарушений на ярмарках выходного дня (топ 5)
    function showCountErrorOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getCountErrorFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showCountError(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showCountError');
            }
        });
    }// Установка даты актуальности
    function setActualDateOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Rukovodstvo&func=getActualDate",
            success: function (data) {
                setActualDate(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции setActualDate');
            }
        });
    }    function utf8_to_b64(str) {
        return window.btoa(unescape(encodeURIComponent(str)));
    }
    $(document).ready(function () {
        attachButtonsEventPerformers();
        var period = "Квартал";
        var index = "шт.";
        showEstimatedIncomeOnline();
        showNonstaticObjectsOnline();
        showStaticObjectsOnline();
        showObjectsByDistricts_V2Online("все");
        showMainDeptOnline();
        showPricesTop5Online();
        showTrashOnline();
        showFines_V2Online(period, index);
        showTaskOnline();
        showRatingOnline();
        showNTOOnline();
        showSpecOnline();
        showEGASOnline("chartButton_12_1");
        showStatFairsOnline("chartButton13_0");
        showCountErrorOnline();
        setActualDateOnline();
        $(document).on('click', '#chart_3 #dataSet0', function (event) {
            showObjectsByDistricts_V2Online("все");
        })
        $(document).on('click', '#chart_3 #dataSet1', function (event) {
            showObjectsByDistricts_V2Online("несетевые");
        })
        $(document).on('click', '#chart_3 #dataSet2', function (event) {
            showObjectsByDistricts_V2Online("сетевые");
        });
        $(document).on('click', '#chart_7 .big-data-block__data-set-switcher__button, #chart_7 .big-data-block__section-switcher__button', function (event) {
            setTimeout(function () {
                var newPeriod = $('#chart_7 .big-data-block__data-set-switcher__button_selected').text();
                var newIndex = $('#chart_7 .big-data-block__data-set-switcher-section__button_selected').text();
                showFines_V2Online(newPeriod, newIndex);
            }, 500);
        });        $(document).on('click', '#chart_13 #dataSet0', function (event) {
            showStatFairsOnline("chartButton13_0");
        })
        $(document).on('click', '#chart_13 #dataSet1', function (event) {
            showStatFairsOnline("chartButton13_1");
        })
    });
</script></html>