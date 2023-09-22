<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
    <title>НТО</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>

    <script>
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
    }    if (!pieData.itemMargin && pieData.autoItemMargin) {
        var linesCounter = 0;

        for (var i = 0; i < pieData.data.length; ++i) {
            linesCounter += labelLinesCounter(pieData.data[i].name, container, pieData._legendWidth / 100);
        }        pieData.itemMargin = container.offsetHeight - linesCounter * 20;

        if (pieData.itemMargin > 0) {
            pieData.itemMargin /= pieData.data.length + 1;

            if (pieData.itemMargin > 40) {
                pieData.itemMargin = 40;
            }
        } else {
            pieData.itemMargin = 0;
        }
    }    if (!pieData.numbersAfterComma && pieData.numbersAfterComma !== 0) {
        pieData.numbersAfterComma = 1;
    }    if (!pieData._legendState) {
        pieData._legendState = [];

        for (var i = 0; i < pieData.data.length; ++i) {
            pieData._legendState.push(true);
        }
    }    if (pieData.total) {
        calcPieTotal(pieData);
    }    var chart = Highcharts.chart(container, {
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
                        }                        return '<b>' + Highcharts.numberFormat(customRound(this.y, pieData.numbersAfterComma), pieData.numbersAfterComma, '.', ' ') +
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
}function drawTotalOnCenter(pieData, chart, id) {
    if (pieData.title) {
        var label = $('#' + id + '_total');

        if (label) {
            label.remove();
        }        var textX = chart.plotLeft + (chart.plotWidth * 0.5);
        var textY = chart.plotTop + (chart.plotHeight * 0.44);
        var textWidth = 100;
        textX = textX - (textWidth / 2);

        chart.renderer.label('<div id="'+ id + '_total" style="width: ' + textWidth +
            'px; text-align: center"><span class="pie-chart-subtitle">Всего</span></br><span class="pie-chart-title">' +
            pieData.title + '</span></div>', textX, textY, null, null, null, true).add();
    }
}        // _ перед переменной или функцией означает, что эту переменную лучше не трогать, ибо она подразумевалась приватной

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
        }        ++counter;
    }    return counter;
}function _customSelectGetFolderState(selectIndex, folderIndex) {
    var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
    var selectData = _customSelectArray[selectIndex].data;

    // Раскоментить, если понадобится ставить галочку, когда выделена только папка, но не потомки
    // if (selectData[folderIndex].selected) {
    //     return true;
    // }    for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
        if (selectData[i].selected) {
            return true;
        }
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
    }    if (data[itemIndex].isFolder) {
        newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' + (!data[itemIndex].selected ?
            '<div class="' + options.cssPrefix + 'custom-select__list-item-indicator">' + (_customSelectGetFolderState(selectIndex, itemIndex) ? '&#10004;' : '') +
            '</div><button class="' + options.cssPrefix + 'custom-select__list-item-button">' + (data[itemIndex].isOpened ? '&#9660;' : '&#9654;') +
            '</button>' : '') + data[itemIndex].text + '</li>';
    } else {
        newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' +
            (options.indicatorForSelectedItems ? '<div class="' + options.cssPrefix + 'custom-select__list-selected-item-indicator">' +
            (data[itemIndex].selected ? '&#10004;' : '') + '</div>' : '') +
            data[itemIndex].text + '</li>';
    }    return newItem;
}function _customSelectUpdateList(selectIndex, selectListRef, endOfSearch) {
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
            }            if (condition) {
                newItems += _customSelectRenderItem(data, selectIndex, i);
            }            if (data[i].isVisibleInFolder && data[i].isVisibleForSearch) {
                ++visibleItemsCount;
            }
        }        selectListRef.html(newItems);

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
}function _customSelectOpenFolder(selectIndex, folderIndex, isOpened) {
    var data = _customSelectArray[selectIndex].data;
    var folderLevel = data[folderIndex].level;
    var counter = 0;

    if (isOpened !== undefined && isOpened !== null) {
        data[folderIndex].isOpened = isOpened;
    } else {
        data[folderIndex].isOpened = !data[folderIndex].isOpened;
    }    if (data[folderIndex].isOpened) {
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
    }    _customSelectUpdateList(selectIndex);

    return counter;
}function _customSelectInputTotalCalc(data, options) {
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
    }    return customSelectCounter;
}function _customSelectUpdateInput(selectRef, selectIndex, needToClear) {
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
}function closeAllCustomSelects() {
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
        }        _customSelectUpdateList(selectIndex, selectListRef, true);
        _customSelectUpdateInput(selectRef);
    });
}function getSelectedIdsFromCustomSelect() {
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

        }        result.push(customSelectResultSelectRef);
    });

    return result;
}function _customSelectOpen(selectIndex, onlyOpen) {
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
            }            _customSelectUpdateList(selectIndex, customSelectListRef);
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
        }        customSelectListRef.addClass('custom-select__list_opened');

        if (customSelectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
            customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
        } else {
            customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
        }
    }
}function customSelectMultiSelect(values, needToUpdateInputs, withDefaultValues) {
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
                        }                        if (valueIndex + 1 < values[j].length) {
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
                    }                    if (i === values[j][0]) {
                        if (!select.data[i].isFolder || select.options.canSelectFolder) {
                            if (!select.data[i].selected) {
                                select.data[i].selected = true;

                                if (select.data[i].isFolder) {
                                    _customSelectOpenFolder(j, i, false);
                                }
                            } else {
                                unselectedElemFlag = true;
                            }                            selectedElemFlag = true;
                        }
                    } else {
                        if ((!select.data[i].isFolder || select.options.canSelectFolder) && firstElemIndex === -1) {
                            firstElemIndex = i;
                        }                        if (select.data[i].selected) {
                            select.data[i].selected = false;
                            unselectedElemFlag = true;
                        }
                    }
                }                if (!selectedElemFlag && withDefaultValues && firstElemIndex > -1) {
                    select.data[firstElemIndex].selected = true;

                    if (select.data[firstElemIndex].isFolder) {
                        _customSelectOpenFolder(j, firstElemIndex, false);
                    }                    selectedElemFlag = true;
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
        }        if (needToUpdateInputs) {
            _customSelectUpdateInput(selectRef, j);
        }        _customSelectUpdateList(j, selectRef.find('.' + options.cssPrefix + 'custom-select__list'));
    }
}function customSelectSelect(selectNumber, itemNumber, needToUpdateInput, byId) {
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
    }    var selectData = _customSelectArray[selectNumber].data;

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
            }            selectData[itemNumber].selected = !selectData[itemNumber].selected;
        }

        if (needToUpdateInput) {
            _customSelectUpdateInput(customSelectRef, selectNumber);
        }        _customSelectUpdateList(selectNumber, customSelectListRef);
    }
}function _customSelectSelectParentsInSearch(data, folderIndex) {
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
}function _customSelectSearchRec(selectIndex, text, data, folderIndex, allSelectMode) {
    var result = false;
    var count = 0;

    if (allSelectMode) {
        for (var i = folderIndex + 1; i < data.length && data[i].level > data[folderIndex].level; ++i, ++count) {
            data[i].isVisibleForSearch = true;

            if (data[i].isFolder && data[i].selected) {
                i += _customSelectGetChildrenCount(selectIndex, i);
            }
        }        result = true;
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
                        }                        shift = lowLvlResult.count;
                    }

                    i += shift;
                    count += shift;
                }
            }
        }
    }    return { result: result, count: count };
}function _customSelectSearch(event, selectIndex) {
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
                            }                            shift = lowLvlResult.count;
                        }                        i += shift;
                    }
                }
            }            _customSelectUpdateList(selectIndex);
        }, 0);
    }
}function _transformCustomSelectDataRec(newData, data, level) {
    for (var i = 0; i < data.length; ++i) {
        if (data[i].children && data[i].children.length > 0) {
            data[i].isFolder = true;
        }        data[i].level = level;
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
}function transformCustomSelectData(data) {
    newData = [];

    for (var i = 0; i < data.length; ++i) {
        if (data[i].children && data[i].children.length > 0) {
            data[i].isFolder = true;
        }        data[i].level = 0;
        data[i].isVisibleInFolder = true;
        data[i].isVisibleForSearch = true;

        if (data[i].isFolder) {
            data[i].isOpened = false;

            newData.push(data[i]);

            _transformCustomSelectDataRec(newData, data[i].children, 1);
        } else {
            newData.push(data[i]);
        }
    }    return newData;
}function _customSelectItemClick(event, selectIndex, itemIndex) {
    if ($(event.target).hasClass('filter-custom-select__list-item-button')) {
        _customSelectOpenFolder(selectIndex, itemIndex);
    } else {
        customSelectSelect(selectIndex, itemIndex);
    }    if (_customSelectArray[selectIndex].options.onItemClick) {
        _customSelectArray[selectIndex].options.onItemClick(_customSelectArray[selectIndex].data[itemIndex]);
    }
}function createCustomSelect(parent, options, data) {
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
    }    if (!alreadyAdded) {
        _customSelectArray.push({ options: options, data: data });

        selectIndex = _customSelectIdsCounter;
        ++_customSelectIdsCounter;
    }    var customSelectInputText = data[0].text;

    if (!options.multiSelect) {
        var customSelectCounter = 0;
        var firstItemIndex = -1;

        for (var i = 0; i < data.length; ++i) {
            if (!data[i].isFolder || options.canSelectFolder) {
                if (firstItemIndex === -1) {
                    firstItemIndex = i;
                }                if (data[i].selected) {
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
        }        if (customSelectCounter === 0 && firstItemIndex > -1) {
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
        }        customSelectInputText = 'Выбрано ' + _customSelectInputTotalCalc(data, options) + ' из ' + data.length;
    }    if (!options.cssPrefix) {
        options.cssPrefix = '';
    } else {
        options.cssPrefix += '-';
    }    if (!options.inputHeight) {
        options.inputHeight = 40;
    }    if (!options.itemPaddingLeft) {
        options.itemPaddingLeft = 45;
    }    if (!options.itemHeight) {
        options.itemHeight = 30;
    }    if (!options.maxItemsCount) {
        options.maxItemsCount = 10;
    }    var customSelectContainer = document.createElement("div");
    customSelectContainer.className = 'custom-select';
    customSelectContainer.setAttribute('data-index', selectIndex);
    customSelectContainer.setAttribute('data-id', options.id);
    var customSelectContent = '<label class="' + options.cssPrefix + 'custom-select__label">';

    if (options.name) {
        customSelectContent += '<span class="' + options.cssPrefix + 'custom-select__label-text">' + options.name + '</span>';
    }    customSelectContent += '<div class="' + options.cssPrefix + 'custom-select__input-container" style="height: ' + options.inputHeight + 'px';

    if (options.color) {
        customSelectContent += '; background-color: ' + options.color + '"';
    } else {
        customSelectContent += '"';
    }    customSelectContent += '><input style="height: ' + (options.inputHeight - 2) + 'px' +
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
    }    if (options.color) {
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
    }    customSelectContent += '</ul>'

    customSelectContainer.innerHTML = customSelectContent;
    parent.appendChild(customSelectContainer);
}        function renderTabSection(parent, options) {
    var tabSection = options.tabSection;
    var pDiv = document.createElement("table");
    pDiv.id = "tabPanel_" + options.id;
    pDiv.className = "big-data-block__section-switcher__panel";
    pDiv.setAttribute("type", "parentPanel");

    var pDivtbody = document.createElement("tbody");
    pDivtbody.className = "big-data-block__sections-switcher_tbody";
    var switcherRow = document.createElement("tr");
    $(switcherRow).css("display", "block");

    var rightSwitcherTd = document.createElement("td");
    var leftSwitcherTd = document.createElement("td");

    var rightTable = document.createElement("table");
    var rightTableBody = document.createElement("tbody");
    var rightTableRow = document.createElement("tr");
    rightTableBody.appendChild(rightTableRow);
    rightTable.appendChild(rightTableBody);
    rightSwitcherTd.appendChild(rightTable);
    $(rightSwitcherTd).css("width", "100%");

    var leftTable = document.createElement("table");
    var leftTableBody = document.createElement("tbody");
    var leftTableRow = document.createElement("tr");
    leftTableBody.appendChild(leftTableRow);
    leftTable.appendChild(leftTableBody);
    leftSwitcherTd.appendChild(leftTable);

    for (var i = 0; i < tabSection.length; i++) {
        var switcherTd = document.createElement("td");
        switcherTd.setAttribute("id", "tabPanel_" + i);
        switcherTd.setAttribute("type", tabSection[i].type);
        var mainDiv = document.createElement("div");

        if (tabSection[i].marginLeft) {
            $(mainDiv).css("margin-left", tabSection[i].marginLeft);
        }
        if (tabSection[i].marginRight) {
            $(mainDiv).css("margin-right", tabSection[i].marginRight);
        }        if (tabSection[i].type === "tabPanel") {
            appendTabPanel(tabSection, i, mainDiv);
        }        if (tabSection[i].type === "comboBox") {
            appendComboBox(tabSection, i, mainDiv);
        }        if (tabSection[i].type === "customComboBox") {
            appendCustomComboBox(tabSection, i, mainDiv);
        }        if (tabSection[i].type === "legend") {
            mainDiv.appendChild(getLegendTableHorizontal(options.dataSets[0].series));
        }        switcherTd.appendChild(mainDiv);

        if (tabSection[i].rightTab) {
            rightTableRow.appendChild(switcherTd);
        } else {
            leftTableRow.appendChild(switcherTd);
        }
    }
    switcherRow.appendChild(rightSwitcherTd);
    switcherRow.appendChild(leftSwitcherTd);
    pDivtbody.appendChild(switcherRow);
    pDiv.appendChild(pDivtbody);

    parent.appendChild(pDiv);
}function appendTabPanel(sections, sectionIndex, parent) {
    var section = sections[sectionIndex];
    var panel = document.createElement("table");
    var panelBody = document.createElement("tbody");
    var panelRow = document.createElement("tr");

    appendTabCaption(section, panelRow);

    for (var j = 0; j < section.items.length; j++) {
        var panelItem = document.createElement("td");
        panelItem.className = "big-data-block__data-set-switcher__button";

        if (section.items[j].selected) {
            panelItem.className = panelItem.className + " big-data-block__data-set-switcher__button_selected";
        }        panelItem.innerHTML = section.items[j].name;
        panelItem.setAttribute("buttonId", section.items[j].buttonId);
        attachSwitcherAction(panelItem, sections, sectionIndex);
        panelRow.appendChild(panelItem);

        if (j < section.items.length - 1) {
            var gap = document.createElement("td");
            gap.className = 'big-data-block__data-set-switcher__gap';

            panelRow.appendChild(gap);
        }
    }
    panelBody.appendChild(panelRow);
    panel.appendChild(panelBody);
    parent.appendChild(panel);
}function appendComboBox(sections, sectionIndex, parent) {
    var section = sections[sectionIndex];
    var comboBoxPanel = document.createElement("table");
    var comboBoxPanelBody = document.createElement("tbody");
    var comboBoxPanelRow = document.createElement("tr");

    appendTabCaption(section, comboBoxPanelRow);

    var comboBoxTd = document.createElement("td");
    var select = document.createElement("select");
    select.className = "colors-selection big-data-block__selector";

    for (var j = 0; j < section.items.length; j++) {
        var option = document.createElement("option");
        option.value = section.items[j].buttonId;
        option.id = section.items[j].buttonId;
        option.innerText = section.items[j].name;

        select.appendChild(option);

        if (section.items[j].selected) {
            select.selectedIndex = j;
        }
    }    select.onchange = function () {
        buttonFireEvent("tabSelectionChanged", customTabPanelGenerateIdString(sections));
    };

    comboBoxTd.appendChild(select);
    comboBoxPanelRow.appendChild(comboBoxTd);
    comboBoxPanelBody.appendChild(comboBoxPanelRow);
    comboBoxPanel.appendChild(comboBoxPanelBody);
    parent.appendChild(comboBoxPanel);
}function appendCustomComboBox(sections, sectionIndex, parent) {
    var section = sections[sectionIndex];
    var comboBoxPanel = document.createElement("table");
    var comboBoxPanelBody = document.createElement("tbody");
    var comboBoxPanelRow = document.createElement("tr");

    appendTabCaption(section, comboBoxPanelRow);

    var comboBoxTd = document.createElement("td");
    var inputWidth = section.items[0].text.length;
    var fontMultiplier = 7.8;
    var checkBoxWidth = 35;

    for (var i = 0; i < section.items.length; ++i) {
        if (inputWidth < section.items[i].text.length) {
            inputWidth = section.items[i].text.length;
        }        if (section.items[i].text.length > 40) {
            inputWidth = 40;
            section.items[i].tooltip = section.items[i].text;
            section.items[i].text = section.items[i].text.slice(0, 37) + '...';
        }
    }    inputWidth = inputWidth * fontMultiplier + checkBoxWidth;
    parent.style.width = inputWidth + 54 + (section.caption ? section.caption.length * fontMultiplier : 0) + 'px';

    createCustomSelect(
        comboBoxTd,
        {
            id: section.id,
            multiSelect: false,
            cssPrefix: 'tab',
            inputHeight: 32,
            indicatorForSelectedItems: true,
            itemPaddingLeft: 10,
            inputWidth: inputWidth,
            listWidth: inputWidth + 34,
            onItemClick: function() {
                buttonFireEvent("tabSelectionChanged", customTabPanelGenerateIdString(sections));
            }
        },
        transformCustomSelectData(section.items)
    );

    comboBoxPanelRow.appendChild(comboBoxTd);
    comboBoxPanelBody.appendChild(comboBoxPanelRow);
    comboBoxPanel.appendChild(comboBoxPanelBody);
    parent.appendChild(comboBoxPanel);
}function appendTabCaption(section, parent) {
    if (section.caption) {
        var td = document.createElement("td");
        td.className = "big-data-block__data-set-switcher__tab_caption";
        td.innerHTML = section.caption;
        parent.appendChild(td);

        var tdGap = document.createElement("td");
        tdGap.className = "big-data-block__data-set-switcher__gap";
        parent.appendChild(tdGap);
    }
}function attachSwitcherAction(td, sections, sectionIndex) {
    $(td).off().on("click",function(event){
        var section = sections[sectionIndex];
        var newItemButtonId = event.target.getAttribute('buttonId');

        for (var i = 0; i < section.items.length; ++i) {
            if (section.items[i].buttonId === newItemButtonId) {
                section.items[i].selected = true;
            } else {
                section.items[i].selected = false;
            }
        }        if (!$(td).hasClass("big-data-block__data-set-switcher__button_selected")){
            var $tabItem = getParentByType(td, "tabPanel");
            $tabItem.find(".big-data-block__data-set-switcher__button_selected").removeClass("big-data-block__data-set-switcher__button_selected");
            $(td).addClass("big-data-block__data-set-switcher__button_selected");
            buttonFireEvent("tabSelectionChanged", customTabPanelGenerateIdString(sections));
        }
    });
}function getParentByType(el, type) {
    var parentType = $(el).attr("type");
    while (parentType !== type) {
        el = $(el).parent();
        parentType = el.attr("type");
    }
    return $(el);
}function customTabPanelGenerateIdString(sections) {
    var result = '';

    for (var i = 0; i < sections.length; ++i) {
        if (sections[i].items) {
            for (var j = 0; j < sections[i].items.length; ++j) {
                if (sections[i].items[j].selected) {
                    result += sections[i].items[j].buttonId + ';';
                }
            }
        }
    }    return result.length > 0 ? result.substr(0, result.length - 1) : '';
}function getSelectedButtons(el) {
    var $parentPanel = getParentByType(el, "parentPanel");
    var selectedTabs = $parentPanel.find(".big-data-block__data-set-switcher__button_selected");
    var ids = "";
    for (var i = 0; i < selectedTabs.length; i++) {
        ids += $(selectedTabs[i]).attr("buttonid") + ";";
    }
    var comboBoxes = $parentPanel.find(".big-data-block__selector");
    for (var i = 0; i < comboBoxes.length; i++) {
        ids += comboBoxes[i][comboBoxes[i].selectedIndex].value + ";";
    }
    return ids.substr(0, ids.length - 1);
}
    function showContractsWithDebt(dataSet) {
        dataSet = parseDataFromString(dataSet);
        addLinearGradientToSeries(dataSet.series);
        var options = {
            id: 1,
            type: "columnChart",
            dataSets: [{categories: dataSet.categories, series: dataSet.series}]
        };
        renderChart(options);
    }
function showCoordinationOfNTOPlacementSchemes(dataSet) {
    dataSet = parseDataFromString(dataSet);

    addLinearGradientToData(dataSet);

    var options = {
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
}function showAgreedNTOPlacementSchemes(dataSet) {
    dataSet = parseDataFromString(dataSet);

    addLinearGradientToSeries(dataSet.series, true);

    var options = {
        id: 3,
        type: "barChart",
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
    };

    renderChart(options);
}function showSchemesAndContracts(dataSet, tabs) {
    dataSet = parseDataFromString(dataSet);
    tabs = parseDataFromString(tabs);

    addLinearGradientToSeries(dataSet.series);

    var options = {
        id: 4,
        type: "columnChart",
        tabSection: [
            {
                id: 1,
                type: "customComboBox",
                caption: "Префектура:",
                marginLeft: "3px",
                marginRight: "auto",
                rightTab: true,
                items: tabs[0]
            },
            {
                id: 2,
                type: "legend",
                marginLeft: "auto",
                marginRight: "0",
                rightTab: false
            }
        ],
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
    };

    renderChart(options);
}function showNumberOfContractsBySpecialization(dataSet, tabs) {
    dataSet = parseDataFromString(dataSet);
    tabs = parseDataFromString(tabs);

    addLinearGradientToSeries(dataSet.series, true);

    var options = {
        id: 5,
        type: "barChart",
        tabSection: [
            {
                id: 3,
                type: "customComboBox",
                caption: "Префектура:",
                marginLeft: "3px",
                marginRight: "auto",
                rightTab: true,
                items: tabs[0]
            }
        ],
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
    };

    renderChart(options);
}function showRawData(dataSet) {
    dataSet = parseDataFromString(dataSet);

    addLinearGradientToData(dataSet);

    var options = {
        id: 6,
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
}function showNonStationaryTradingObjects(dataSet, params) {
    dataSet = parseDataFromString(dataSet);
    params = parseDataFromString(params);

    addLinearGradientToSeries(dataSet.series, true);

    var options = {
        id: 7,
        type: "barChart",
        removalId: 6,
        fullWidthId: 7,
        title: dataSet.subTitle ? dataSet.subTitle : undefined,
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
    };

    if (params) {
        extendOptions(options, params);
    }    renderChart(options);
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
        <td class="small-data-block" id="contracts_block">
            <div class="small-data-block__header-part"><img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAVhJREFUSA1jYBjJ4D/Q8+TiDEoCjlxLQfr+AXE8uZbDLCZFP0wPiP4DxKHEamZEUgjSDAKM/w/N2goMdS8IFzfJaJcOlmxK8mOom7cJxP4NxMFAvBnEwQeYsEsSthRZX22CN0NFtAdIiBWIVwOxC4iDD+CwGJ8W7HLt6YEMuUGOIEl2IN4IxLYgDi5ANYtBFkzMD2dI9rYGMbmAGBhdDKYgDjbAgk2QVDFYXKPp4wXydwKxEJo4mEtVH2OxQPD//fkcWMQZKPLx/0MzsZkJFoOHwuNfC4ACEegKae1jYOZkDEO3FMSnvcX//yOXFXA30N5iuFWojAGzGG/igicQVMfi5OFLbOiaBqePSfEBuo8I8QfMx3gtBsUxcjyj8wn5Cp88XovxaaRUDm+qRo9jdD4llg+Yj0eexdji+D9ySqYkHvHpHbCgRvYxvPoitnmLz0dIcqC21+ABADH2W7NieWiOAAAAAElFTkSuQmCC"
        alt=""></div>
<div class="small-data-block__text-part">Договоры</div>
<div class="small-data-block__array">
    <img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAEpSURBVGhD7Zk9CsJAEEZn19YD2Ao5h6AoxONYKVZWopVn8BQGBAvxGIJg5QFszZrZbEih5fwQmAdLkq2+N7MLm8SFCugwPl07iwloYwLamIA2JqCNCWhjAtrQCTxvUB6nccDjkib5ITtOY/DwfsV753vgZjtw2Tw+c8KyhEL5gXBeQbif0gwfZAJ+tI6Vb2glijTDA10HhpN62fxILFklSJcQrnlpCfI9IC3Bsolrib2IBIsA4rJcRIJNAJGQYBWQgFUAqxyrXVW9AbsRu1J1hwI2AYnwCIuAVHiEXEAyPEIqgIe3/+HxZEofHqH7Ol29A5TFQqzyDWQdKK9b0co3sGziNnyHXmj8eAOuP4jD5weR8Ij9odHGBLQxAW1MQBsT0MYEtDEBXQC+9sGinlaxRrQAAAAASUVORK5CYII="
            alt="">
</div>
        </td>
        <td class="section__small-blocks-table__gap"></td>
        <td class="small-data-block" id="nonstatic_objects_block">
            <div class="small-data-block__header-part " id=""><img
    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAeRJREFUSA1jYBipgA3o8Q4gfgbE/2mEQWaD7ADZBQcgAVpZiG4uyC44gPnUCy5CfYY30EiQI0B2MbCACCBghVBAmSMzWxn+M5Yw/P+PEiQweXLprccuM/hUTGHg4mDj//bjF9yYHiALPUhowi8Mc/kDtxXIAPm8l9aWF4W5/P99YPpPkMWMIAIJgHzJ8P/wrF/UDGpGu3SwFWBzGf/3MNqkVzMhWQpnMtqmscM51GQA0w3IUpCRsMRFlvG/fv9hqJu7iWHRzhMMz99+xDBDXJCXIc7DEkMcJECRxSBLO5ftxGowSPDl+88M3ct3YZWnyGKQT0Fga2cOg5elLoYFsCyEIQEUwBrH2BRiE/v37x9Y+D84SWJTQbwYLO+ylUe5/5cU5v+vICH8vybO6/+f/dPBNIgPEysOd4WpJ4r+f2gmTifCDMAou0GWAd2PgqVFBFD46PLofGSLccVxHCiQQHEHCkZQUffgxVuQEIrY0zcf4GLUimOwg7DFHbFiYBfhIWAlFyjI6AkYKUrVlLgU5mOYGTCfMyInBJgkuTS8rD40kwHIBts5YD4maDHItTAXg3xMKh9XKBG0GJdGSsVx5WO4ucC4hrNBDFL5KJqROAPmY1iqhqVmJDfRlDlw+Zim3hqUhgMADisj1piNiXYAAAAASUVORK5CYII="
    alt=""></div>
<div class="small-data-block__text-part " id="">Нестационарные объекты</div>
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





    <tr class="section__big-blocks-table__row" style="z-index: 400" >








        <td class="big-data-block" id="infoBlock1" colspan="3">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Количество договоров с задолженностью по сезонным объектам (бахча, елки, тележки, шт.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="1"
     data-height="400px"
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
                     style="overflow: hidden; height:400px ">

                </div>

            </div>
        </td>


    <tr class="section__big-blocks-table__row-gap"></tr>

    <tr class="section__big-blocks-table__row" style="z-index: 390" >








        <td class="big-data-block" id="infoBlock2">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Согласование схем размещения НТО при СТО (шт.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="2"
     data-height="365px"
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
                     style="overflow: hidden; height:365px ">

                </div>

            </div>
        </td>




        <td class="section__big-blocks-table__gap">
            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
        </td>



        <td class="big-data-block" id="infoBlock3" colspan="1">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Согласовано схем размещения НТО при СТО по специализациям (шт.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="3"
     data-height="309px"
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
                     style="overflow: hidden; height:309px ">

                </div>

                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_1">
                    <span>Перейти в отчет</span>

                        <div class="colors-font big-data-block__data-list__show-more-button-array"></div>

                </div>

            </div>
        </td>


    <tr class="section__big-blocks-table__row-gap"></tr>

    <tr class="section__big-blocks-table__row" style="z-index: 380" >








        <td class="big-data-block" id="infoBlock4" colspan="3">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Схема/договоры (шт.)</td>
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


    <tr class="section__big-blocks-table__row-gap"></tr>

    <tr class="section__big-blocks-table__row" style="z-index: 370" >








        <td class="big-data-block" id="infoBlock5" colspan="3">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Количество договоров по специализациям (шт.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="5"
     data-height="400px"
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
                     style="overflow: hidden; height:400px ">

                </div>

            </div>
        </td>


    <tr class="section__big-blocks-table__row-gap"></tr>

    <tr class="section__big-blocks-table__row" style="z-index: 360" >








        <td class="big-data-block" id="infoBlock6">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Необработанные данные из Федерального Казначейства (шт.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="6"
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
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                     style="overflow: hidden; height:294px ">

                </div>

                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_2">
                    <span>Подробно</span>

                        <div class="colors-font big-data-block__data-list__show-more-button-array"></div>

                </div>

            </div>
        </td>




        <td class="section__big-blocks-table__gap">
            <!-- Не трогать данный header (он используется в продовольственной безопасности) -->
            <div class="section__big-blocks-table__gap__header" style="width: 100%; height: 60px"></div>
        </td>



        <td class="big-data-block" id="infoBlock7">

            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Нестационарные торговые объекты (тыс.руб.)</td>
                        <td class="big-data-block__header__resize-button">

                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="7"
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
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_7"
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

// 1) Количество договоров с задолженностью по сезонным объектам (бахча, елки, тележки, шт.)
function showContractsWithDebtOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getContractsWithDebtFromServer",
        success: function(data) {
            let newData =  JSON.parse(data);
            newData.color = ["#40B3EE","#1A78E2"]
            newData.series[0].color = ["#40B3EE","#1A78E2"]

            let json = JSON.stringify(newData)
			showContractsWithDebt(json);

        },
        error:  function(){
            alert('Ошибка получения данных для функции showContractsWithDebt');
        }
    });
}// 2) Необработанные данные из Федерального Казначейства (шт.)
function showRawDataOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getRawDataFromServer",
        success: function(data) {
			showRawData(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showRawData');
        }
    });
}// 3) Нестационарные торговые объекты (тыс.руб.)
function showNonStationaryTradingObjectsOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getNonStationaryTradingObjectsFromServer",
        success: function(data) {
            data.series[0]

			showNonStationaryTradingObjects(data, [{"fullWidth":"false"}]);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showNonStationaryTradingObjects');
        }
    });
}// 4) Схема/договоры (шт.)	-	"comboBoxItem_1_1"
function showSchemesAndContractsOnline(btn) {
	var param = utf8_to_b64('btn1='+btn);
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getSchemesAndContractsFromServer&param="+param,
        success: function(data) {
			var JSONx;
			var datax = JSON.parse(data);

			var textTab = "comboBoxItem_1_";
			var tabs = [];
			if(btn == "comboBoxItem_1_1"){
				tabs[0] = [{"id": 1, "text": "Все", "buttonId": "comboBoxItem_1_1", "selected": "true"}];
			} else {
				tabs[0] = [{"id": 1, "text": "Все", "buttonId": "comboBoxItem_1_1"}];
			}
			var btnText;
			for(var i = 2; i <= datax[0].length + 1; i++) {
				btnText = textTab + i;
				if(btnText == btn) {
					tabs[0][i-1] = {"id": i, "text": datax[0][i-2], "buttonId": btnText, "selected": "true"};
				} else {
					tabs[0][i-1] = {"id": i, "text": datax[0][i-2], "buttonId": btnText};
				}
			}

			var collorsPlanArr = [
				["#BEE9FF", "#40B3EE"],
			];
			var collorsFactArr = [
				["#EFFF8B", "#CCF136"],
			];

			var curIndex = parseInt(btn.replace("comboBoxItem_1_","")) - 2;

			var categories = [];
			var series = [];

			if(btn == "comboBoxItem_1_1") {
				for(var i = 0; i < datax[0].length; i++) {
					categories[i] = datax[0][i];
				}
				series[0] = {"name": "Количество НТО", "data": datax[2], "color": collorsPlanArr[0]};
				series[1] = {"name": "Договоры", "data": datax[1], "color": collorsFactArr[0]};
			} else {
				var planArr = [];
				var factArr = [];
				var curArea = datax[0][curIndex];
				var areaIndex = 0;
				for(var i = 0; i < datax[3].length; i++) {
					if(curArea == datax[3][i]) {
						categories[areaIndex] = datax[4][i];
						planArr[areaIndex] = datax[6][i];
						factArr[areaIndex] = datax[5][i];
						areaIndex++;
					}
				}
				series[0] = {"name": "Количество НТО", "data": planArr, "color": collorsPlanArr[0]};
				series[1] = {"name": "Договоры", "data": factArr, "color": collorsFactArr[0]};

			}

			JSONx = {"categories": categories, "series": series};

			showSchemesAndContracts(JSONx, tabs);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showSchemesAndContracts');
        }
    });
}// 5) Количество договоров по специализациям (шт.)  -  comboBoxItem_2_1
function showNumberOfContractsBySpecializationOnline(btn) {
	var param = utf8_to_b64('btn1='+btn);
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getNumberOfContractsBySpecializationFromServer_V2&param="+param,
        success: function(data) {
			var JSONx;
			var datax = JSON.parse(data);

			var textTab = "comboBoxItem_2_";
			var tabs = [];
			if(btn == "comboBoxItem_2_1"){
				tabs[0] = [{"id": 1, "text": "Все", "buttonId": "comboBoxItem_2_1", "selected": "true"}];
			} else {
				tabs[0] = [{"id": 1, "text": "Все", "buttonId": "comboBoxItem_2_1"}];
			}
			var btnText;
			for(var i = 2; i <= datax[2].length + 1; i++) {
				btnText = textTab + i;
				if(btnText == btn) {
					tabs[0][i-1] = {"id": i, "text": datax[2][i-2], "buttonId": btnText, "selected": "true"};
				} else {
					tabs[0][i-1] = {"id": i, "text": datax[2][i-2], "buttonId": btnText};
				}
			}

			var collorsArr = [
				["#BEE9FF", "#40B3EE"],
				["#1A78E2", "#40B3EE"],
				["#40B3EE", "#BEE9FF"],
				["#1A78E2", "#40B3EE"],
				["#1A78E2", "#40B3EE"],
				["#40B3EE", "#BEE9FF"],
			];

			var dataArr = [];
			var curIndex = 0;
			for(var i = 0; i < datax[1].length; i++) {
				dataArr[i] = {"y": datax[1][i], "color": collorsArr[curIndex]};
				curIndex = curIndex == 5 ? 0 : curIndex + 1;
			}

			var series = [{"name":"Количество", "data": dataArr}];


			JSONx = {"categories": datax[0], "series": series}

			showNumberOfContractsBySpecialization(JSONx, tabs);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showNumberOfContractsBySpecialization');
        }
    });
}// 6) Согласование схем размещения НТО при СТО (шт.)
function showCoordinationOfNTOPlacementSchemesOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getCoordinationOfNTOPlacementSchemesFromServer",
        success: function(data) {
            let newData = JSON.parse(data)
            for (let i = 0; i < newData.length; i++) {
                if (i  % 2 == 0 ) {
                    newData[i].color = ['#EFFF8B' , '#CCF136']
                } else {
                    newData[i].color = ["#1A78E2", "#40B3EE"]

                }
            }
            let json = JSON.stringify(newData)

			showCoordinationOfNTOPlacementSchemes(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showCoordinationOfNTOPlacementSchemes');
        }
    });
}// 7) Согласовано схем размещения НТО при СТО по специализациям (шт.)
function showAgreedNTOPlacementSchemesOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getAgreedNTOPlacementSchemesFromServer",
        success: function(data) {
            let newData = JSON.parse(data)

            for (let i = 0; i <  newData.series[0].data.length; i++) {

                if (i  % 2 == 0 ) {
                    newData.series[0].data[i].color = ['#EFFF8B' , '#CCF136']
                } else {
                    newData.series[0].data[i].color = ["#1A78E2", "#40B3EE"]

                }

            }

            let json = JSON.stringify(newData)

			showAgreedNTOPlacementSchemes(json);
        },
        error:  function(){
            alert('Ошибка получения данных для функции showAgreedNTOPlacementSchemes');
        }
    });
}// 7) Согласовано схем размещения НТО при СТО по специализациям (шт.)
function setActualDateOnline() {
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NTO&func=getActualDate",
        success: function(data) {
			setActualDate(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции setActualDate');
        }
    });
}function utf8_to_b64( str ) {
    return window.btoa(unescape(encodeURIComponent( str )));
}    $(document).ready(function() {
        attachButtonsEventPerformers();

		showContractsWithDebtOnline();
		showRawDataOnline();
		showNonStationaryTradingObjectsOnline();
		showSchemesAndContractsOnline("comboBoxItem_1_1");
		showNumberOfContractsBySpecializationOnline("comboBoxItem_2_1");
		showCoordinationOfNTOPlacementSchemesOnline();
		showAgreedNTOPlacementSchemesOnline();
		setActualDateOnline();


		$(document).on('click', '#chart_4 #tabPanel_0 li', function(event) {
			setTimeout(function(){
				var btn = $('#chart_4 #tabPanel_0 li.tab-custom-select__list-item_selected').data('id');
				showSchemesAndContractsOnline("comboBoxItem_1_"+btn);
			}, 500);
		});
		$(document).on('click', '#chart_5 #tabPanel_0 li', function(event) {
			setTimeout(function(){
				var btn = $('#chart_5 #tabPanel_0 li.tab-custom-select__list-item_selected').data('id');
				showNumberOfContractsBySpecializationOnline("comboBoxItem_2_"+btn);
			}, 500);
		});
    });
</script>
</html>
