<!DOCTYPE html>
<html lang="ru">

<head>
    
    
    <title>Продовольственная безопасность</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>

    <style type="text/css">
        .fs-background {
    position: absolute;
    left: 0;
    top: 0;
    z-index: 999998;

    width: 100%;
    height: 100%;

    background: transparent;
}

.fs-section-content {
    position: static;

    width: 100%;
    padding-left: 40px;
    padding-right: 40px;
}

.fs-section-content .date-range__date-picker {
    top: 150px;
    left: 40px;
}

/* Перезапись стилей jQuery для Datepicker */
.fs-section-content .ui-datepicker {
    width: 362px;
    height: 315px;

    padding: 0;
}

.fs-section-content .ui-widget-header {
    padding: 17px 0;

    border: none;
    border-bottom: 1px solid #e5e9f2;

    background: transparent;
}

.fs-section-content .ui-datepicker-prev {
    left: unset;
    right: 50px;

    width: 50px;
    height: 50px;

    border: none;
    border-left: 1px solid #e5e9f2;
    border-right: 1px solid #e5e9f2;
    border-radius: 0;

    cursor: pointer;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wcTCwAzHw1pGgAAAKdJREFUSMdjYBgFo2DQA0ZSNfyfZyj699vv9QyMDB9Zsq94E1LPRKrh/77/2s/A8N+a4T8DPzF6WEg1/P9/Bm1GRoarTJysgVQLIkzD2RwZk86/pooF/6frif3793cfOYYTFwfszP9pnopoGkSolvze9///fx1SLCE6mTImnX/NxMnqxMjIcPX/fwbtv99+r6dOHGBYwubIwMB4lIGR4eNoOTUKhgkAAFvKVBnVxwCrAAAAAElFTkSuQmCC') no-repeat center center;
}

.fs-section-content .ui-datepicker-next {
    width: 50px;
    height: 50px;

    border: none;
    border-radius: 0;

    cursor: pointer;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wcTCwEGUKWceAAAAJtJREFUSMftkjsSgkAQRLsXsQoSIk6BCbGRR+AK3smUKxiZSmRsxCmMTNySz45XmEEDqdoXd/Wr+QCRyN9DTWg67S4QFEmeNjzeHxaBU6UEBSD74IdO2rr8uSDJ04ZEL4Iq+PFqkVAblLYugx86EVQkepdtD5p10TLuEon76kXeM9exoqXlALDRhObXeAbs5fobEE+AN2t5JLISPtg7UAsEnXeNAAAAAElFTkSuQmCC') no-repeat center center;
}

.fs-section-content .ui-datepicker-title {
    font-size: 16px;
    font-weight: 500;
    line-height: 1.13;
    color: #182c4f;
}

.fs-section-content .ui-datepicker .ui-datepicker-title {
    margin: 0;
    margin-left: 20px;
    
    text-align: left;
}

.fs-section-content .ui-state-default {
    height: 34px;
    width: 34px;
    padding-top: 7px;
    margin-left: 7px;

    text-align: center;
    
    border: none;

    background: transparent;
    color: #454545;
}

.fs-section-content .ui-state-active {
    color: white !important;

    border-radius: 3px;

    background: #fca54e !important;
}

.fs-section-content .ui-state-highlight {
    color: white !important;

    border-radius: 3px;

    background: #ffd028 !important;
}

.fs-header-menu {
    width: 100%;
    height: 60px;
    padding: 16px 0 0 12px;
}

.fs-header-menu__label {
    float: left;

    height: 32px;

    padding: 0;
    margin: 0;
}

.fs-header-menu__text {
    float: left;

    height: 32px;

    font-size: 14px;
    font-weight: 600;
    line-height: 2.29;

    color: black;
}

.fs-header-menu__input-container {
    display: inline;
    float: left;

    /* width: 205px; */
    height: 32px;

    margin-left: 24px;

    cursor: pointer;
}

.fs-header-menu__input {
    float: left;

    width: 157px;
    height: 30px;

    font-size: 13px;
    font-weight: 600;
    line-height: 2.46;
    color: black;

    border: none;

    background-color: transparent;
    cursor: pointer;
}

.fs-header-menu__calendar-btn {
    float: left;

    width: 24px;
    height: 24px;
    padding: 0;
    margin-top: 4px;

    border: none;

    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQZJREFUSA3tVN0RgjAMTgpj6ATiIB57+OAxDseDc4gOAk6gY0gj4S53JbSAnh4v9CU//b6kSdsArGvpDqA+ABX7g7V0JqAN78XZvcO88h25WO1HwKcxeMRTdXNxgwRNnjwkOAMjMCkYwsbSxSX6/Jwkyuqti4tdg3U3ONsN2BIsa/3l82suM0yf9nvr7wkGLZIauMeYVVexxyQVSarvSPDBCuYG50B4qksJqGUwgQD5ecoTDemC9cnJBD7SJ77gHUgQ+VBsh3TB+uRkBaG2uH5fYPFNJhDgt3K5FvHbnnvqMeygAh5YPFP447R9npWjxXY45mrC4A66kesBaqK2ZVxr/2ov34E3GId3Ag4XMvsAAAAASUVORK5CYII=');
    cursor: pointer;
}

