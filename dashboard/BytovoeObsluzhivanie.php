<!DOCTYPE html>
<html>
<head>


    <title>Бытовое обслуживание</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>
    <script>
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
                            options.numbersAfterComma, '.', ' ');

                        return '<span style="color:' + this.point.color +
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
        }

        function drawCustomBarChart(container, options, dataSetIndex) {
            var max = 0;
            var categories = options.dataSets[dataSetIndex].categories;
            var series = options.dataSets[dataSetIndex].series;
            var data = series[0].data;
            var height = 10;

            for (i = 0; i < data.length; i++) {
                if (data[i].y > max) {
                    max = data[i].y;
                }
                data[i].y = jQuery.parseJSON(data[i].y.toFixed(2));
            }
            max = max * 1.1;

            if (options.altNameStyle) {
                var maxLength = 0;

                for (var i = 0; i < categories.length; i++) {
                    if (categories[i].length > maxLength) {
                        maxLength = categories[i].length;
                    }
                    if (options.subTitles && options.subTitles[i]) {
                        height += 36;
                    }
                }
                for (var i = 0; i < categories.length; i++) {
                    if (options.subTitles && options.subTitles[i]) {
                        var newDivSubTitle = document.createElement("div");

                        newDivSubTitle.innerText = options.subTitles[i];
                        newDivSubTitle.className = 'custom-bar-chart-subtitle';

                        newDivSubTitle.style.fontSize = '14px';
                        newDivSubTitle.style.fontFamily = 'Arial';
                        newDivSubTitle.style.padding = '10px 0';
                        newDivSubTitle.style.paddingLeft = '14px';

                        container.appendChild(newDivSubTitle);
                    }
                    var newDivData = document.createElement("div");

                    $(newDivData).css("padding-left", '14px');
                    $(newDivData).css("height", (container.offsetHeight - height) / categories.length);

                    container.appendChild(newDivData);

                    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);

                    var newSeries = [{
                        name: series[0].name,
                        data: [data[i]]
                    }];

                    options._marginLeft = maxLength * 10;
                    drawSingleColumnChartHorizontal(newDivData, categories[i], true, newSeries, i, max, options);

                    // Фикс (костыль) смещения влево для customBarChart, так как горизонтальные столбцы не связаны между собой
                    // Такой фикс из-за ie5
                    setTimeout(function () {
                        $(container).find('div > .highcharts-axis-labels.highcharts-xaxis-labels > span').css('left', '0');
                    }, 0);
                }
            } else {
                height += categories.length * 16;

                for (var i = 0; i < categories.length; ++i) {
                    if (options.subTitles && options.subTitles[i]) {
                        height += 36;
                    }
                }
                for (var i = 0; i < categories.length; ++i) {
                    if (options.subTitles && options.subTitles[i]) {
                        var newDivSubTitle = document.createElement("div");

                        newDivSubTitle.innerText = options.subTitles[i];
                        newDivSubTitle.className = 'custom-bar-chart-subtitle';

                        newDivSubTitle.style.fontSize = '14px';
                        newDivSubTitle.style.fontFamily = 'Arial';
                        newDivSubTitle.style.padding = '10px 0';
                        newDivSubTitle.style.paddingLeft = '24px';

                        container.appendChild(newDivSubTitle);
                    }
                    var newDivLabel = document.createElement("div");

                    newDivLabel.innerText = categories[i];
                    $(newDivLabel).css("color", '#000000');
                    $(newDivLabel).css("font-size", '14px');
                    $(newDivLabel).css("padding-left", '24px');
                    $(newDivLabel).css("font-family", 'robotoregular');
                    $(newDivLabel).css("font-family", 'Arial');

                    if (i === 0 && (options.subTitles && !options.subTitles[0] || !options.subTitles)) {
                        $(newDivLabel).css("padding-top", '20px');

                        height += 20;
                    }
                    container.appendChild(newDivLabel);

                    var newDivData = document.createElement("div");

                    $(newDivData).css("padding-left", '14px');
                    $(newDivData).css("height", (container.offsetHeight - height) / categories.length);

                    container.appendChild(newDivData);

                    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);

                    var newSeries = [{
                        name: series[0].name,
                        data: [data[i]]
                    }];

                    drawSingleColumnChartHorizontal(newDivData, categories[i], false, newSeries, i, max, options);
                }
            }
        }

        function drawPieChart(container, pieData) {
            var calcPieTotal = function () {
                var total = 0;

                for (var i = 0; i < pieData.data.length; ++i) {
                    if (pieData._legendState[i]) {
                        total += pieData.data[i].y;
                    }
                }

                pieData.title = Highcharts.numberFormat(customRound(total, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ');
            };

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

        var pieColors = [
            ['#10afbf', '#20dbe5', '#0da7b8'],
            ['#3cda50', '#1ee8a8', '#36dd61'],
            ['#ffb65b', '#ffdc2a', '#ffbe51'],
            ['#079773', '#0ecfaf', '#068f6a'],
            ['#8b68ff', '#7488ed', '#866efb'],
            ['#bb1d31', '#dc3655', '#b6192b'],
            ['#ff557e', '#ff7676', '#ff4283'],
            ['#ff7132', '#fcb255', '#fe803b'],
            ['#c44b73', '#e3669c', '#c44b73'],
            ['#015442', '#015442', '#015442'],
            ['#473873', '#9480c2', '#473873'],
            ['#d1a269', '#ebc075', '#d1a269'],
            ['#13acd1', '#2bd6ea', '#13acd1'],
            ['#91ba29', '#c6e053', '#91ba29'],
            ['#80133d', '#d13282', '#80133d'],
            ['#ed6f64', '#f79c8f', '#ed6f64'],
            ['#8c4580', '#bf6bb4', '#8c4580'],
            ['#eb1a40', '#f66c85', '#eb1a40'],
            ['#b6192b', '#dc3655', '#b6192b']
        ];

        function showDataFullness(percent) {
            var percentContainer = document.getElementById('data-fullness');
            percentContainer.innerText = percent + '%';
        }

        function showNumberOfWorkplaces(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);

            data = [{
                y: data[0],
                color: getSecondaryGradient(true)
            },
                {
                    y: data[1],
                    color: getPrimaryGradient(true)
                }];

            var series = [{
                name: 'Количество',
                data: data
            }];

            var options = {
                id: 1,
                type: "barChart",
                dataSets: [{categories: categories, series: series}]
            };

            return renderChart(options);
        }// function showAccommodationForTheDisabled(dataList) {
        //     dataList = parseDataFromString(dataList);
        //
        //     var options = {
        //         id: 2,
        //         type: "list",
        //         dataSets:[{dataList: dataList}]
        //     };
        //
        //     return renderChart(options, [0], 3);
        // }
        function showObjectsCountAll(categories, dataAll, dataNew, dataDeleted) {
            categories = parseDataFromString(categories);
            dataAll = parseDataFromString(dataAll);
            dataNew = parseDataFromString(dataNew);
            dataDeleted = parseDataFromString(dataDeleted);

            var seriesAll = [{
                name: 'Количество',
                color: getTurquoiseColor(),
                data: dataAll
            }];

            var seriesNew = [{
                name: 'Количество',
                color: getOrangeColor(),
                data: dataNew
            }];

            var seriesDeleted = [{
                name: 'Количество',
                color: getYellowColor(),
                data: dataDeleted
            }];

            var options = {
                id: 3,
                type: "columnChart",
                dataSets: [
                    {name: "Все", id: 1, categories: categories, series: seriesAll},
                    {name: "Новые", id: 2, categories: categories, series: seriesNew},
                    {name: "Удалённые", id: 3, categories: categories, series: seriesDeleted}
                ]
            };

            showObjectsCountAll2(categories, dataAll, dataNew, dataDeleted);
            return renderChart(options);
        }

        function showObjectsCountAll2(categories, dataAll, dataNew, dataDeleted) {
            categories = parseDataFromString(categories);
            dataAll = parseDataFromString(dataAll);
            dataNew = parseDataFromString(dataNew);
            dataDeleted = parseDataFromString(dataDeleted);

            var seriesAll = [{
                name: 'Количество',
                color: getTurquoiseColor(),
                data: dataAll
            }];

            var seriesNewDel = [{
                name: 'Количество',
                color: getOrangeColor(),
                data: dataNew
            },
                {
                    name: 'Количество',
                    color: getYellowColor(),
                    data: dataDeleted
                }];

            var options = {
                id: 4,
                type: "columnChart",
                showLegend: true,
                dataSets: [
                    {name: "Все", id: 1, categories: categories, series: seriesAll},
                    {name: "Новые/Удалённые", id: 2, categories: categories, series: seriesNewDel}
                ]
            };

            return renderChart(options);
        }

        function showObjectsCountAll_V2(dataSets) {
            dataSets = addGradientColumn(parseDataFromString(dataSets));

            var options = {
                id: 3,
                type: "columnChart",
                showLegend: !!dataSets[2].series,
                dataSets: dataSets
            };

            return renderChart(options);
        }// function showObjectsCountAll2_V2(dataSets) {
        //     dataSets = addGradientColumn(parseDataFromString(dataSets));
        //
        //     var options = {
        //         id: 4,
        //         type: "columnChart",
        //         showLegend: true,
        //         dataSets: dataSets
        //     };
        //
        //     return renderChart(options);
        // }
        function showPie(dataList) {
            dataList = parseDataFromString(dataList);

            var total = 0;
            for (var i = 0; i < dataList.length; i++) {
                total += dataList[i].y;
                dataList[i].color = dataList[i].color ?
                    getLinearGradient(dataList[i].color) :
                    getLinearGradient(pieColors[i]);
            }
            var options = {
                id: 2,
                type: "pieChart",
                dataSets: [{
                    id: 1,
                    total: total,
                    data: dataList,
                    hideDataLine: true,
                    dataLabelFormat: 'onlyValues',
                    numbersAfterComma: 0,
                    autoItemMargin: true
                }]
            };

            renderChart(options);
        }

        function showAveragePrices(categories, data) {
            categories = parseDataFromString(categories);
            data = parseDataFromString(data);

            addLinearGradientToData(data, true);

            var options = {
                id: 4,
                type: "customBarChart",
                dataSets: [{
                    id: 1,
                    categories: categories,
                    series: [{name: 'Количество', data: data}]
                }]
            };

            renderChart(options);
        }    </script>
</head>
<body>
<?// require_once 'menu.php'; ?>

<div class="main-content">
    <div class="main-content__selection">

        <div class="section__content">
            <div class="section__content__container">
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


                        <td class="big-data-block" id="infoBlock1" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество рабочих мест в сфере
                                            бытового обслуживания (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                                     style="overflow: hidden; height:227px ">

                                </div>

                            </div>
                        </td>


                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <tr class="section__big-blocks-table__row" style="z-index: 390">


                        <td class="big-data-block" id="infoBlock2" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Общее количество объектов, (шт.)</td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="2"
                                                 data-height="300px"
                                                 data-height-min="409px"
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
                                    <span>посмотреть по округам</span>

                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>

                                </div>

                            </div>
                        </td>


                    <tr class="section__big-blocks-table__row-gap"></tr>

                    <tr class="section__big-blocks-table__row" style="z-index: 380">


                        <td class="big-data-block" id="infoBlock3" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Количество объектов по округам (шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
                                                 data-height="450px"
                                                 data-height-min="409px"
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

                    <tr class="section__big-blocks-table__row" style="z-index: 370">


                        <td class="big-data-block" id="infoBlock4" colspan="3">

                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Средние цены на оказываемые бытовые
                                            услуги (руб.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_4"
                                     style="overflow: hidden; height:670px ">

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

    // 1) Верхняя панель
    function showDataFullnessOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getDataFullnessFromServer",
            success: function (data) {
                showDataFullness(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showDataFullness');
            }
        });
    }// 2) Количество рабочих мест
    function showNumberOfWorkplacesOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getNumberOfWorkplacesFromServer",
            success: function (data) {


                var datax = JSON.parse(data);
                showNumberOfWorkplaces(datax[0], datax[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showNumberOfWorkplaces');
            }
        });
    }// 3)Общее количество объектов, (шт.) (новое)
    function showPieOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getPieFromServer",
            success: function (data) {
                let newData = JSON.parse(data);
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].color = ['#EFFF8B', '#CCF136']
                    } else {
                        newData[i].color = ["#1A78E2", "#40B3EE"]
                    }
                }
                let json = JSON.stringify(newData);
                showPie(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showPie');
            }
        });
    }// 4) Количество объектов по округам
    function showObjectsCountAll_V2Online(btn) {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getNObjectsCountAllFromServer",
            success: function (data) {


                var JSONx;
                var datax = JSON.parse(data);


                if (btn == 'chartButton3_0') {
                    JSONx = [
                        {
                            "name": "Новые",
                            "id": 0,
                            "categories": datax[0],
                            "series": [{"name": "Новые", "data": datax[2]}]
                        },
                        {"name": "Удалённые", "id": 1, "categories": datax[0]},
                        {"name": "Новые/Удалённые", "id": 2, "categories": datax[0]}
                    ];
                } else if (btn == 'chartButton3_1') {
                    JSONx = [
                        {"name": "Новые", "id": 0, "categories": datax[0]},
                        {
                            "name": "Удалённые",
                            "id": 1,
                            "categories": datax[0],
                            "series": [{"name": "Удалённые", "data": datax[3]}]
                        },
                        {"name": "Новые/Удалённые", "id": 2, "categories": datax[0]}
                    ];
                } else if (btn == 'chartButton3_2') {
                    JSONx = [
                        {"name": "Новые", "id": 0, "categories": datax[0]},
                        {"name": "Удалённые", "id": 1, "categories": datax[0]},
                        {
                            "name": "Новые/Удалённые",
                            "id": 2,
                            "categories": datax[0],
                            "series": [{"name": "Новые", "data": datax[2]}, {"name": "Удалённые", "data": datax[3]}]
                        }
                    ];
                }
                showObjectsCountAll_V2(JSONx);
            },
            error: function () {
                alert('Ошибка получения данных для функции showObjectsCountAll_V2');
            }
        });
    }// 4) Средние цены на оказываемые бытовые услуги (руб.) (новое)
    function showAveragePricesOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getAveragePricesFromServer",
            success: function (data) {

                let newData = JSON.parse(data);

                for (let i = 0; i < newData[1].length; i++) {

                    if (newData[1][i].color) {

                        if (i % 2 == 0) {
                            newData[1][i].color = ['#EFFF8B', '#CCF136']
                        } else {
                            newData[1][i].color = ["#1A78E2", "#40B3EE"]

                        }
                    }


                }
                //    let json = JSON.stringify(newData)

                showAveragePrices(newData[0], newData[1]);
            },
            error: function () {
                alert('Ошибка получения данных для функции showAveragePrices');
            }
        });
    }// Установка даты актуальности
    function setActualDateOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=BytovoeObsluzhivanie&func=getActualDate",
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
        showNumberOfWorkplacesOnline();
        showPieOnline();
        showObjectsCountAll_V2Online('chartButton3_0');
        showAveragePricesOnline();
        setActualDateOnline();

        $(document).on('click', '#chart_3 #dataSet0', function (event) {
            showObjectsCountAll_V2Online("chartButton3_0");
        });
        $(document).on('click', '#chart_3 #dataSet1', function (event) {
            showObjectsCountAll_V2Online("chartButton3_1");
        });
        $(document).on('click', '#chart_3 #dataSet2', function (event) {
            showObjectsCountAll_V2Online("chartButton3_2");
        })
    });
</script>

</html>