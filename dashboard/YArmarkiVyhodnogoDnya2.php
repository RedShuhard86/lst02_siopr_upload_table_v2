<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
    <title>Ярмарки выходного дня</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>
    <style type="text/css">
        .custom-select__list_hidden {
            display: none !important;
        }

        .custom-select__list_opened {
            display: block !important;
        }

        .calendar-custom-select__label-text {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.43;
            letter-spacing: normal;
            color: black;
        }

        .calendar-custom-select__input-container {
            padding-top: 2px;
            background-color: transparent;
            cursor: pointer;
        }

        .calendar-custom-select__font-style {
            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.43;
            letter-spacing: normal;
            color: black;
        }

        .calendar-custom-select__input {
            display: none;
        }

        .calendar-custom-select__open-btn {
            float: left;
            width: 32px;
            border: none;
            cursor: pointer;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwxNzJ2LTE3MmgxNzJ2MTcyeiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiMxYTc4ZTIiPjxwYXRoIGQ9Ik00Myw3LjE2NjY3djE0LjMzMzMzaC03LjE2NjY3Yy03Ljg4MzMzLDAgLTE0LjMzMzMzLDYuNDUgLTE0LjMzMzMzLDE0LjMzMzMzdjEwMC4zMzMzM2MwLDcuODgzMzMgNi40NSwxNC4zMzMzMyAxNC4zMzMzMywxNC4zMzMzM2gxMDAuMzMzMzNjNy44ODMzMywwIDE0LjMzMzMzLC02LjQ1IDE0LjMzMzMzLC0xNC4zMzMzM3YtMTAwLjMzMzMzYzAsLTcuODgzMzMgLTYuNDUsLTE0LjMzMzMzIC0xNC4zMzMzMywtMTQuMzMzMzNoLTcuMTY2Njd2LTE0LjMzMzMzaC0xNC4zMzMzM3YxNC4zMzMzM2gtNTcuMzMzMzN2LTE0LjMzMzMzek0zNS44MzMzMywzNS44MzMzM2g3LjE2NjY3aDE0LjMzMzMzaDU3LjMzMzMzaDE0LjMzMzMzaDcuMTY2Njd2MTQuMzMzMzNoLTEwMC4zMzMzM3pNMzUuODMzMzMsNjQuNWgxMDAuMzMzMzN2NzEuNjY2NjdoLTEwMC4zMzMzM3oiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
        }

        .calendar-custom-select__open-btn:focus {
            outline: none;
        }

        .calendar-custom-select__list {
            display: none;
            position: absolute;
            list-style-type: none;
            z-index: 100;
            overflow: auto;
            overflow-x: hidden;
            padding: 0;
            border: 1px solid #dadada;
            border-radius: 4px;
            box-shadow: 0 0 10px 0 #dadada;
            background-color: white;
        }

        .calendar-custom-select__list-item {
            display: block;
            overflow-x: hidden;
            min-height: 24px;
            padding: 5px 0;
            color: black;
            white-space: nowrap;
            background: transparent;
            cursor: pointer;
        }

        .calendar-custom-select__list-selected-item-indicator {
            float: left;
            width: 15px;
            height: 15px;
            margin-top: 2px;
            margin-right: 10px;
            font-size: 10px;
            text-align: center;
            color: white;
            border: 1px solid #dce0e4;
            border-radius: 2px;
            background: transparent;
        }

        .calendar-custom-select__list-item_selected .calendar-custom-select__list-selected-item-indicator {
            background: #1A78E2;
        }

        .calendar-custom-select__list-item-button {
            float: left;
            width: 30px;
            height: 20px;
            font-size: 8px;
            text-align: center;
            color: black;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .calendar-custom-select__list-item-folder {
            float: left;
            width: 30px;
            height: 20px;
            font-size: 12px;
            text-align: center;
            color: black;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .calendar-custom-select__list-item_selected .calendar-custom-select__list-item-button {
            color: black;
        }

        .custom-bar-chart-label {
            color: #000000;
            font-size: 14px;
        }

        .custom-bar-chart-button {
            width: 30px;
            border: none;
            cursor: pointer;
            background-color: transparent;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSA1jYBgFoyEwGgJYQ+D/TB1lEMYqiSb4f6417/8ZupZownAuE5yFxPj3h2H/v9//r/6fpuuJJIzB/D/TWPLfj4+n//75dwyo1hhDAVAAqwUM//8v+8/AwP7v37/1uCwBG/7n5/7///+rMzIyXGAQ4blGtAXMOVcrGBkZJ+GyBN1wJnY+Z8aw49+xWcCITRAm9neqzkSgC/OAin4yMTEFMmZd3o7V8JTj72B60Gm8FoAUI1vyn5Epg5HhfwUsWMAux2M4SD9BC5AtAbFBABTmxBgOVgvWQQQB9wkJhhNhLKoSoCUl/+dYCqGKjvJGQ2DIhwAA19t/kaFhtSsAAAAASUVORK5CYII=') no-repeat center center;
        }

        .custom-bar-chart-button:focus {
            /* Нехорошо так делать, ой нехорошо */
            outline: none;
        }

        .custom-bar-chart-button_opened {
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
            transform: rotate(180deg);
        }

        .custom-bar-chart-subtitle {
            color: black;
            font-weight: 600;
        }

        /* Перезапись стилей jQuery для Datepicker */
        .fairs2-section-content #infoBlock2 .big-data-block__content {
            padding: 0;
        }

        .fairs2-section-content #infoBlock2 .big-data-block__content td {
            padding: 1px 10px;
        }

        .fairs2-section-content .ui-datepicker {
            height: 100%;
            padding: 0;
            border: none;
        }

        .fairs2-section-content .ui-widget-header {
            padding: 17px 0;
            border: none;
            border-bottom: 1px solid #e5e9f2;
            background: transparent;
        }

        .fairs2-section-content .ui-datepicker-prev {
            top: 1px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 0;
            cursor: pointer;
            transform: rotate(90deg);
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
        }

        .fairs2-section-content .ui-datepicker-prev-hover {
            top: 1px;
            left: 2px;
        }

        .fairs2-section-content .ui-datepicker-next {
            top: 1px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 0;
            transform: rotate(-90deg);
            cursor: pointer;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
        }

        .fairs2-section-content .ui-datepicker-next-hover {
            top: 1px;
            right: 2px;
        }

        .fairs2-section-content .ui-datepicker-title {
            padding-left: 22px;
            text-align: left;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.13;
            color: black;
        }

        .fairs2-section-content .ui-datepicker .ui-datepicker-title {
            margin: 0;
        }

        .fairs2-section-content .ui-state-default {
            width: 100%;
            text-align: center;
            border: none;
            border-radius: 3px;
            background: transparent;
            color: #454545;
        }

        .fairs2-section-content .ui-state-highlight {
            border: none !important;
            border-radius: 3px;
        }

        .fairs2-section-content .calendar-overlay {
            position: absolute;
            width: 32px;
        }    </style>
    <script>
        let _customSelectArray = [];
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
                    drawSingleColumnChartHorizontal(newDivData, categories[i], true, newSeries, i, max, options);// Фикс (костыль) смещения влево для customBarChart, так как горизонтальные столбцы не связаны между собой
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

        function _updateCalendar(data, currentDate, newDiv, options, isMaximized) {
            var $newDiv = $(newDiv);
            $newDiv.css('display', 'none');
            setTimeout(function () {
                var height;
                var itemHeight;
                var paddingTop;
                if (isMaximized) {
                    height = options.maxHeight;
                    itemHeight = options.maxItemHeight;
                    paddingTop = (options.maxItemHeight - 20) / 2;
                } else {
                    height = options.height;
                    itemHeight = options.itemHeight;
                    paddingTop = (options.itemHeight - 20) / 2;
                }
                $newDiv.find('.ui-datepicker .ui-state-active').removeClass('ui-state-active');
                $newDiv.find('.ui-datepicker-calendar').css('height', height + 'px');
                $newDiv.find('.ui-state-default').css({height: itemHeight + 'px', paddingTop: paddingTop + 'px'});
                if (options.onRefresh) {
                    options.onRefresh();
                }
                var anchorsRef = $newDiv.find('.ui-datepicker td[data-handler="selectDay"] > a');
                if (currentDate) {
                    buttonFireEvent('calendarDaySelected', currentDate);
                }
                for (var i = 0; i < data.selectedDays.length; ++i) {
                    var anchorRef = $(anchorsRef[data.selectedDays[i] - 1]);
                    anchorRef.css('background', data.selectionColor);
                    anchorRef.css('color', data.selectionFontColor);
                }
                $newDiv.find('.ui-state-highlight').css({
                    backgroundColor: data.currentDaySelectionColor,
                    color: data.currentDaySelectionFontColor
                });
                $newDiv.css('display', 'block');
            }, 0);
        }

        function drawCalendar(container, data, options, isMaximized) {
            if (!options.height) {
                options.height = 348;
            }
            if (!options.itemHeight) {
                options.itemHeight = 50;
            }
            if (!options.maxHeight) {
                options.maxHeight = 547;
            }
            if (!options.maxItemHeight) {
                options.maxItemHeight = 90;
            }
            var newDiv = document.createElement("div");
            newDiv.style.height = '100%';
            var isInit = true;
            $(newDiv).datepicker({
                dayNamesMin: ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'],
                onSelect: function (dateText) {
                    _updateCalendar(data, dateText, newDiv, options, isMaximized);
                },
                onChangeMonthYear: function (year, month) {
                    month = month < 10 ? '0' + month : month;
                    data.month = month;
                    data.year = year;
                    if (!isInit) {
                        buttonFireEvent('calendarMonthChanged', month + '.' + year);
                    }
                    _updateCalendar(data, undefined, newDiv, options, isMaximized);
                }
            });
            var date = $(newDiv).datepicker('getDate');
            date.setYear(data.year);
            date.setMonth(data.month - 1);
            $(newDiv).datepicker("setDate", date);
            container.appendChild(newDiv);
            _updateCalendar(data, undefined, newDiv, options, isMaximized);
            isInit = false;
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
        }        // _ перед переменной или функцией означает, что эту переменную лучше не трогать, ибо она подразумевалась приватнойvar _customSelectArray = [];
        var _customSelectIdsCounter = 0;

        function _customSelectGetChildrenCount(selectIndex, folderIndex) {
            var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
            var selectData = _customSelectArray[selectIndex].data;
            var counter = 0;
            for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
                if (selectData[i].isFolder) {
                    var childrenCount = _customSelectGetChildrenCount(selectIndex, i);
                    counter += childrenCount;
                    i += childrenCount;
                }
                ++counter;
            }
            return counter;
        }

        function _customSelectGetFolderState(selectIndex, folderIndex) {
            var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
            var selectData = _customSelectArray[selectIndex].data;// Раскоментить, если понадобится ставить галочку, когда выделена только папка, но не потомки
// if (selectData[folderIndex].selected) {
//     return true;
// }    for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
            if (selectData[i].selected) {
                return true;
            }
            return false;
        }

        function _customSelectRenderItem(data, selectIndex, itemIndex) {
            var options = _customSelectArray[selectIndex].options;
            var tooltip = _customSelectArray[selectIndex].data[itemIndex].tooltip ? ' title="' + _customSelectArray[selectIndex].data[itemIndex].tooltip + '"' : ''
            var newItem = '';
            newItem += '<li data-index="' + itemIndex + '"' + tooltip + ' data-id="' + data[itemIndex].id + '" style="padding-left: ' +
                ((data[itemIndex].isFolder && !data[itemIndex].selected ? 0 : options.itemPaddingLeft) + data[itemIndex].level * 15) +
                'px; height: ' + options.itemHeight + 'px" class="' + options.cssPrefix + 'custom-select__list-item ' + options.cssPrefix + 'custom-select__font-style';
            if (data[itemIndex].selected) {
                newItem += ' ' + options.cssPrefix + 'custom-select__list-item_selected';
            }
            if (data[itemIndex].isFolder) {
                newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' + (!data[itemIndex].selected ?
                    '<div class="' + options.cssPrefix + 'custom-select__list-item-indicator">' + (_customSelectGetFolderState(selectIndex, itemIndex) ? '&#10004;' : '') +
                    '</div><button class="' + options.cssPrefix + 'custom-select__list-item-button">' + (data[itemIndex].isOpened ? '&#9660;' : '&#9654;') +
                    '</button>' : '') + data[itemIndex].text + '</li>';
            } else {
                newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' +
                    (options.indicatorForSelectedItems ? '<div class="' + options.cssPrefix + 'custom-select__list-selected-item-indicator">' +
                        (data[itemIndex].selected ? '&#10004;' : '') + '</div>' : '') +
                    data[itemIndex].text + '</li>';
            }
            return newItem;
        }

        function _customSelectUpdateList(selectIndex, selectListRef, endOfSearch) {
// Фикс ошибки tagName is null (для Chrome) или g is null (для Firefox)
// Проблема происходит из-за конфликта js кода веб-клиента 1С (а именно обработчика каждого клика в 1С) и js кода html
// Это происходит из-за неправильной последовательности воспроизведения кода в очереди событий браузера
// В данном случае сначала воспроизводится обработка клика от html (в ней элемент пересоздаётся),
// потом 1С пытается произвести обработку события клика в документе, но элемента, по которому мы кликнули уже не существует
// Далее ошибка, текст которой зависит от браузера (движок в тонком клиенте 1С вообще её не воспроизводит)
// Сам фикс заключается в том, чтобы пересоздание элемента перенести в конец очереди событий с помощью setTimeout 0
            setTimeout(function () {
                var options = _customSelectArray[selectIndex].options;
                selectListRef = selectListRef ? selectListRef : $('.custom-select[data-index=' + selectIndex + '] .' + options.cssPrefix + 'custom-select__list');
                var newItems = '';
                var visibleItemsCount = 0;
                var data = _customSelectArray[selectIndex].data;
                for (var i = 0; i < data.length; ++i) {
                    var condition;
                    if (endOfSearch) {
                        condition = data[i].isVisibleInFolder;
                        data[i].isVisibleForSearch = true;
                    } else {
                        condition = data[i].isVisibleInFolder && data[i].isVisibleForSearch;
                    }
                    if (condition) {
                        newItems += _customSelectRenderItem(data, selectIndex, i);
                    }
                    if (data[i].isVisibleInFolder && data[i].isVisibleForSearch) {
                        ++visibleItemsCount;
                    }
                }
                selectListRef.html(newItems);
                if (visibleItemsCount > 10) {
                    selectListRef.css('height', options.maxItemsCount * options.itemHeight + 3 + 'px');
                    if (_customSelectArray[selectIndex].options.altOpenMode) {
                        var altTop = $('.custom-select[data-index=' + selectIndex + ']').position().top - (options.maxItemsCount * options.itemHeight + 3) +
                            options.inputHeight + 2;
                        selectListRef.css('top', altTop + 'px');
                    }
                } else {
                    selectListRef.css('height', (visibleItemsCount * options.itemHeight + 2) + 'px');
                    if (_customSelectArray[selectIndex].options.altOpenMode) {
                        var altTop = $('.custom-select[data-index=' + selectIndex + ']').position().top - (visibleItemsCount * options.itemHeight + 2) +
                            options.inputHeight + 2;
                        selectListRef.css('top', altTop + 'px');
                    }
                }
            }, 0);
        }

        function _customSelectOpenFolder(selectIndex, folderIndex, isOpened) {
            var data = _customSelectArray[selectIndex].data;
            var folderLevel = data[folderIndex].level;
            var counter = 0;
            if (isOpened !== undefined && isOpened !== null) {
                data[folderIndex].isOpened = isOpened;
            } else {
                data[folderIndex].isOpened = !data[folderIndex].isOpened;
            }
            if (data[folderIndex].isOpened) {
                for (var i = folderIndex + 1; i < data.length && data[i].level > folderLevel; ++i) {
                    data[i].isVisibleInFolder = true;
                    if (data[i].isFolder) {
                        i += _customSelectOpenFolder(selectIndex, i, data[i].isOpened);
                    }
                    ++counter;
                }
            } else {
                for (var i = folderIndex + 1; i < data.length && data[i].level > folderLevel; ++i) {
                    data[i].isVisibleInFolder = false;
                    ++counter;
                }
            }
            _customSelectUpdateList(selectIndex);
            return counter;
        }

        function _customSelectInputTotalCalc(data, options) {
            var customSelectCounter = 0;
            for (var i = 0, levelChecker = -1; i < data.length; ++i) {
                if (data[i].selected && (levelChecker >= 0 ? data[i].level <= levelChecker : true)) {
                    levelChecker = -1;
                    if (data[i].isFolder) {
                        if (options.canSelectFolder) {
                            levelChecker = data[i].level;
                            ++customSelectCounter;
                        }
                    } else {
                        ++customSelectCounter;
                    }
                }
            }
            return customSelectCounter;
        }

        function _customSelectUpdateInput(selectRef, selectIndex, needToClear) {
            selectIndex = selectIndex ? selectIndex : +selectRef.attr('data-index');
            var options = _customSelectArray[selectIndex].options;
            if (needToClear) {
                selectRef.find('.' + options.cssPrefix + 'custom-select__input').val('');
            } else {
                if (options.multiSelect) {
                    selectRef.find('.' + options.cssPrefix + 'custom-select__input').val('Выбрано ' +
                        _customSelectInputTotalCalc(_customSelectArray[selectIndex].data, options) + ' из ' + _customSelectArray[selectIndex].data.length);
                } else {
                    for (var i = 0; i < _customSelectArray[selectIndex].data.length; ++i) {
                        if (_customSelectArray[selectIndex].data[i].selected) {
                            selectRef.find('.' + options.cssPrefix + 'custom-select__input').val(_customSelectArray[selectIndex].data[i].text);
                            break;
                        }
                    }
                }
            }
        }

        function closeAllCustomSelects() {
            $('.custom-select__list_opened').each(function (index, elem) {
                var selectListRef = $(elem);
                var selectRef = selectListRef.parent();
                var selectIndex = selectRef.attr('data-index');
                var options = _customSelectArray[selectIndex].options;
                var selectBtnRef = selectRef.find('.' + options.cssPrefix + 'custom-select__open-btn');
                selectListRef.removeClass('custom-select__list_opened');
                if (selectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                    selectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                } else {
                    selectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                }
                _customSelectUpdateList(selectIndex, selectListRef, true);
                _customSelectUpdateInput(selectRef);
            });
        }

        function getSelectedIdsFromCustomSelect() {
            var result = [];
            $.each(_customSelectArray, function (index, select) {
                var customSelectResultSelectRef = {id: select.options.id, data: []};
                for (var j = 0; j < select.data.length; ++j) {
                    if (select.data[j].selected) {
                        customSelectResultSelectRef.data.push(select.data[j].id);
                        if (select.data[j].isFolder) {
                            j += _customSelectGetChildrenCount(index, j);
                        }
                    }
                }
                result.push(customSelectResultSelectRef);
            });
            return result;
        }

        function _customSelectOpen(selectIndex, onlyOpen) {
            var options = _customSelectArray[selectIndex].options;
            var customSelectRef = $('.custom-select[data-index=' + selectIndex + ']');
            var customSelectListRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__list');
            var customSelectBtnRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__open-btn');
            if (customSelectListRef.hasClass('custom-select__list_opened')) {
                if (!onlyOpen) {
                    customSelectListRef.removeClass('custom-select__list_opened');
                    if (customSelectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                        customSelectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                    } else {
                        customSelectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                    }
                    _customSelectUpdateList(selectIndex, customSelectListRef);
                    _customSelectUpdateInput(customSelectRef, selectIndex);
                }
            } else {
                closeAllCustomSelects();
                _customSelectUpdateInput(customSelectRef, selectIndex, true);
                if (_customSelectArray[selectIndex].options.altOpenMode) {
                    var listHeightString = customSelectListRef.css('height');
                    var listHeight = +listHeightString.substring(0, listHeightString.length - 2);
                    var altTop = customSelectRef.position().top - listHeight + options.inputHeight + 2;
                    customSelectListRef.css('top', altTop + 'px');
                }
                customSelectListRef.addClass('custom-select__list_opened');
                if (customSelectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                    customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                } else {
                    customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                }
            }
        }

        function customSelectMultiSelect(values, needToUpdateInputs, withDefaultValues) {
            for (var j = 0; j < _customSelectArray.length; ++j) {
                var select = _customSelectArray[j];
                var options = select.options;
                var selectRef = $('.custom-select[data-index=' + j + ']');
                if (select.options.multiSelect) {
                    if (values && values[j] && values[j].length > 0) {
                        var valueIndex = 0;
                        for (var i = 0; i < select.data.length; ++i) {
                            if (i === values[j][valueIndex]) {
                                if (!select.data[i].selected && (!select.data[i].isFolder || select.options.canSelectFolder)) {
                                    select.data[i].selected = true;
                                    if (select.data[i].isFolder) {
                                        _customSelectOpenFolder(j, i, false);
                                    }
                                }
                                if (valueIndex + 1 < values[j].length) {
                                    ++valueIndex;
                                }
                            } else {
                                if (select.data[i].selected) {
                                    select.data[i].selected = false;
                                }
                            }
                        }
                    } else if (withDefaultValues) {
                        for (var i = 0; i < select.data.length; ++i) {
                            if (select.data[i].selected) {
                                select.data[i].selected = false;
                            }
                        }
                    }
                } else {
                    if (values && values[j] && values[j].length > 0) {
                        var selectedElemFlag = false;
                        var unselectedElemFlag = false;
                        var firstElemIndex = -1;
                        for (var i = 0; i < select.data.length; ++i) {
                            if (selectedElemFlag && unselectedElemFlag) {
                                break;
                            }
                            if (i === values[j][0]) {
                                if (!select.data[i].isFolder || select.options.canSelectFolder) {
                                    if (!select.data[i].selected) {
                                        select.data[i].selected = true;
                                        if (select.data[i].isFolder) {
                                            _customSelectOpenFolder(j, i, false);
                                        }
                                    } else {
                                        unselectedElemFlag = true;
                                    }
                                    selectedElemFlag = true;
                                }
                            } else {
                                if ((!select.data[i].isFolder || select.options.canSelectFolder) && firstElemIndex === -1) {
                                    firstElemIndex = i;
                                }
                                if (select.data[i].selected) {
                                    select.data[i].selected = false;
                                    unselectedElemFlag = true;
                                }
                            }
                        }
                        if (!selectedElemFlag && withDefaultValues && firstElemIndex > -1) {
                            select.data[firstElemIndex].selected = true;
                            if (select.data[firstElemIndex].isFolder) {
                                _customSelectOpenFolder(j, firstElemIndex, false);
                            }
                            selectedElemFlag = true;
                        }
                    } else if (withDefaultValues) {
                        var isFirstElem = true;
                        for (var i = 0; i < select.data.length; ++i) {
                            if (isFirstElem && (!select.data[i].isFolder || select.options.canSelectFolder)) {
                                isFirstElem = false;
                                select.data[i].selected = true;
                                if (select.data[i].isFolder) {
                                    _customSelectOpenFolder(j, i, false);
                                }
                            } else if (select.data[i].selected) {
                                select.data[i].selected = false;
                            }
                        }
                    }
                }
                if (needToUpdateInputs) {
                    _customSelectUpdateInput(selectRef, j);
                }
                _customSelectUpdateList(j, selectRef.find('.' + options.cssPrefix + 'custom-select__list'));
            }
        }

        function customSelectSelect(selectNumber, itemNumber, needToUpdateInput, byId) {
            var customSelectListRef;
            var customSelectRef;
            var customSelectListItemRef;
            var options;
            if (byId) {
                customSelectRef = $('.custom-select[data-id=' + selectNumber + ']');
                selectNumber = +customSelectRef.attr('data-index');
                options = _customSelectArray[selectNumber].options;
                customSelectListRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__list');
                customSelectListItemRef = customSelectListRef.find('.' + options.cssPrefix + 'custom-select__list-item[data-id=' + itemNumber + ']');
                itemNumber = customSelectListItemRef.attr('data-index');
            } else {
                options = _customSelectArray[selectNumber].options;
                customSelectListRef = $('.custom-select[data-index=' + selectNumber + '] .' + options.cssPrefix + 'custom-select__list');
                customSelectRef = customSelectListRef.parent();
                customSelectListItemRef = customSelectListRef.find('.' + options.cssPrefix + 'custom-select__list-item[data-index=' + itemNumber + ']');
            }
            var selectData = _customSelectArray[selectNumber].data;
            if (!selectData[itemNumber].isFolder || _customSelectArray[selectNumber].options.canSelectFolder) {
                if (!_customSelectArray[selectNumber].options.multiSelect) {
                    if (!selectData[itemNumber].selected) {
                        for (var i = 0; i < selectData.length; ++i) {
                            if (selectData[i].selected) {
                                selectData[i].selected = false;
                                break;
                            }
                        }
                        selectData[itemNumber].selected = true;
                        if (selectData[itemNumber].isFolder) {
                            _customSelectOpenFolder(selectNumber, itemNumber, false);
                        }
                    }
                } else {
                    if (!selectData[itemNumber].selected && selectData[itemNumber].isFolder) {
                        _customSelectOpenFolder(selectNumber, itemNumber, false);
                    }
                    selectData[itemNumber].selected = !selectData[itemNumber].selected;
                }
                if (needToUpdateInput) {
                    _customSelectUpdateInput(customSelectRef, selectNumber);
                }
                _customSelectUpdateList(selectNumber, customSelectListRef);
            }
        }

        function _customSelectSelectParentsInSearch(data, folderIndex) {
            var currentLevel = data[folderIndex].level;
            if (!data[folderIndex].isVisibleForSearch) {
                data[folderIndex].isVisibleForSearch = true;
                if (data[folderIndex].level !== 0) {
                    for (var i = folderIndex; i >= 0; --i) {
                        if (data[i].level < currentLevel && data[i].isFolder) {
                            if (!data[i].isVisibleForSearch) {
                                data[i].isVisibleForSearch = true;
                                currentLevel = data[i].level;
                                if (data[i].level === 0) {
                                    break;
                                }
                            } else {
                                break;
                            }
                        }
                    }
                }
            }
        }

        function _customSelectSearchRec(selectIndex, text, data, folderIndex, allSelectMode) {
            var result = false;
            var count = 0;
            if (allSelectMode) {
                for (var i = folderIndex + 1; i < data.length && data[i].level > data[folderIndex].level; ++i, ++count) {
                    data[i].isVisibleForSearch = true;
                    if (data[i].isFolder && data[i].selected) {
                        i += _customSelectGetChildrenCount(selectIndex, i);
                    }
                }
                result = true;
            } else {
                for (var i = folderIndex + 1; i < data.length && data[i].level > data[folderIndex].level; ++i, ++count) {
                    if (data[i].text.toLowerCase().indexOf(text.toLowerCase()) !== -1) {
                        data[i].isVisibleForSearch = true;
                        result = true;
                        if (data[i].isFolder) {
                            var shift = 0;
                            if (data[i].selected) {
                                shift = _customSelectGetChildrenCount(selectIndex, i);
                            } else {
                                _customSelectSelectParentsInSearch(data, i);
                                var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i, true);
                                shift = lowLvlResult.count;
                            }
                            i += shift;
                            count += shift;
                        }
                    } else {
                        data[i].isVisibleForSearch = false;
                        if (data[i].isFolder) {
                            var shift = 0;
                            if (data[i].selected) {
                                shift = _customSelectGetChildrenCount(selectIndex, i);
                            } else {
                                var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i);
                                if (lowLvlResult.result) {
                                    result = true;
                                    _customSelectSelectParentsInSearch(data, i);
                                }
                                shift = lowLvlResult.count;
                            }
                            i += shift;
                            count += shift;
                        }
                    }
                }
            }
            return {result: result, count: count};
        }

        function _customSelectSearch(event, selectIndex) {
// Фикс для тонкого клиента, так как в тонком onkeyup не работает на кнопки с буквами
// Поэтому для считывания актуального текста из инпута используется setTimeout, для считывания букв используется onkeypress,
// а для специальных кнопок (backspace) используется onkeydown
            var input = event.srcElement;
            if (event.type === 'keypress' || event.type === 'keydown' && event.keyCode === 8) {
                setTimeout(function () {
                    var text = input.value;
                    var data = _customSelectArray[selectIndex].data;
                    for (var i = 0; i < data.length; ++i) {
                        if (data[i].text.toLowerCase().indexOf(text.toLowerCase()) !== -1) {
                            data[i].isVisibleForSearch = true;
                            result = true;
                            if (data[i].isFolder) {
                                _customSelectSelectParentsInSearch(data, i);
                                if (data[i].selected) {
                                    i += _customSelectGetChildrenCount(selectIndex, i);
                                } else {
                                    i += _customSelectSearchRec(selectIndex, text, data, i, true).count;
                                }
                            }
                        } else {
                            data[i].isVisibleForSearch = false;
                            if (data[i].isFolder) {
                                var shift = 0;
                                if (data[i].selected) {
                                    shift = _customSelectGetChildrenCount(selectIndex, i);
                                } else {
                                    var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i);
                                    if (lowLvlResult.result) {
                                        data[i].isVisibleForSearch = true;
                                        result = true;
                                        _customSelectSelectParentsInSearch(data, i);
                                    }
                                    shift = lowLvlResult.count;
                                }
                                i += shift;
                            }
                        }
                    }
                    _customSelectUpdateList(selectIndex);
                }, 0);
            }
        }

        function _transformCustomSelectDataRec(newData, data, level) {
            for (var i = 0; i < data.length; ++i) {
                if (data[i].children && data[i].children.length > 0) {
                    data[i].isFolder = true;
                }
                data[i].level = level;
                data[i].isVisibleInFolder = false;
                data[i].isVisibleForSearch = true;
                if (data[i].isFolder) {
                    data[i].isOpened = false;
                    newData.push(data[i]);
                    _transformCustomSelectDataRec(newData, data[i].children, level + 1);
                } else {
                    newData.push(data[i]);
                }
            }
        }

        function transformCustomSelectData(data) {
            newData = [];
            for (var i = 0; i < data.length; ++i) {
                if (data[i].children && data[i].children.length > 0) {
                    data[i].isFolder = true;
                }
                data[i].level = 0;
                data[i].isVisibleInFolder = true;
                data[i].isVisibleForSearch = true;
                if (data[i].isFolder) {
                    data[i].isOpened = false;
                    newData.push(data[i]);
                    _transformCustomSelectDataRec(newData, data[i].children, 1);
                } else {
                    newData.push(data[i]);
                }
            }
            return newData;
        }

        function _customSelectItemClick(event, selectIndex, itemIndex) {
            if ($(event.target).hasClass('filter-custom-select__list-item-button')) {
                _customSelectOpenFolder(selectIndex, itemIndex);
            } else {
                customSelectSelect(selectIndex, itemIndex);
            }
            if (_customSelectArray[selectIndex].options.onItemClick) {
                _customSelectArray[selectIndex].options.onItemClick(_customSelectArray[selectIndex].data[itemIndex]);
            }
        }

        function createCustomSelect(parent, options, data) {
            var alreadyAdded = false;
            var selectIndex = 0;
            for (var i = 0; i < _customSelectArray.length; ++i) {
                var select = _customSelectArray[i];
                if (select.options.id === options.id) {
                    alreadyAdded = true;
                    selectIndex = i;
                    select.options = options;
                    select.data = data;
                    break;
                }
            }
            if (!alreadyAdded) {
                _customSelectArray.push({options: options, data: data});
                selectIndex = _customSelectIdsCounter;
                ++_customSelectIdsCounter;
            }
            var customSelectInputText = data[0].text;
            if (!options.multiSelect) {
                var customSelectCounter = 0;
                var firstItemIndex = -1;
                for (var i = 0; i < data.length; ++i) {
                    if (!data[i].isFolder || options.canSelectFolder) {
                        if (firstItemIndex === -1) {
                            firstItemIndex = i;
                        }
                        if (data[i].selected) {
                            if (customSelectCounter === 0) {
                                ++customSelectCounter;
                                customSelectInputText = data[i].text;
                            } else {
                                data[i].selected = false;
                            }
                        }
                    } else {
                        data[i].selected = false;
                    }
                }
                if (customSelectCounter === 0 && firstItemIndex > -1) {
                    data[firstItemIndex].selected = true;
                    customSelectInputText = data[firstItemIndex].text;
                }
            } else {
                for (var i = 0; i < data.length; ++i) {
                    if (data[i].selected) {
                        if (data[i].isFolder && !options.canSelectFolder) {
                            data[i].selected = false;
                        }
                    }
                }
                customSelectInputText = 'Выбрано ' + _customSelectInputTotalCalc(data, options) + ' из ' + data.length;
            }
            if (!options.cssPrefix) {
                options.cssPrefix = '';
            } else {
                options.cssPrefix += '-';
            }
            if (!options.inputHeight) {
                options.inputHeight = 40;
            }
            if (!options.itemPaddingLeft) {
                options.itemPaddingLeft = 45;
            }
            if (!options.itemHeight) {
                options.itemHeight = 30;
            }
            if (!options.maxItemsCount) {
                options.maxItemsCount = 10;
            }
            var customSelectContainer = document.createElement("div");
            customSelectContainer.className = 'custom-select';
            customSelectContainer.setAttribute('data-index', selectIndex);
            customSelectContainer.setAttribute('data-id', options.id);
            var customSelectContent = '<label class="' + options.cssPrefix + 'custom-select__label">';
            if (options.name) {
                customSelectContent += '<span class="' + options.cssPrefix + 'custom-select__label-text">' + options.name + '</span>';
            }
            customSelectContent += '<div class="' + options.cssPrefix + 'custom-select__input-container" style="height: ' + options.inputHeight + 'px';
            if (options.color) {
                customSelectContent += '; background-color: ' + options.color + '"';
            } else {
                customSelectContent += '"';
            }
            customSelectContent += '><input style="height: ' + (options.inputHeight - 2) + 'px' +
                (options.inputWidth ? '; width: ' + options.inputWidth + 'px"' : '"') + ' class="' + options.cssPrefix + 'custom-select__input' +
                ' ' + options.cssPrefix + 'custom-select__font-style" type="text" autocomplete="off" onclick="_customSelectOpen(' + selectIndex +
                ', true)" onkeydown="_customSelectSearch(event, ' + selectIndex + ')" onkeypress="_customSelectSearch(event, ' + selectIndex + ')" value="' +
                customSelectInputText + '"><button style="height: ' + options.inputHeight + 'px" class="' + options.cssPrefix + 'custom-select__open-btn';
            var visibleItemsCount = 0;
            for (var i = 0; i < data.length; ++i) {
                if (data[i].isVisibleInFolder && data[i].isVisibleForSearch) {
                    ++visibleItemsCount;
                }
            }
            var listHeight = visibleItemsCount > options.maxItemsCount ? options.maxItemsCount * options.itemHeight + 3 : (visibleItemsCount * options.itemHeight + 2);
            var customSelectUl = '<ul class="' + options.cssPrefix + 'custom-select__list" style="height: ' + listHeight + 'px';
            if (options.listWidth) {
                customSelectUl += '; width: ' + options.listWidth + 'px';
            }
            if (options.color) {
                customSelectUl += '; background-color: ' + options.color + '">';
            } else {
                customSelectUl += '">';
            }
            if (options.multiSelect) {
                customSelectContent += ' ' + options.cssPrefix + 'custom-select__open-btn_when-multi-select" onclick="_customSelectOpen(' + selectIndex +
                    ')"></button></div></label>' +
                    customSelectUl;
            } else {
                customSelectContent += '" onclick="_customSelectOpen(' + selectIndex + ')"></button></div></label>' + customSelectUl;
            }
            for (var i = 0; i < data.length; ++i) {
                if (data[i].isVisibleInFolder) {
                    customSelectContent += _customSelectRenderItem(data, selectIndex, i);
                }
            }
            customSelectContent += '</ul>'
            customSelectContainer.innerHTML = customSelectContent;
            parent.appendChild(customSelectContainer);
        }

        var pieColors = [
            ['#8B68FF', '#7488ED', '#8B68FF'],
            ['#FF7676', '#FF4283', '#FF7676'],
            ['#3CDA50', '#1EE8A8', '#3CDA50'],
            ['#FF7132', '#FCB255', '#FF7132']
        ];
        var calendarBtnWidth = 50;
        var calendarBtnSpace = 2;
        var overlayBtnWidth = 40;
        var isOverlayCreated = false;

        function showReceptionStatistics(dataSets) {
            dataSets = parseDataFromString(dataSets);
            var finalDataSets = [];
            for (var j = 0; j < dataSets.length; ++j) {
                var dataSet = dataSets[j];
                for (var i = 0; i < dataSet.data.length; ++i) {
                    if (dataSet.data[i].colors) {
                        dataSet.data[i].color = getSimpleGradient(true, dataSet.data[i].colors);
                        dataSet.data[i].colors = undefined;
                    } else {
                        dataSet.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                    }
                }
                var series = [{
                    name: dataSet.seriesName ? dataSet.seriesName : 'Количество',
                    data: dataSet.data
                }];
                finalDataSets.push({name: dataSet.name, categories: dataSet.categories, series: series});
            }
            var options = {
                id: 1,
                tabType: "combobox",
                tabCaption: "Период:",
                type: "customBarChart",
                labelStyles: [{
                    fontSize: '14px',
                    color: 'black',
                    fontFamily: 'Arial',
                    fontWeight: '600'
                }],
                altNameStyle: true,
                numbersAfterComma: 0,
                subTitles: [undefined, 'Результаты приема'],
                dataSets: finalDataSets
            };
            renderChart(options);
        }

        function showFirstRequest(dataSet) {
            dataSet = parseDataFromString(dataSet);
            var defColors = [
                '#1A78E2',
                '#1A78E2',
                '#1A78E2',
                '#1A78E2'
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
                id: 3,
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
                id: 4,
                type: "customBarChart",
                numbersAfterComma: 0,
                dataSets: finalDataSets
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
                id: 5,
                type: "customBarChart",
                labelStyles: [{
                    fontSize: '14px',
                    color: 'black',
                    fontFamily: 'Arial',
                    fontWeight: '600'
                }],
                numbersAfterComma: 0,
                altNameStyle: true,
                subTitles: [undefined, 'В том числе по нарушениям:'],
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
                id: 6,
                type: "customBarChart",
                numbersAfterComma: 0,
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }

        function showStatUserV2(dataSet) {
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
                type: "customBarChart",
                labelStyles: [{
                    fontSize: '14px',
                    color: 'black',
                    fontFamily: 'Arial',
                    fontWeight: '600'
                }],
                numbersAfterComma: 0,
                altNameStyle: true,
                subTitles: [undefined, 'Из них:'],
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }

        function showParticipantStat(dataSet) {
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
                type: "customBarChart",
                labelStyles: [{
                    fontSize: '14px',
                    color: 'black',
                    fontFamily: 'Arial',
                    fontWeight: '600'
                }],
                numbersAfterComma: 0,
                altNameStyle: true,
                subTitles: [undefined, 'Из них:'],
                dataSets: [{categories: dataSet.categories, series: series}]
            };
            renderChart(options);
        }

        function showCalendar(data) {
// Фикс ошибки tagName is null (для Chrome) или g is null (для Firefox)
// Проблема происходит из-за конфликта js кода веб-клиента 1С (а именно обработчика каждого клика в 1С) и js кода html
// Это происходит из-за неправильной последовательности воспроизведения кода в очереди событий браузера
// В данном случае сначала воспроизводится обработка клика от html (в ней элемент пересоздаётся),
// потом 1С пытается произвести обработку события клика в документе, но элемента, по которому мы кликнули уже не существует
// Далее ошибка, текст которой зависит от браузера (движок в тонком клиенте 1С вообще её не воспроизводит)
// Сам фикс заключается в том, чтобы пересоздание элемента перенести в конец очереди событий с помощью setTimeout 0
            setTimeout(function () {
                data = parseDataFromString(data);
                var $infoBlock2 = $('#infoBlock2');
                var options = {
                    id: 2,
                    type: "calendar",
                    onRefresh: function () {
// Из-за ie5
                        $infoBlock2.find('.ui-datepicker').css('width', $infoBlock2[0].offsetWidth + 'px');
                        $infoBlock2.find('.ui-datepicker-prev').css('margin-left', $infoBlock2[0].offsetWidth - (calendarBtnWidth + calendarBtnSpace) * 2 + 'px');// Костыль с внедрением комбика как оверлей в datepicker, но зато эффективный по производительности и простой в использовании
                        $infoBlock2.find('.calendar-overlay').css('left', $infoBlock2[0].offsetWidth - (calendarBtnWidth + calendarBtnSpace) * 2 - overlayBtnWidth + 'px');
                    },
                    dataSets: [{data: data}]
                };
                renderChart(options);
                if (!isOverlayCreated && data.years) {
                    isOverlayCreated = true;
                    createCustomSelect(
                        $('.calendar-overlay')[0],
                        {
                            id: 1000,
                            multiSelect: false,
                            cssPrefix: 'calendar',
                            inputHeight: 32,
                            indicatorForSelectedItems: true,
                            itemPaddingLeft: 10,
                            inputWidth: 32,
                            listWidth: 90,
                            onItemClick: function (item) {
                                data.year = item.text;
                                buttonFireEvent("calendarMonthChanged", data.month + '.' + item.text);
                            }
                        },
                        transformCustomSelectData(data.years)
                    );
                }
            }, 0);
        }

        function _init() {
// Костыль с внедрением комбика в datepicker, но зато эффективный по производительности и простой в использовании
            var overlay = document.createElement('div');
            var $infoBlock2 = $('#infoBlock2');
            overlay.className = 'calendar-overlay';
            overlay.style.left = $infoBlock2[0].offsetWidth - (calendarBtnWidth + calendarBtnSpace) * 2 - overlayBtnWidth + 'px';
            overlay.style.top = 7.5 + 'px';
            $infoBlock2.find('.big-data-block__content')[0].appendChild(overlay);
            $(window).resize(function () {
// Из-за ie5
                $infoBlock2.find('.ui-datepicker').css('width', $infoBlock2[0].offsetWidth + 'px');
                $infoBlock2.find('.ui-datepicker-prev').css('margin-left', $infoBlock2[0].offsetWidth - (calendarBtnWidth + calendarBtnSpace) * 2 + 'px');// Костыль с внедрением комбика как оверлей в datepicker, но зато эффективный по производительности и простой в использовании
                $infoBlock2.find('.calendar-overlay').css('left', $infoBlock2[0].offsetWidth - (calendarBtnWidth + calendarBtnSpace) * 2 - overlayBtnWidth + 'px');
            });
        }    </script>