.fs-header-menu__calendar-btn:hover {
    cursor: pointer;
}

.fs-header-menu__calc-btn {
    float: left;

    height: 30px;
    padding: 0;
    margin-left: 26px;

    font-size: 10px;
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: 1px;

    border: none;

    background: transparent;
}

.fs-header-menu__calc-btn:hover {
    cursor: pointer;
}

.fs-header-menu__back-container {
    float: right;
}

.fs-header-menu__back-icon {
    float: left;

    width: 24px;
    height: 24px;
    margin-top: 3px;
}

.fs-header-menu__back-btn {
    float: left;

    height: 30px;
    padding: 0;
    margin-left: 3px;

    font-size: 10px;
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: 1px;

    border: none;

    background: transparent;
}

.fs-header-menu__back-btn:hover {
    cursor: pointer;
}

.fs-big-blocks-container .section__big-blocks-table {
    margin-top: 0;
}

/* Перезапись стилей Big-Blocks */
.section__big-blocks-table{
    border-spacing: 0;
    *border-collapse: expression('separate', cellSpacing = '0px');
}

.section__big-blocks-table__gap{
    display: none;
}

.section__big-blocks-table__gap__header {
    border-bottom: 1px solid #e5e9f2;
}

.big-data-block{
    padding-left: 0;
    padding-right: 0;
    padding-bottom: 0;
}

#infoBlock1 {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

#infoBlock2 {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

#infoBlock2 .big-data-block__content {
    border-left: 1px solid #e5e9f2;
}

#infoBlock3 {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

#infoBlock4 {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

#infoBlock4 .big-data-block__content {
    border-left: 1px solid #e5e9f2;
}

/* Перезапись основных стилей */
.main-content {
    padding: 0;
}

        .date-range__date-picker{
    position: absolute;
    z-index: 999999;

    padding: 4px;

    background-color: transparent;
}

.date-range__date-picker_open{
    display: block;
}

.date-range__date-picker_hide{
    display: none;
}

        .filters__font-style {
    font-size: 10px;
    font-weight: 900;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.7;
    letter-spacing: 1px;
    color: black;
}

.filters__container {
    position: absolute;
    right: 0;
    z-index: 500;

    width: 29px;
    height: 100%;

    box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.filters__container_opened {
    width: 454px;

    cursor: default;
}

.filters__opened-header {
    width: 454px;
    height: 60px;
    padding-left: 14px;
    padding-right: 11px;
}

.filters__open-btn {
    width: 28px;
    height: 28px;
    margin-top: 16px;

    border: none;

    cursor: pointer;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDB0totUOygAAANhJREFUSMftlD0KwkAQhdeZ2V2TGCSCQkTEv2KxMDZGrGwlF7D3GDbewNLKQvFEVhZ6ApscQMhY2FpmunwHeN9jGJ5SFRX/SEf+gxAKF9ta6eGrSfBEAB62TeFiS6WGL0bBy7fIhFBsZo1T6c0tARMJhC/HwdMQyDWvG2SrBcLnfe8+6FgmAt6mzVvpH8PnKWZJmHvmd55+S+8lJDpLwhwBGEBOAlkS5kbLSnSWhDnhT9KLzEFM4lvkbmQ+LrYNEcluHb2NBuarA5Gx42PP44vDavYrlFJKfQFAPERCDzJPrAAAAABJRU5ErkJggg==') no-repeat center center;
}

.filters__open-btn_reverse {
    float: left;

    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDB8LQu7ptQAAANJJREFUSMftlDFOAzEQRZ0/4zG7WYQ2EpEWrSJYKCwKkiZBVLQRF0ifY9BwA8pUKYJyolQUyQloOACSh24rSpvK7wDvzW/GmEzGN27AhLDoys9UAb65lECAPt0Nj0kiy4dqw4RQOtJ5NzylizCC439YIgx9vE0YcRbhTCjdktXiYs8MvR47nU2KQ1T5ZGRfmRAKgb5Mz791e09R5QACoZfb6HKxvRzR5G0tbwACU4LLfeOqq1p+Skfx5cYYox8eYqHr5/oruryP7Dzpe1vk15/5k1+QGURCkrTymAAAAABJRU5ErkJggg==') no-repeat center center;
}

.filters__clear-btn {
    float: right;

    height: 28px;
    margin-top: 16px;

    border: none;
    border-bottom: 1px dashed black;

    cursor: pointer;
    background: transparent;
}

.filters__content {
    padding: 0 20px;
    padding-top: 10px;
}

.filters__content_hidden {
    display: none;
}
.filters__content .custom-select {
    margin-top: 20px;
}

        .custom-select__list_hidden {
    display: none !important;
}

.custom-select__list_opened {
    display: block !important;
}

        .filter-custom-select__label-text {
    display: block;

    width: 414px;
    margin-bottom: 5px;

    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.43;
    letter-spacing: normal;
    color: black;
}

.filter-custom-select__input-container {
    width: 414px;

    border-radius: 3px;
    
    background-color: #183793;
    cursor: pointer;
}

.filter-custom-select__font-style {
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.43;
    letter-spacing: normal;
    color: black;
}

.filter-custom-select__input {
    float: left;

    width: 382px;
    padding: 10px;
    padding-left: 15px;

    font-weight: bold;

    border: none;

    background: transparent;
}

.filter-custom-select__open-btn {
    float: left;

    width: 32px;

    border: none;

    cursor: pointer;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDB8bX1n50QAAAOVJREFUSMdjYBgFo2AU4AT/F2owaUiy8xCjVkOSnUVDkp2ReMMXaDCzsTL9lxJk+y0jyFaPT62HHs80RVG2fyzMTP+It6BPhjPJXvAVFzvzfyYmpn9yQqxVuAxnYWb6x8zE9N9Mies6aUE0R4vVS5/3PQszE1ZLPPR4prGwMP3jYmf+b6nCfZu8eIBawsaKagnM5ewsTP9NlbjvUBbZUEuYmZj+szAz/Qs341/Mzsr0j42FiXyXY7GEyUuf9z0nG9N/Fham/xxszP/NlalkOLpPFMTYqedyLJYwG8hxXhwtJUbBMAMAkWBEQoOyBmwAAAAASUVORK5CYII=') no-repeat center center;
}

.filter-custom-select__open-btn_when-multi-select {
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDCEp1kuzLAAAAC1JREFUSMdjYBgFo2DIg60MDAz/CeCt+AxgooIj/o/GwWgcjMbBSI+DUTAMAAAf2B8q+ZTHEwAAAABJRU5ErkJggg==') no-repeat center center;
}

.filter-custom-select__open-btn_opened {
    background: url('data:image/png;base64,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') no-repeat center center;
}

.filter-custom-select__open-btn_when-multi-select-opened {
    background: url('data:image/png;base64,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') no-repeat center center;
}

.filter-custom-select__list {
    display: none;
    position: absolute;
    list-style-type: none;

    width: 414px;
    overflow: auto;
    overflow-x: hidden;
    padding: 0;

    border: 1px solid white;

    box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.1);
    background-color: #183793;
}

