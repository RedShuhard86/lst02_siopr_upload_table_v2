<!doctype html>
<html>
<head>
    <title>Ярмарки выходного дня</title>
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
        function attachSectionSwitcherAction(td, tr, options) {
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
        }
        function attachDataSetsSwitcherAction(td, options) {
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
        }
        function addTabs(parent, options, switcherIndex) {
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
        }
        function appendSectionsTab(parent, options, dataSetIndex, sectionIndex) {
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
        }
        function addTabCaption(parent, options) {
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
            }
            select.selectedIndex = switcherIndex;
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
        }
        function addComboBoxByArray(parent, options, switcherIndex, optionName) {
            var td = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";
            for (var i = 0; i < options[optionName].length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.id = i;
                option.innerText = options[optionName][i];
                select.appendChild(option);
            }
            select.selectedIndex = optionName === 'comboBox1' ? switcherIndex[0] : switcherIndex[1];
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
        }
        function addDataSetsSwitcher(parent, options, dataSetIndex, dataSetIndex2, sectionIndex, showLegend, h) {
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
            table.appendChild(tbody);
            var mainSwitcherCell = document.createElement("td");
            mainSwitcherCell.className = "big-data-block__sections-switcher_td-first";
            mainSwitcherCell.appendChild(table);
            switcherRow.appendChild(mainSwitcherCell);
            if (showLegend) {
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
        }
        function showDataFullness(percent) {
            var percentContainer = document.getElementById('data-fullness');
            percentContainer.innerText = percent + '%';
        }
        function showMarketsFullness(percent) {
            var percentContainer = document.getElementById('markets-fullness');
            percentContainer.innerText = percent + '%';
        }
        function showRequestsCount(count) {
            var percentContainer = document.getElementById('requests-count');
            percentContainer.innerText = count;
        }
        function showFirstRequest(dataSet) {
            dataSet = parseDataFromString(dataSet);
            var defColors = [
                '#ff7676',
                '#1ee8a8',
                '#6c9bf2',
                '#0369c6'
            ];
            var total = 0;
            for (var i = 0, colorsCounter = 0, colorIndex = 0; i < dataSet.length; ++i) {
                total += +dataSet[i].y;
                if (colorsCounter < defColors.length) {
                    dataSet[i].color = dataSet[i].color ? dataSet[i].color : defColors[colorIndex];
                    ++colorIndex;
                    ++colorsCounter;
                    if (colorIndex === defColors.length) {
                        colorIndex = 0;
                    }
                }
                if (dataSet[i].color) {
                    dataSet[i].color = getLinearGradient([dataSet[i].color]);
                }
            }
            var options = {
                id: 1,
                type: "pieChart",
                dataSets: [
                    {
                        id: 1,
                        data: dataSet,
                        total: total,
                        hideDataLine: true,
                        numbersAfterComma: 0,
                        dataLabelFormat: 'onlyValues',
                        padding: '0 150px 0 80px',
                        autoItemMargin: true
                    }
                ]
            };
            renderChart(options);
        }
        function showViolationsV2(dataSet) {
            dataSet = parseDataFromString(dataSet);
            for (var i = 0; i < dataSet.data.length; ++i) {
                if (dataSet.data[i].colors) {
                    dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                    dataSet.data[i].colors = undefined;
                } else {
                    dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                }
            }
            var series = [{
                name: 'Количество',
                data: dataSet.data
            }];
            var options = {
                id: 2,
                type: "barChart",
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }
        function showFullnessTop(dataSets) {
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
                    }
                    series = [{
                        name: dataSet.seriesName ? dataSet.seriesName : 'Количество',
                        data: dataSet.data
                    }];
                } else {
                    series = undefined;
                }
                finalDataSets.push({name: dataSet.tabName, categories: dataSet.categories, series: series});
            }
            var options = {
                id: 3,
                type: "barChart",
                dataSets: finalDataSets
            };
            renderChart(options);
        }
        function showDistrictRequest(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);
            var series = [{
                name: 'Количество',
                color: getPrimaryGradient(),
                data: data
            }];
            var options = {
                id: 5,
                type: "columnChart",
                dataSets: [{categories: categories, series: series}]
            };
            renderChart(options);
        }
        function showDistrictViolationsV2(dataSets) {
            dataSets = parseDataFromString(dataSets);
            var finalDataSets = [];
            for (var i = 0; i < dataSets.length; ++i) {
                dataSet = dataSets[i];
                var series;
                if (dataSet.data) {
                    series = [{
                        name: dataSet.seriesName ? dataSet.seriesName : 'Количество',
                        color: getPrimaryGradient(),
                        data: dataSet.data
                    }];
                } else {
                    series = undefined;
                }
                finalDataSets.push({name: dataSet.tabName, categories: dataSet.categories, series: series});
            }
            var options = {
                id: 6,
                type: "columnChart",
                dataSets: finalDataSets
            };
            renderChart(options);
        }
        function showSatisfiedRequestsV2(dataSet) {
            dataSet = parseDataFromString(dataSet);
            for (var i = 0; i < dataSet.data.length; ++i) {
                if (dataSet.data[i].colors) {
                    dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                    dataSet.data[i].colors = undefined;
                } else {
                    dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                }
            }
            var series = [{
                name: 'Количество',
                data: dataSet.data
            }];
            var options = {
                id: 7,
                type: "barChart",
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }
        function showViolationsAtFairs(dataSet) {
            dataSet = parseDataFromString(dataSet);
            for (var i = 0; i < dataSet.data.length; ++i) {
                if (dataSet.data[i].colors) {
                    dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                    dataSet.data[i].colors = undefined;
                } else {
                    dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                }
            }
            var series = [{
                name: 'Количество',
                data: dataSet.data
            }];
            var options = {
                id: 8,
                type: "barChart",
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }
        function showViolationsTop(dataSet) {
            dataSet = parseDataFromString(dataSet);
            for (var i = 0; i < dataSet.data.length; ++i) {
                if (dataSet.data[i].colors) {
                    dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                    dataSet.data[i].colors = undefined;
                } else {
                    dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                }
            }
            var series = [{
                name: 'Количество',
                data: dataSet.data
            }];
            var options = {
                id: 4,
                type: "barChart",
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }// Устарел
        function showSatisfiedRequests(dataList) {
            dataList = parseDataFromString(dataList);
            var options = {
                id: 1,
                type: "list",
                dataSets: [{dataList: dataList}]
            };
            renderChart(options);
        };
        // Устарел
        function showViolations(dataList) {
            dataList = parseDataFromString(dataList);
            var options = {
                id: 2,
                type: "list",
                dataSets: [{dataList: dataList}]
            };
            renderChart(options);
        }// Тестовый (не работает)
        function showViolationsTest(dataSet) {
            dataSet = parseDataFromString(dataSet);
            var finalDataSet = [];
            for (var j = 0; j < dataSet.length; ++j) {
                for (var i = 0; i < dataSet[j].data.length; ++i) {
                    if (dataSet[j].data[i].colors) {
                        dataSet[j].data[i].color = getSimpleGradient(true, dataSet[j].data[i].colors);
                        dataSet[j].data[i].colors = undefined;
                    } else {
                        dataSet[j].data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                    }
                }
                var series = [{
                    name: 'Количество',
                    data: dataSet[j].data
                }];
                finalDataSet.push({
                    name: dataSet[j].name,
                    height: j === 0 ? '75px' : '200px',
                    categories: dataSet[j].categories,
                    series: series
                });
            }
            var options = {
                id: 2,
                type: "multiBarChart",
                dataSets: [finalDataSet]
            };
            renderChart(options);
        }// Устарел
        function showFullness(dataList) {
            dataList = parseDataFromString(dataList);
            var options = {
                id: 3,
                type: "list",
                dataSets: [{dataList: dataList}]
            };
            renderChart(options);
        }// Устарел
        function showDistrictViolations(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);
            var series = [{
                name: 'Количество',
                color: getPrimaryGradient(),
                data: data
            }];
            var options = {
                id: 6,
                type: "columnChart",
                dataSets: [{categories: categories, series: series}]
            };
            renderChart(options);
        }// Устарел
        function showTop5(dataList) {
            dataList = parseDataFromString(dataList);
            var options = {
                id: 4,
                type: "list",
                dataSets: [{dataList: dataList}]
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
                        <td class="big-data-block" id="infoBlock1">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Первая заявочная (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="1"
                                                 data-height="356px"
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
                                     style="overflow: hidden; height:356px ">
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
                                        <td class="big-data-block__header__text">Статистика по нарушениям (шт.)</td>
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
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_1">
                                    <span>подробно</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 390">

                        <td class="big-data-block" id="infoBlock3">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Топ-5 ярмарок по заполняемости
                                            участниками
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
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
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
                                     style="overflow: hidden; height:300px ">
                                </div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_2">
                                    <span>подробно</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>

                        <td class="big-data-block" id="infoBlock4">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество нарушений на ярмарках
                                            выходного дня (топ-5, шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="4"
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
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_4"
                                     style="overflow: hidden; height:300px ">
                                </div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_3">
                                    <span>перейти в отчёт</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 380">

                        <td class="big-data-block" id="infoBlock5">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество заявок по округам (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="5"
                                                 data-height="456px"
                                                 data-height-min="350px"
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_5"
                                     style="overflow: hidden; height:456px ">
                                </div>
                            </div>
                        </td>

                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>

                        <td class="big-data-block" id="infoBlock6">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество нарушений на ярмарках по
                                            округам
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="6"
                                                 data-height="400px"
                                                 data-height-min="350px"
                                                 class="resize-btn"
                                            >

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                                     style="overflow: hidden; height:400px ">
                                </div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_4">
                                    <span>подробно</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                                </div>
                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 370">

                        <td class="big-data-block" id="infoBlock7">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество удовлетворенных заявок
                                            (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="7"
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
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_7"
                                     style="overflow: hidden; height:200px ">
                                </div>
                            </div>
                        </td>

                        <td class="section__big-blocks-table__gap">
                            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
                            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
                        </td>

                        <td class="big-data-block" id="infoBlock8">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Нарушения на ярмарках (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="8"
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
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_8"
                                     style="overflow: hidden; height:200px ">
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
            data: "wp=YArmarkiVyhodnogoDnya&func=getDataFullnessFromServer",
            success: function (data) {
                showDataFullness(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showDataFullness');
            }
        });
    }
    function showMarketsFullnessOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getMarketsFullnessFromServer",
            success: function (data) {
                showMarketsFullness(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showMarketsFullness');
            }
        });
    }
    function showRequestsCountOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getRequestsCountFromServer",
            success: function (data) {
                showRequestsCount(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showRequestsCount');
            }
        });
    }
    function showFirstRequestOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getFirstRequestFromServer",
            success: function (data) {
                showFirstRequest(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showFirstRequest');
            }
        });
    }
    function showViolationsV2Online() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getViolationsV2FromServer",
            success: function (data) {
                showViolationsV2(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showViolationsV2');
            }
        });
    }//showFullnessTop(BrowserWindow, "chartButton3_0", Ложь);
    function showFullnessTopOnline(btn) {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getFullnessTopFromServer",
            success: function (data) {
                var JSONx;
                var datax = JSON.parse(data);
                if (btn == 'chartButton3_0') {
                    JSONx = [{
                        "tabName": "Мест",
                        "seriesName": "Шт.",
                        "categories": datax[0],
                        "data": datax[2]
                    }, {"tabName": "%"}];
                } else if (btn == 'chartButton3_1') {
                    JSONx = [{"tabName": "Мест"}, {
                        "tabName": "%",
                        "seriesName": "Процент",
                        "categories": datax[0],
                        "data": datax[1]
                    }];
                }
                showFullnessTop(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showFullnessTop');
            }
        });
    }
    function showViolationsTopOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getViolationsTopFromServer",
            success: function (data) {
                showViolationsTop(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showViolationsTop');
            }
        });
    }
    function showDistrictRequestOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getDistrictRequestFromServer",
            success: function (data) {
                var datax = JSON.parse(data);
                showDistrictRequest(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showDistrictRequest');
            }
        });
    }//showDistrictViolationsV2(BrowserWindow, "chartButton6_0", Ложь);
    function showDistrictViolationsV2Online(btn) {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getDistrictViolationsV2FromServer",
            success: function (data) {
                var JSONx;
                var datax = JSON.parse(data);
                if (btn == 'chartButton6_0') {
                    JSONx = [{
                        "tabName": "Шт.",
                        "seriesName": "Шт.",
                        "categories": datax[0],
                        "data": datax[1]
                    }, {"tabName": "%"}];
                } else if (btn == 'chartButton6_1') {
                    JSONx = [{"tabName": "Шт."}, {
                        "tabName": "%.",
                        "seriesName": "Процент",
                        "categories": datax[0],
                        "data": datax[2]
                    }];
                }
                showDistrictViolationsV2(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showDistrictViolationsV2');
            }
        });
    }
    function showSatisfiedRequestsV2Online() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getSatisfiedRequestsV2FromServer",
            success: function (data) {
                showSatisfiedRequestsV2(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showSatisfiedRequestsV2');
            }
        });
    }
    function showViolationsAtFairsOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getViolationsAtFairsFromServer",
            success: function (data) {
                showViolationsAtFairs(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showViolationsAtFairs');
            }
        });
    }
    function setActualDateOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya&func=getActualDate",
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
        showMarketsFullnessOnline();
        showRequestsCountOnline();
        showFirstRequestOnline();
        showViolationsV2Online();
        showFullnessTopOnline("chartButton3_0");
        showViolationsTopOnline();
        showDistrictRequestOnline();
        showDistrictViolationsV2Online("chartButton6_0");
        showSatisfiedRequestsV2Online();
        showViolationsAtFairsOnline();
        setActualDateOnline();
        $(document).on('click', '#infoBlock3 #dataSet0', function (event) {
            showFullnessTopOnline("chartButton3_0");
        })
        $(document).on('click', '#infoBlock3 #dataSet1', function (event) {
            showFullnessTopOnline("chartButton3_1");
        })
        $(document).on('click', '#chart_6 #dataSet0', function (event) {
            showDistrictViolationsV2Online("chartButton6_0");
        })
        $(document).on('click', '#chart_6 #dataSet1', function (event) {
            showDistrictViolationsV2Online("chartButton6_1");
        })
    });
</script>
</html>