</head>
<body>
<? // require_once 'menu.php'; ?>
<div class="main-content">
    <div class="main-content__selection">
        <div class="section__content fairs2-section-content">
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
                                        <td class="big-data-block__header__text">Статистика по приему граждан</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="1"
                                                 data-height="350px"
                                                 data-height-min="300px"
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                                     style="overflow: hidden; height:350px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_1">
                                    <span>К списку протоколов</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
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
                                        <td class="big-data-block__header__text">Календарь приема граждан</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="2"
                                                 data-height="406px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_2"
                                     style="overflow: hidden; height:406px "></div>
                            </div>
                        </td>
                    <tr class="section__big-blocks-table__row-gap"></tr>
                    <tr class="section__big-blocks-table__row" style="z-index: 390">
                        <td class="big-data-block" id="infoBlock3">
                            <div class="big-data-block__header">
                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Первая заявочная (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="3"
                                                 data-height="456px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
                                     style="overflow: hidden; height:456px "></div>
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
                                        <td class="big-data-block__header__text">Топ-5 ярмарок по заполняемости
                                            участниками
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="4"
                                                 data-height="400px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_4"
                                     style="overflow: hidden; height:400px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_2">
                                    <span>подробно</span>
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
                                        <td class="big-data-block__header__text">Статистика по нарушениям (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="5"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_5"
                                     style="overflow: hidden; height:350px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_3">
                                    <span>подробно</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
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
                                        <td class="big-data-block__header__text">Количество нарушений на ярмарках
                                            выходного дня (топ-5, шт.)
                                        </td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="6"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                                     style="overflow: hidden; height:350px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_4">
                                    <span>перейти в отчёт</span>
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
                                        <td class="big-data-block__header__text">Статистика по заявкам (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_7"
                                     style="overflow: hidden; height:350px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_5">
                                    <span>Подробно</span>
                                    <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
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
                                        <td class="big-data-block__header__text">Статистика по участникам (шт.)</td>
                                        <td class="big-data-block__header__resize-button">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                                                 alt=""
                                                 data-id="8"
                                                 data-height="350px"
                                                 data-height-min=""
                                                 class="resize-btn"
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_8"
                                     style="overflow: hidden; height:350px "></div>
                                <div class="colors-font big-data-block__data-list__show-more-button"
                                     id="transition_button_6">
                                    <span>Подробно</span>
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
    // 1 Статистика по приему граждан (новое)
    function showReceptionStatisticsOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getReceptionStatisticsFromServer",
            success: function (data) {
                showReceptionStatistics(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showReceptionStatistics');
            }
        });
    }// 2 Календарь приема граждан
    function showCalendarOnline(date1) {
        var param = btoa('date1=' + date1);
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getCalendarFromServer&param=" + param,
            success: function (data) {
                let newData = JSON.parse(data)
                newData.selectionColor = "#40B3EE"
                newData.currentDaySelectionColor = "#1A78E2"
                newData.selectionColor
                let json = JSON.stringify(newData)
                showCalendar(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showCalendar');
            }
        });
    }// 3 Первая заявочная (шт.) (новое)
    function showFirstRequestOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getFirstRequestFromServer",
            success: function (data) {
                let newData = JSON.parse(data)
                for (let i = 0; i < newData.length; i++) {
                    if (i % 2 == 0) {
                        newData[i].colors = ['#1A78E2', '#40B3EE']
                    } else {
                        newData[i].colors = ["#28C75E", "#D1FFAC"]
                    }
                }
                let json = JSON.stringify(newData)
                showFirstRequest(json);
            },
            error: function () {
                alert('Ошибка получения данных для функции showFirstRequest');
            }
        });
    }// 4 Топ-5 ярмарок по заполняемости участниками (новое)
    function showFullnessTopOnline(btn) {
        let JSONx;
        let datax = "";
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=ЯрмаркиВыходногоДня&func=getFullnessTopFromServer",
            success: function (data) {

                datax = JSON.parse(data);
                if (btn == 'chartButton4_0') {
                    JSONx = [{
                        "tabName": "Мест",
                        "seriesName": "Шт.",
                        "categories": datax[0],
                        "data": datax[2]
                    }, {"tabName": "%"}];
                } else if (btn == 'chartButton4_1') {
                    JSONx = [{"tabName": "Мест"}, {
                        "tabName": "%.",
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
    }// 5 Статистика по нарушениям (шт.)  (новое)
    function showViolationsV2Online() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getViolationsV2FromServer",
            success: function (data) {
                showViolationsV2(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showViolationsV2');
            }
        });
    }// 6 Количество нарушений на ярмарках выходного дня (топ-5, шт.) (новое)
    function showViolationsTopOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getViolationsTopFromServer",
            success: function (data) {
                showViolationsTop(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showViolationsTop');
            }
        });
    }// 7 Статистика по заявкам (новое)
    function showStatUserV2Online() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getStatUserV2FromServer",
            success: function (data) {
                showStatUserV2(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showStatUserV2');
            }
        });
    }// 8 Статистика по участникам (шт.)  (новое)
    function showParticipantStatOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getParticipantStatFromServer",
            success: function (data) {
                showParticipantStat(data);
            },
            error: function () {
                alert('Ошибка получения данных для функции showParticipantStat');
            }
        });
    }// Установка даты актуальности
    function setActualDateOnline() {
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=YArmarkiVyhodnogoDnya2&func=getActualDate",
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
        _init();
        var date1 = '2021-11-10';
        showReceptionStatisticsOnline();
        showCalendarOnline(date1);
        showFirstRequestOnline();
        showFullnessTopOnline('chartButton4_0');
        showViolationsV2Online();
        showViolationsTopOnline();
        showStatUserV2Online();
        setActualDateOnline();
        showParticipantStatOnline();
        $(document).on('click', '#chart_4 #dataSet0', function (event) {
            showFullnessTopOnline("chartButton4_0");
        })
        $(document).on('click', '#chart_4 #dataSet1', function (event) {
            showFullnessTopOnline("chartButton4_1");
        })
    });
</script>
</html>