.filter-custom-select__list-item {
    display: block;
    overflow-x: hidden;

    width: 412px;
    min-height: 30px;
    padding: 5px 0;
    padding-right: 35px;

    color: black;

    background: transparent;
    cursor: pointer;
}

.filter-custom-select__list-item_selected {
    background: white;
    color: black;
}

.filter-custom-select__list-item-indicator {
    float: left;

    width: 30px;
    height: 20px;
    padding-left: 10px;

    font-size: 13px;
    text-align: center;
    color: black;

    background: transparent;
}

.filter-custom-select__list-item-button {
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

.filter-custom-select__list-item-folder {
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

.filter-custom-select__list-item_selected .filter-custom-select__list-item-button {
    color: black;
}

    </style>

    <script type="text/javascript">
        function getLineData(options) {
    var lineData = { series: [], categories: [] };

    for (var i = 0; i < options.dataSets[0].series.length; ++i) {
        lineData.series.push(options.dataSets[0].series[i]);
    }

    for (var i = 0; i < options.dataSets[0].categories.length; ++i) {
        lineData.categories.push(options.dataSets[0].categories[i]);
    }

    lineData.numbersAfterComma = options.dataSets[0].numbersAfterComma;

    return lineData;
}

function drawLineChart(container, lineData) {
    if (!lineData.numbersAfterComma && lineData.numbersAfterComma !== 0) {
        lineData.numbersAfterComma = 1;
    }

    Highcharts.chart(container, {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: lineData.categories
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(customRound(this.value, lineData.numbersAfterComma), lineData.numbersAfterComma, '.', ' ');
                }
            }
        },
        plotOptions: {
            line: {
                enableMouseTracking: false
            },
            series: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Highcharts.numberFormat(customRound(this.y, lineData.numbersAfterComma), lineData.numbersAfterComma, '.', ' ');
                    }
                },
                pointPlacement: 'on',
                lineWidth: 4
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            itemMarginTop: 5,
            itemMarginBottom: 5,
            padding: 0,
            itemMarginBottom: 0,
            navigation: {
                activeColor: getPrimaryColor()
            },
            labelFormatter: function() {
                return labelFormatter(this.name.toUpperCase());
            }
        },
        credits: {
            enabled: false
        },
        series: lineData.series
    });
}

        function drawPieChart(container, pieData) {
    var calcPieTotal = function() {
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
                    formatter: function() {
                        if (pieData.dataLabelFormat) {
                            switch(pieData.dataLabelFormat) {
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
                        legendItemClick: function(event) {
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
            labelFormatter: function() {
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

        chart.renderer.label('<div id="'+ id + '_total" style="width: ' + textWidth +
            'px; text-align: center"><span class="pie-chart-subtitle">Всего</span></br><span class="pie-chart-title">' +
            pieData.title + '</span></div>', textX, textY, null, null, null, true).add();
    }
}

        // _ перед переменной или функцией означает, что эту переменную лучше не трогать, ибо она подразумевалась приватной

var _customSelectArray = [];
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
    var selectData = _customSelectArray[selectIndex].data;

    // Раскоментить, если понадобится ставить галочку, когда выделена только папка, но не потомки
    // if (selectData[folderIndex].selected) {
    //     return true;
    // }

    for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
        if (selectData[i].selected) {
            return true;
        }
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
    setTimeout(function() {
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
            selectListRef.css('height',  options.maxItemsCount * options.itemHeight + 3 + 'px');

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
    $('.custom-select__list_opened').each(function(index, elem) {
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

    $.each(_customSelectArray, function(index, select) {
        var customSelectResultSelectRef = { id: select.options.id, data: [] };

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

    return { result: result, count: count };
}

function _customSelectSearch(event, selectIndex) {
    // Фикс для тонкого клиента, так как в тонком onkeyup не работает на кнопки с буквами
    // Поэтому для считывания актуального текста из инпута используется setTimeout, для считывания букв используется onkeypress,
    // а для специальных кнопок (backspace) используется onkeydown
    var input = event.srcElement;

    if (event.type === 'keypress' || event.type === 'keydown' && event.keyCode === 8) {
        setTimeout(function() {
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
        _customSelectArray.push({ options: options, data: data });

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
        customSelectContent += '" onclick="_customSelectOpen(' + selectIndex +')"></button></div></label>' + customSelectUl;
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

        // _ перед переменной или функцией означает, что эту переменную лучше не трогать, ибо она подразумевалась приватной
// Здесь хранится выбранный промежуток (смотреть, нельзя менять)
var dateRangeSelectorModel= {
    from: "01.04.2019",
    to: "01.05.2019"
};
// true, когда курсор мыши над контролом
var dateRangeSelectorActive = false;

var _dateRangeSelectorRef;
var _dateRangeSelectorInputRef;

function _updateDateRangeText() {
    if (_dateRangeSelectorInputRef && _dateRangeSelectorInputRef[0]) {
        var updateDateRangeFromData = dateRangeSelectorModel.from.split('.');
        var updateDateRangeToData = dateRangeSelectorModel.to.split('.');
        var updateDateRangeFlag = true;

        if (updateDateRangeFlag && +updateDateRangeFromData[2] > +updateDateRangeToData[2]) {
            dateRangeSelectorModel.from = dateRangeSelectorModel.to;

            updateDateRangeFlag = false;
        } else {
            updateDateRangeFlag = +updateDateRangeFromData[2] === +updateDateRangeToData[2];
        }

        if (updateDateRangeFlag && +updateDateRangeFromData[1] > +updateDateRangeToData[1]) {
            dateRangeSelectorModel.from = dateRangeSelectorModel.to;

            updateDateRangeFlag = false;
        } else {
            updateDateRangeFlag = +updateDateRangeFromData[1] === +updateDateRangeToData[1];
        }

        if (updateDateRangeFlag && +updateDateRangeFromData[0] > +updateDateRangeToData[0]) {
            dateRangeSelectorModel.from = dateRangeSelectorModel.to;

            updateDateRangeFlag = false;
        } else {
            updateDateRangeFlag = +updateDateRangeFromData[0] === +updateDateRangeToData[0];
        }

        _dateRangeSelectorInputRef.val(dateRangeSelectorModel.from + " - " + dateRangeSelectorModel.to);
    }
}

// Открытие/закрытие контрола
function toggleDateRangeSelector() {
    if (_dateRangeSelectorRef.hasClass("date-range__date-picker_open")) {
        _dateRangeSelectorRef.addClass("date-range__date-picker_hide");
        _dateRangeSelectorRef.removeClass("date-range__date-picker_open");
    } else {
        _dateRangeSelectorRef.addClass("date-range__date-picker_open");
        _dateRangeSelectorRef.removeClass("date-range__date-picker_hide");
    }

    _updateDateRangeText();
}

function createDateRangeSelector(activatorName, inputName) {
    var dateRangeToday = new Date();
    var currentMonth = String(dateRangeToday.getMonth() + 1);

    _dateRangeSelectorRef = $('.date-range__date-picker');
    _dateRangeSelectorInputRef = $('.' + inputName);

    if (currentMonth.length === 1) {
        currentMonth = '0' + currentMonth;
    }

    if (_dateRangeSelectorInputRef && _dateRangeSelectorInputRef[0]) {
        _dateRangeSelectorInputRef.val(dateRangeSelectorModel.from + " - " + dateRangeSelectorModel.to);
    }

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Пред',
        nextText: 'След',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['вс','пн','вт','ср','чт','пт','сб'],
        weekHeader: 'Нед',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $("#date-picker-from").datepicker($.extend({},
        $.datepicker.regional["ru"], {
            onSelect: function(date) {
                dateRangeSelectorModel.from = date;
            },
            defaultDate: dateRangeSelectorModel.from,
            buttonText: "Select date"
    }));

    $("#date-picker-to").datepicker($.extend({},
        $.datepicker.regional["ru"], {
            onSelect: function(date) {
                dateRangeSelectorModel.to = date;
            },
            defaultDate: dateRangeSelectorModel.to,
            buttonText: "Select date"
    }));

    $('.date-range__date-picker').on('mouseenter', function() {
        dateRangeSelectorActive = true;
    });

    $('.date-range__date-picker').on('mouseleave', function() {
        dateRangeSelectorActive = false;
    });

    $('.' + activatorName).click(function() {
        toggleDateRangeSelector();
    });
}

        // Необходимое зло (правда правда, это было необходимо)
var defColors = [
    '#ffa94b', // 0
    '#049fd6',
    '#f73c60',
    '#8c4580',
    '#b84b52',
    '#ffd028', // 5
    '#008f79',
    '#938cd1',
    '#d13282',
    '#0a4a99',
    '#c85d76', // 10
    '#3cda50',
    '#6a65a3',
    '#01634d',
    '#572236',
    '#f27f6e', // 15
    '#1aa7c7',
    '#931546',
    '#b6192b',
    '#d1a269'
];

var filtersFirstTime = true;
var filtersDefaults;
var clickInCustomSelect = false;
var mainContentHeight = 0;
var filtersRef;
var filtersContentRef;

function showSupply(titleSupply, dataSupply) {
    dataSupply = parseDataFromString(dataSupply);
    var total = 0;

    dataSupply = dataSupply.sort(function(a, b) { return b.y - a.y });

    for (var i = 0, colorsCounter = 0, colorIndex = 0; i < dataSupply.length; ++i) {
        total += +dataSupply[i].y;

        if (colorsCounter < defColors.length) {
            dataSupply[i].color = dataSupply[i].color ? dataSupply[i].color : defColors[colorIndex];
            ++colorIndex;
            ++colorsCounter;

            if (colorIndex === defColors.length) {
                colorIndex = 0;
            }
        }

        if (dataSupply[i].color) {
            dataSupply[i].color = getLinearGradient([dataSupply[i].color]);
        }
    }

    $('#infoBlock1 .big-data-block__header__text').text(titleSupply);

    var options = {
        id: 1,
        type: "pieChart",
        colSpan: 2,
        maxColSpan: 5,
        onMaximization: changeMainContentHeight,
        dataSets: [
            {
                id: 1,
                data: dataSupply,
                total: total,
                autoItemMargin: true,
                legendWidthInPercentages : 27,
                onItemClick: function(event) {
                    if (event.point.filters) {
                        for (var i = 0; i < event.point.filters.length; ++i) {
                            if (event.point.filters[i].filterRefId !== undefined && event.point.filters[i].filterRefId !== null &&
                                event.point.filters[i].itemRefIds) {
                                    for (var j = 0; j < event.point.filters[i].itemRefIds.length; ++j) {
                                        customSelectSelect(event.point.filters[i].filterRefId, event.point.filters[i].itemRefIds[j], true, true);
                                    }
                            }
                        }

                        calcFoodSecurity();
                    }
                }}
        ]
    };

    renderChart(options);
}

function showSupplyPrices(titleSupplyPrices, dataSupplyPrices, categoriesSupplyPrices) {
    dataSupplyPrices = parseDataFromString(dataSupplyPrices);
    categoriesSupplyPrices = parseDataFromString(categoriesSupplyPrices);

    for (var i = 0, colorsCounter = 0, colorIndex = 10; i < dataSupplyPrices.length && colorsCounter < defColors.length; ++i) {
        dataSupplyPrices[i].color = getLinearGradient([defColors[colorIndex]]);
        ++colorIndex;
        ++colorsCounter;

        if (colorIndex === defColors.length) {
            colorIndex = 0;
        }
    }

    $('#infoBlock2 .big-data-block__header__text').text(titleSupplyPrices);

    var options = {
        id: 2,
        type: "lineChart",
        colSpan: 3,
        maxColSpan: 5,
        onMaximization: changeMainContentHeight,
        dataSets: [
            { id: 1, series: dataSupplyPrices, categories: categoriesSupplyPrices, numbersAfterComma: 2 }
        ]
    }

    renderChart(options);
}

function showImplementation(titleImplementation, dataImplementation) {
    dataImplementation = parseDataFromString(dataImplementation);
    var total = 0;

    for (var i = 0, colorsCounter = 0, colorIndex = 5; i < dataImplementation.length; ++i) {
        total += +dataImplementation[i].y;

        if (colorsCounter < defColors.length) {
            dataImplementation[i].color = dataImplementation[i].color ? dataImplementation[i].color : defColors[colorIndex];
            ++colorIndex;
            ++colorsCounter;

            if (colorIndex === defColors.length) {
                colorIndex = 0;
            }
        }

        if (dataImplementation[i].color) {
            dataImplementation[i].color = getLinearGradient([dataImplementation[i].color]);
        }
    }

    $('#infoBlock3 .big-data-block__header__text').text(titleImplementation);

    var options = {
        id: 3,
        type: "pieChart",
        colSpan: 2,
        maxColSpan: 5,
        onMaximization: changeMainContentHeight,
        dataSets: [
            {
                id: 1,
                data: dataImplementation,
                total: total,
                autoItemMargin: true,
                legendWidthInPercentages : 27
            }
        ]
    };

    renderChart(options);
}

function showImplementationPrices(titleImplementationPrices, dataImplementationPrices, categoriesImplementationPrices) {
    dataImplementationPrices = parseDataFromString(dataImplementationPrices);
    categoriesImplementationPrices = parseDataFromString(categoriesImplementationPrices);

    for (var i = 0, colorsCounter = 0, colorIndex = 15; i < dataImplementationPrices.length && colorsCounter < defColors.length; ++i) {
        dataImplementationPrices[i].color = getLinearGradient([defColors[colorIndex]]);
        ++colorIndex;
        ++colorsCounter;

        if (colorIndex === defColors.length) {
            colorIndex = 0;
        }
    }

    $('#infoBlock4 .big-data-block__header__text').text(titleImplementationPrices);

    var options = {
        id: 4,
        type: "lineChart",
        colSpan: 3,
        maxColSpan: 5,
        onMaximization: changeMainContentHeight,
        dataSets: [
            { id: 1, series: dataImplementationPrices, categories: categoriesImplementationPrices, numbersAfterComma: 2 }
        ]
    }

    renderChart(options);
}

function onItemClickInCustomSelect() {
    clickInCustomSelect = true;
}

function showFilters(filters) {
    filters = parseDataFromString(filters);

    $('.filters__content')[0].innerHTML = '';

    if (filtersFirstTime) {
        filtersFirstTime = false;
        filtersDefaults = [];

        for (var i = 0; i < filters.length; ++i) {
            var values = [];
            filters[i].data = transformCustomSelectData(filters[i].data);

            for (var j = 0; j < filters[i].data.length; ++j) {
                if (filters[i].data[j].selected) {
                    values.push(j);
                }
            }

            filtersDefaults.push(values);
        }
    }

    for (var i = 0; i < filters.length; ++i) {
        createCustomSelect(
            $('.filters__content')[0],
            {
                name: filters[i].name,
                id: filters[i].id,
                multiSelect: filters[i].multiSelect,
                color: getSecondaryColor(),
                altOpenMode: i > 4 ? true : false,
                canSelectFolder: true,
                cssPrefix: 'filter',
                onItemClick: onItemClickInCustomSelect
            },
            filters[i].data
        );
    }
}

function createDateRangeSelectorWithData(data) {
    data = parseDataFromString(data);
    dateRangeSelectorModel = data;
    
    createDateRangeSelector('fs-header-menu__input-container', 'fs-header-menu__input');
}

function windowResizeCalc(filtersRef, filtersContentRef) {
    var filtersContentHeight = filtersContentRef.css('height');
    var filtersContentHeightNumber = + filtersContentHeight.substring(0, filtersContentHeight.length - 2);

    if (mainContentHeight > filtersContentHeightNumber) {
        filtersRef.css('height', mainContentHeight + 'px');
    } else {
        filtersRef.css('height', (filtersContentHeightNumber + 60) + 'px');
    }
}

function clearAll() {
    customSelectMultiSelect(filtersDefaults, true, true);
    calcFoodSecurity();
}

function changeMainContentHeight(bigBlock) {
    if (bigBlock.hasClass('resize-target-max')) {
        mainContentHeight += 260;
    } else {
        mainContentHeight -= 260;
    }

    windowResizeCalc(filtersRef, filtersContentRef);
}

function init() {
    var windowRef = $(window);
    filtersRef = $('.filters__container');
    filtersContentRef = $('.filters__content');
    mainContentHeight = document.body.scrollHeight - 80;

    windowResizeCalc(filtersRef, filtersContentRef);

    windowRef.resize(function() {
        windowResizeCalc(filtersRef, filtersContentRef);
    });
    
    // Сделано через глобальное событие клика в документе, а не через клик по background-у, из-за поддержки ie 5 (лучше не трогать, правда)
    $(document).on('click', function(event) {
        var customOpenedSelects = $('.custom-select__list_opened');
        var openedDateRangeSelectorRef = $('.date-range__date-picker_open');
        var fsHeaderMenuLabelRef = $('.fs-header-menu__label');
        var needToCloseCustomOpenedSelects = true;
        
        if (openedDateRangeSelectorRef[0] && !$.contains(fsHeaderMenuLabelRef[0], event.target) && !dateRangeSelectorActive) {
            toggleDateRangeSelector();
        }

        if (customOpenedSelects) {
            for (var i = 0; i < customOpenedSelects.length; ++i) {
                if (clickInCustomSelect) {
                    needToCloseCustomOpenedSelects = false;
                    clickInCustomSelect = false;
                } else if ($.contains(customOpenedSelects[i].parentElement, event.target)) {
                    needToCloseCustomOpenedSelects = false;
                }
            }

            if (needToCloseCustomOpenedSelects) {
                closeAllCustomSelects();
            }
        }

        if (!filtersActive) {
            filtersChangeState(event, true);
        }
    });
}

    </script>
</head>
<body>
<?// require_once 'menu.php'; ?>
    
    <div class="main-content">
        <div class="section__content fs-section-content">
            <div class="section__content__container">
<script type="text/javascript">
    var filtersOpened = false;
    var filtersFutureCloseFlag = false;
    var filtersActive = false;

    var filtersContentRef = $('.filters__content');
    var filtersClosedHeaderRef = $('.filters__closed-header');
    var filtersOpenedHeaderRef = $('.filters__opened-header');
    var filtersContainerRef = $('.filters__container');

    // _futureClose - запрещает только одно следующее открытие фильтров (было нужно из-за ie 5, ибо нет background-а)
    // Аккуратнее в использовании _futureClose (по возможности не используйте)
    function filtersChangeState(event, isOpened, _futureClose) {
        if (isOpened || filtersFutureCloseFlag) {
            if (filtersOpened) {
                filtersContentRef.hide();
                filtersClosedHeaderRef.show();
                filtersOpenedHeaderRef.hide();
                filtersContainerRef.removeClass('filters__container_opened');

                filtersOpened = false;
                closeAllCustomSelects();
            }

            filtersFutureCloseFlag = false;
        } else {
            if (!filtersOpened) {
                filtersContentRef.show();
                filtersClosedHeaderRef.hide();
                filtersOpenedHeaderRef.show();
                filtersContainerRef.addClass('filters__container_opened');

                filtersOpened = true;
            }
        }

        if (_futureClose) {
            filtersFutureCloseFlag = true;
        }
    }
</script>

            <div class="fs-big-blocks-container">
                
                <table class="section__big-blocks-table">
    <tbody>

    <tr class="section__big-blocks-table__row" style="z-index: 400" >

        <td class="big-data-block" id="infoBlock1" colspan="2">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Поступление, тыс. тонн</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="1"
     data-height="340px"
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
                     style="overflow: hidden; height:340px ">

                </div>
                
            </div>
        </td>

        

        
        <td class="section__big-blocks-table__gap">
            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
        </td>
        

        
        <td class="big-data-block" id="infoBlock2" colspan="3">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Цена поставки, руб.</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="2"
     data-height="340px"
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
                     style="overflow: hidden; height:340px ">

                </div>
                
            </div>
        </td>

        
    <tr class="section__big-blocks-table__row-gap"></tr>
    
    <tr class="section__big-blocks-table__row" style="z-index: 390" >

        

        

        

        
        <td class="big-data-block" id="infoBlock3" colspan="2">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Реализация, тыс. тонн</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="3"
     data-height="340px"
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
                     style="overflow: hidden; height:340px ">

                </div>
                
            </div>
        </td>

        

        
        <td class="section__big-blocks-table__gap">
            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
        </td>
        

        
        <td class="big-data-block" id="infoBlock4" colspan="3">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Цена реализации, руб.</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="4"
     data-height="340px"
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
                     style="overflow: hidden; height:340px ">

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

<script type="text/javascript">
var productArr = [], districtArr = [], regionArr = [], companyArr = [], countryArr = [];
function showFiltersOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=ProdBezopasnost&func=getFilterFromServer",
        success: function(data) {
			var datax = JSON.parse(data);
			//заполняем мТовары
			var productIndex = 0;
			for(var i = 0; i < datax[8].data.length; i++) {
				productArr[productIndex] = {"id": datax[8].data[i].id, "text": datax[8].data[i].text};
				productIndex++;
				if(typeof datax[8].data[i].children !== 'undefined' && datax[8].data[i].children.length != 0) {
					for(var j = 0; j < datax[8].data[i].children.length; j++) {
						productArr[productIndex] = {"id":datax[8].data[i].children[j].id, "text":datax[8].data[i].children[j].text};
						productIndex++;
					}
				}
			}
			//заполняем мОкруга
			districtArr = datax[6].data;
			//заполняем мРегионы
			regionArr = datax[7].data;
			//заполняем мПредприятие
			companyArr = datax[4].data;
			//заполняем мСтраны
			countryArr = datax[5].data;
			showFilters(data);
        },
        error:  function(){
            //alert('Ошибка получения данных для функции showFilters');
        }
    });
}

//getDataFromServer(startDate, endDate, compareDate, dType, measure, 
//country, regions, districts, products, company, period, productArr, districtArr, regionArr, countryArr);
function getDataOnline(startDate, endDate, compareDate, dType, measure, country='', regions='', districts='', products='', company='', period='', productArr='', districtArr='', regionArr='', countryArr='') {
	var tmp = startDate.split('.');
	startDate = tmp[2]+"-"+tmp[1]+"-"+tmp[0];
	tmp = endDate.split('.');
	endDate = tmp[2]+"-"+tmp[1]+"-"+tmp[0];
	tmp = compareDate.split('.');
	compareDate = tmp[2]+"-"+tmp[1]+"-"+tmp[0];
	/*
	var paramStr = 'date1='+startDate+'&date2='+endDate+'&date3='+compareDate+'&type4='+dType+'&digs5='+measure;
	if(country != '' || regions != '' || districts != '' || products != '' || company != '' || period != '' || productArr != '' || districtArr != '' || regionArr != '' || countryArr != '') {
		paramStr = paramStr + '&data6=' + JSON.stringify(country) + '&data7=' + JSON.stringify(regions) + '&data8=' + JSON.stringify(districts) + '&data9=' + JSON.stringify(products) + '&data10=' + company + '&data11=' + period + '&data12=' + JSON.stringify(productArr) + '&data13=' + JSON.stringify(districtArr) + '&data14=' + JSON.stringify(regionArr) + '&data15=' + JSON.stringify(countryArr);
	}
	
	var param = utf8_to_b64(paramStr);
	*/
	if(country != '' || regions != '' || districts != '' || products != '' || company != '' || period != '' || productArr != '' || districtArr != '' || regionArr != '' || countryArr != '') {
		var param = [
			{"Ключ":"date1", "Значение":startDate},
			{"Ключ":"date2", "Значение":endDate},
			{"Ключ":"date3", "Значение":compareDate},
			{"Ключ":"type4", "Значение":dType},
			{"Ключ":"digs5", "Значение":measure},
			{"Ключ":"data6", "Значение":country},
			{"Ключ":"data7", "Значение":regions},
			{"Ключ":"data8", "Значение":districts},
			{"Ключ":"data9", "Значение":products},
			{"Ключ":"data10", "Значение":company},
			{"Ключ":"data11", "Значение":period},
			{"Ключ":"data12", "Значение":productArr},
			{"Ключ":"data13", "Значение":districtArr},
			{"Ключ":"data14", "Значение":regionArr},
			{"Ключ":"data15", "Значение":countryArr},
		];
	} else {
		var param = [
			{"Ключ":"date1", "Значение":startDate},
			{"Ключ":"date2", "Значение":endDate},
			{"Ключ":"date3", "Значение":compareDate},
			{"Ключ":"type4", "Значение":dType},
			{"Ключ":"digs5", "Значение":measure},
		];
	}
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=ProdBezopasnost&func=getDataFromServer&json=true&param="+utf8_to_b64(JSON.stringify(param)),
        success: function(data) {
			var datax = JSON.parse(data);
			// 1) Поступление
			var measureName;
			if (measure == 1) {
				measureName = "килограмм";
			} else if (measure == 1000) {
				measureName = "тонн";
			} else {
				measureName = "тыс. тонн";
			}
				
			titleSupply = "Поступление " + measureName;
			showSupply(titleSupply, datax["dataSupply"]);
			
			// 2) Цена поставки
			var titleSupplyPrices = "Цена поставки руб.";
			showSupplyPrices(titleSupplyPrices, datax["dataSupplyPrices"], datax["categoriesSupplyPrices"]);
	
			// 3) Реализация
			var titleImplementation = "Реализация " + measureName;
			showImplementation(titleImplementation, datax["dataImplementation"]);
			
			// 4) Цена реализации
			var titleImplementationPrices  = "Цена реализации руб.";
			showImplementationPrices(titleImplementationPrices, datax["dataImplementationPrices"], datax["categoriesImplementationPrices"]);
        },
        error:  function(){
            //alert('Ошибка получения данных для функции getData');
        }
    });
}

// Установка даты актуальности
function setActualDateOnline() { 
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=ProdBezopasnost&func=getActualDate",
        success: function(data) {
			setActualDate(data);
        },
        error:  function(){
            //alert('Ошибка получения данных для функции setActualDate');
        }
    });
}

function calcFoodSecurityOnline(data) {
	//ДатаНачала
	startDate = data.period.from;
	//ДатаОкончания
	endDate = data.period.to;
	
	var curData, dType, compareDate, company='', period;
	var countries = [];
	var district = [];
	var regions = [];
	var products = [];
	for(var i = 0; i < data.filters.length; i++) {
		curData = data.filters[i];
		if(curData.id == 1) {
			switch (curData.data[0]) {
				case 1:
					dType = "Основной";
					break;
				case 2:
					dType = "Округа";
					break;
				case 3:
					dType = "Регионы";
					break;
				case 4:
					dType = "Страны";
					break;
				case 5:
					dType = "Товары";
					break;	
			}
		} else if (curData.id == 2) {
			compareDate = "01.01."+(2004 + curData.data[0]);
		} else if (curData.id == 3) {
			switch (curData.data[0]) {
				case 1:
					period = "День";
					break;
				case 2:
					period = "Месяц";
					break;
				case 3:
					period = "Квартал";
					break;
				case 4:
					period = "Полугодие";
					break;
				case 5:
					period = "Год";
					break;	
				case 6:
					period = "Неделя";
					break;	
			}
		} else if (curData.id == 4) {
			switch (curData.data[0]) {
				case 1:
					measure = 1;
					break;
				case 2:
					measure = 1000;
					break;
				case 3:
					measure = 1000000;
					break;
			}
		} else if (curData.id == 5) {
			for(var j = 0; j < curData.data.length; j++) {
				countries[j] = countryArr[curData.data[j] - 1]
			}
		} else if (curData.id == 6) {
			for(var j = 0; j < curData.data.length; j++) {
				district[j] = districtArr[curData.data[j] - 1]
			}
		} else if (curData.id == 7) {
			for(var j = 0; j < curData.data.length; j++) {
				regions[j] = regionArr[curData.data[j] - 1]
			}
		} else if (curData.id == 8) {
			if(curData.data.length > 0) {
				company = companyArr[curData.data[0] - 1]
			}
		} else if (curData.id == 0) {
			for(var j = 0; j < curData.data.length; j++) {
				products[j] = productArr[curData.data[j] - 1]
			}
		}
	}
	
	getDataOnline(startDate, endDate, compareDate, dType, measure, countries, regions, district, products, company, period, productArr, districtArr, regionArr, countryArr);
}

function utf8_to_b64( str ) {
    return window.btoa(unescape(encodeURIComponent( str )));
}
    $(document).ready(function () {
        attachButtonsEventPerformers();
        //init();
		
		var year = new Date().getFullYear();
		var startDate = "01.01."+year;
		var endDate = "31.12."+year;
		var compareDate = "01.01."+(year-1);
		var dType = "Основной";
		var period = "Месяц";
		var measure = 1000000;
		
		showFiltersOnline();
		createDateRangeSelectorWithData('{"from": "'+startDate+'", "to": "'+endDate+'"}');
		getDataOnline(startDate, endDate, compareDate, dType, measure);
		setActualDateOnline();
    });
</script>
</html>
