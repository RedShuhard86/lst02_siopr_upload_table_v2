<!DOCTYPE html>
<html>
<head>
    
    
    <title>Несанкционированная торговля</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>

    <script>
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
}function attachDataSetsSwitcherAction(td,options){
    $(td).off().on("click",function(){
        if (!$(td).hasClass("big-data-block__data-set-switcher__button_selected")){
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
}function addTabs(parent, options, switcherIndex) {
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
}function appendSectionsTab(parent, options, dataSetIndex, sectionIndex) {
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
}function addTabCaption(parent, options) {
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
    }    select.selectedIndex = switcherIndex;
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
}function addComboBoxByArray(parent, options, switcherIndex, optionName) {
    var td = document.createElement("td");
    var select = document.createElement("select");
    select.className = "colors-selection big-data-block__selector";
    for (var i = 0; i < options[optionName].length; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.id = i;
        option.innerText = options[optionName][i];

        select.appendChild(option);
    }    select.selectedIndex = optionName === 'comboBox1' ? switcherIndex[0] : switcherIndex[1];

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
}function addDataSetsSwitcher(parent, options, dataSetIndex, dataSetIndex2, sectionIndex, showLegend, h) {
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
    }    if (options.tabType && options.tabType === "combobox") {
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
    }    if ((options.dataSets[dataSetIndex]) && (options.dataSets[dataSetIndex].sections)) {
        var sectionSwitcherCell = document.createElement("td");
        sectionSwitcherCell.className = "big-data-block__sections-switcher_cell";
        appendSectionsTab(sectionSwitcherCell, options, dataSetIndex, sectionIndex);
        switcherRow.appendChild(sectionSwitcherCell);
    }    pDivtbody.appendChild(switcherRow);
    pDiv.appendChild(pDivtbody);
    parent.appendChild(pDiv);
}        function showFines_V3(dataSets) {
    dataSets = parseDataFromString(dataSets);
    var finalDataSets = [];

    for (var j = 0; j < dataSets.length; ++j) {
        var dataSet = dataSets[j];

        if (dataSet.sections) {
            for (var i = 0; i < dataSet.sections.length; ++i) {
                if (dataSet.sections[i].data) {
                    for (var dataIndex = 0; dataIndex < dataSet.sections[i].data.length; ++dataIndex) {
                        if (dataSet.sections[i].data[dataIndex].colors) {
                            dataSet.sections[i].data[dataIndex].color = getSimpleGradient(true, dataSet.sections[i].data[dataIndex].colors);
                            dataSet.sections[i].data[dataIndex].colors = undefined;
                        } else {
                            dataSet.sections[i].data[dataIndex].color = getPrimaryGradient(true);
                        }
                    }
                }
            }
        }        finalDataSets.push({ name: dataSet.tabName, categories: dataSet.categories, sections: dataSet.sections });
    }    var options = {
        id: 1,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: finalDataSets
    };

    renderChart(options);
}function showNumberOfThreads_V3(dataSets) {
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
            }            series = [{
                name: dataSet.seriesName ? dataSet.seriesName : 'Количество',
                data: dataSet.data
            }];
        } else {
            series = undefined;
        }        finalDataSets.push({ name: dataSet.tabName, categories: dataSet.categories, series: series });
    }    var options = {
        id: 2,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: finalDataSets
    };

    renderChart(options);
}function showUnpaidFines_V3(dataSets) {
    dataSets = parseDataFromString(dataSets);
    var finalDataSets = [];

    for (var j = 0; j < dataSets.length; ++j) {
        var dataSet = dataSets[j];

        if (dataSet.sections) {
            for (var i = 0; i < dataSet.sections.length; ++i) {
                if (dataSet.sections[i].data) {
                    for (var dataIndex = 0; dataIndex < dataSet.sections[i].data.length; ++dataIndex) {
                        if (dataSet.sections[i].data[dataIndex].colors) {
                            dataSet.sections[i].data[dataIndex].color = getSimpleGradient(true, dataSet.sections[i].data[dataIndex].colors);
                            dataSet.sections[i].data[dataIndex].colors = undefined;
                        } else {
                            dataSet.sections[i].data[dataIndex].color = getPrimaryGradient(true);
                        }
                    }
                }
            }
        }        finalDataSets.push({ name: dataSet.tabName, categories: dataSet.categories, sections: dataSet.sections });
    }    var options = {
        id: 3,
        type: "columnChart",
        tabCaption: "За текущий:",
        dataSets: finalDataSets
    };

    renderChart(options);
}// Устарело
function showNumberOfThreads(categories, dataYearN, dataQuarterN, dataMonthN) {
    categories = parseDataFromString(categories);
    dataYearN = parseDataFromString(dataYearN);
    dataQuarterN = parseDataFromString(dataQuarterN);
    dataMonthN = parseDataFromString(dataMonthN);

    var seriesYear = [{
        id: 1,
        name: 'Количество',
        color: getPrimaryColor(),
        data: dataYearN
    }];

    var seriesQuarter = [{
        id: 1,
        name: 'Количество',
        color: getPrimaryColor(),
        data: dataQuarterN
    }];

    var seriesMonth = [{
        id: 1,
        name: 'Количество',
        color: getPrimaryColor(),
        data: dataMonthN
    }];

    var options = {
        id: 2,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: [
            {name: "Год", id: 1, categories: categories, series: seriesYear},
            {name: "Месяц", id: 2, categories: categories, series: seriesMonth},
            {name: "Квартал", id: 3, categories: categories, series: seriesQuarter}
        ]
    };

    renderChart(options);
}function showNumberOfThreads_V2(dataSets) {
    dataSets = addGradientColumn(parseDataFromString(dataSets), true);

    var options = {
        id: 2,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: dataSets
    };

    renderChart(options);
}function showUnpaidFines(categories, dataYearN, dataYearR, dataQuarterN, dataQuarterR, dataMonthN, dataMonthR) {
    categories = parseDataFromString(categories);
    categories = parseDataFromString(categories);
    dataYearN = parseDataFromString(dataYearN);
    dataYearR = parseDataFromString(dataYearR);
    dataQuarterN = parseDataFromString(dataQuarterN);
    dataQuarterR = parseDataFromString(dataQuarterR);
    dataMonthN = parseDataFromString(dataMonthN);
    dataMonthR = parseDataFromString(dataMonthR);

    var sectionsYear = [{
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
        }
    ];

    var sectionsQuarter = [{
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
        }];

    var sectionsMonth = [{
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
        }];

    var options = {
        id: 3,
        type: "columnChart",
        tabCaption: "За текущий:",
        dataSets: [
            {name: "Год", id: 1, categories: categories, sections: sectionsYear},
            {name: "Месяц", id: 2, categories: categories, sections: sectionsMonth},
            {name: "Квартал", id: 3, categories: categories, sections: sectionsQuarter}
        ]
    };

    renderChart(options);
}function showUnpaidFines_V2(dataSets) {
    dataSets = addGradientColumnSection(parseDataFromString(dataSets));

    var options = {
        id: 3,
        type: "columnChart",
        tabCaption: "За текущий:",
        dataSets: dataSets
    };

    renderChart(options);
}function showFines(categories, dataYearN, dataYearR, dataQuarterN, dataQuarterR, dataMonthN, dataMonthR) {
    categories = parseDataFromString(categories);
    dataYearN = parseDataFromString(dataYearN);
    dataYearR = parseDataFromString(dataYearR);
    dataQuarterN = parseDataFromString(dataQuarterN);
    dataQuarterR = parseDataFromString(dataQuarterR);
    dataMonthN = parseDataFromString(dataMonthN);
    dataMonthR = parseDataFromString(dataMonthR);

    var sectionsYear = [{
            id: 1,
            name: 'шт.',
            color: getYellowColor(),
            data: dataYearN
        },
        {
            id: 2,
            name: 'руб.',
            color: getYellowColor(),
            data: dataYearR
        }
    ];

    var sectionsQuarter = [{
        id: 1,
        name: 'шт.',
        color: getYellowColor(),
        data: dataQuarterN
    },
        {
            id: 2,
            name: 'руб.',
            color: getYellowColor(),
            data: dataQuarterR
        }];

    var sectionsMonth = [{
        id: 1,
        name: 'шт.',
        color: getYellowColor(),
        data: dataMonthN
    },
        {
            id: 2,
            name: 'руб.',
            color: getYellowColor(),
            data: dataMonthR
        }];

    var options = {
        id: 1,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: [
            {name: "Год", id: 1, categories: categories, sections: sectionsYear},
            {name: "Месяц", id: 2, categories: categories, sections: sectionsMonth},
            {name: "Квартал", id: 3, categories: categories, sections: sectionsQuarter}
        ]
    };

    renderChart(options);
}function showFines_V2(dataSets) {
    dataSets = addGradientColumnSection(parseDataFromString(dataSets));

    var options = {
        id: 1,
        type: "barChart",
        tabCaption: "За текущий:",
        dataSets: dataSets
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


                <table class="section__big-blocks-table">
    <tbody>

            <col>

                <col width="20">

            <col>

    <tr class="section__big-blocks-table__row" style="z-index: 400" >

        <td class="big-data-block" id="infoBlock1">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Штрафы по несанкционированной торговле</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="1"
     data-height="290px"
     data-height-min="200px"
     class="resize-btn"
>

                            
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="big-data-block__content">
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                     style="overflow: hidden; height:290px ">

                </div>
                
                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_1">
                    <span>список протоколов</span>
                    
                        <div class="colors-font big-data-block__data-list__show-more-button-array"></div>
                    
                </div>
                
                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_2">
                    <span>отчет по несанкционированной торговле</span>
                    
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
                        <td class="big-data-block__header__text">Количество протоколов (шт.)</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
     alt=""
     data-id="2"
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
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_2"
                     style="overflow: hidden; height:400px ">

                </div>
                
            </div>
        </td>

        
    <tr class="section__big-blocks-table__row-gap"></tr>
    
    <tr class="section__big-blocks-table__row" style="z-index: 390" >

        

        

        

        
        <td class="big-data-block" id="infoBlock3" colspan="3">
        
            <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                    <tbody>
                    <tr>
                        <td class="big-data-block__header__text">Неоплаченных штрафов по округам</td>
                        <td class="big-data-block__header__resize-button">
                            
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
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
            </div>

            <div class="big-data-block__content">
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
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
// 1) Штрафы по несанкционированной торговле	
var period = "Год";
var index = "шт.";
function showFines_V3Online(period, index) {	
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NesankcionirovannayaTorgovlya&func=getFinesFromServer",
        success: function(data) {
          
            
			var JSONx;
			var datax = JSON.parse(data);
         
            for (let i = 0; i <  datax.length; i++) {
                for (let q = 0; q < datax[i].length; q++) {
                    if (q  % 2 == 0 ) {
                        datax[i][q].colors = ['#EFFF8B' , '#CCF136']
               } else {
                datax[i][q].colors = ["#1A78E2", "#40B3EE"]
               }
                }
           }
       
          
			var dataSections;
			var categories3 = ["Наложенных", "Взысканных", "Неоплаченных"];
			if(period == 'Месяц') {
				if(index == "шт.") {
					dataSections = [{"name": "шт.", "data": datax[0]}, {"name": "руб."}];
				} else if(index == 'руб.')  {
					dataSections = [{"name": "шт."}, {"name": "руб.", "data": datax[1]}];
				}
				JSONx = [
					{"tabName": "Месяц", "categories": categories3, "sections": dataSections},
					{"tabName": "Квартал"},
					{"tabName": "Год"}
				];
			}
			else if(period == 'Квартал')  {
				if(index == "шт.") {
					dataSections = [{"name": "шт.", "data": datax[2]}, {"name": "руб."}];
				} else if(index == 'руб.')  {
					dataSections = [{"name": "шт."}, {"name": "руб.", "data": datax[3]}];
				}
				JSONx = [
					{"tabName": "Месяц"},
					{"tabName": "Квартал", "categories": categories3, "sections": dataSections},
					{"tabName": "Год"}
				];
			}
			else if(period == 'Год')  {
				if(index == "шт.") {
					dataSections = [{"name": "шт.", "data": datax[4]}, {"name": "руб."}];
				} else if(index == 'руб.')  {
					dataSections = [{"name": "шт."}, {"name": "руб.", "data": datax[5]}];
				}
				JSONx = [
					{"tabName": "Месяц"},
					{"tabName": "Квартал"},
					{"tabName": "Год", "categories": categories3, "sections": dataSections}
				];
			}
			
			showFines_V3(JSONx); 
         
        },
        error:  function(){
            alert('Ошибка получения данных для функции showFines_V3');
        }
    });
}// 2) Количество протоколов   -  "chartButton2_0"
function showNumberOfThreads_V3Online(btn) {	
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NesankcionirovannayaTorgovlya&func=getNumberOfThreadsFromServer",
        success: function(data) {
			var JSONx;
			var datax = JSON.parse(data);
        

            for (let i = 0; i <  datax.length; i++) {
             
                if ( i != 0) {
                                
            for (let q = 0; q < datax[i].length; q++) {
              
              if (i  % 2 == 0 ) {
                  datax[i][q].colors = ['#EFFF8B' , '#CCF136']
         } else {
          datax[i][q].colors = ["#1A78E2", "#40B3EE"]
          
         }
          }
                }
       }
   
			
			var categories3 = ["Составленных", "Рассмотренных", "Не рассмотренных", "Прекращенных по истечению срока деятельности", "Возвращенных на доработку", "По статье 20.25 КОАП РФ"];
			
			if(btn == "chartButton2_0") {
				JSONx = [
					{"tabName": "Месяц", "categories": categories3, "data": datax[1]},
					{"tabName": "Квартал"},
					{"tabName": "Год"},
				];
			} else if(btn == "chartButton2_1")  {
				JSONx = [
					{"tabName": "Месяц"},
					{"tabName": "Квартал", "categories": categories3, "data": datax[2]},
					{"tabName": "Год"},
				];
			} else if(btn == "chartButton2_2")  {
				JSONx = [
					{"tabName": "Месяц"},
					{"tabName": "Квартал"},
					{"tabName": "Год", "categories": categories3, "data": datax[3]},
				];
			}
			showNumberOfThreads_V3(JSONx); 
           
        },
        error:  function(){
            alert('Ошибка получения данных для функции showNumberOfThreads_V3');
        }
    });
}// 3) Неоплаченных штрафов по округам
var periodUnpaid = "Год";
var indexUnpaid = "шт.";
function showUnpaidFines_V2Online(periodUnpaid, indexUnpaid) {
	var param = utf8_to_b64('stringperiod='+periodUnpaid);
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NesankcionirovannayaTorgovlya&func=getUnpaidFinesFromServer&param="+param,
        success: function(data) {
			var JSONx;
			var datax = JSON.parse(data);
            
			var categories3 = datax[0];
			var series = [
				{"id": 1, "name": "шт.", "color": "#40B3EE"},
				{"id": 2, "name": "руб.", "color": "#BEE9FF"}
			];
			
			JSONx = [
				{"name": "Месяц", "id": 0, "categories": categories3},
				{"name": "Квартал", "id": 1, "categories": categories3},
				{"name": "Год", "id": 2, "categories": categories3},
			];
			
			if(indexUnpaid == 'шт.') {
				series[0].data = datax[1];
			}
			else if(indexUnpaid == 'руб.')  {
				series[1].data = datax[2];
			}
			
			if(periodUnpaid == 'Месяц') {
				JSONx[0].sections = series;
			}
			else if(periodUnpaid == 'Квартал')  {
				JSONx[1].sections = series;
			}
			else if(periodUnpaid == 'Год')  {
				JSONx[2].sections = series;
			}
			
			showUnpaidFines_V2(JSONx); 
          
        },
        error:  function(){
            alert('Ошибка получения данных для функции showUnpaidFines_V2');
        }
    });
}// Установка даты актуальности
function setActualDateOnline() { 
    $.ajax({
        type: 'POST',
        url: 'selector_1s.php', // Обработчик собственно
        data: "wp=NesankcionirovannayaTorgovlya&func=getActualDate",
        success: function(data) {
			setActualDate(data);
        },
        error:  function(){
            alert('Ошибка получения данных для функции setActualDate');
        }
    });
}function utf8_to_b64( str ) {
    return window.btoa(unescape(encodeURIComponent( str )));
}    $(document).ready(function () {
        attachButtonsEventPerformers();

		var period = "Год";
		var index = "шт.";
		var periodUnpaid = "Год";
		var indexUnpaid = "шт.";
		showFines_V3Online(period, index);
		showNumberOfThreads_V3Online("chartButton2_0");
		showUnpaidFines_V2Online(periodUnpaid, indexUnpaid);
		setActualDateOnline();
		
		$(document).on('click', '#chart_1 .big-data-block__data-set-switcher__button, #chart_1 .big-data-block__section-switcher__button', function(event) {
			setTimeout(function(){
				var btnId1 = $('#chart_1 .big-data-block__data-set-switcher__button_selected').text();
				var btnId2 = $('#chart_1 .big-data-block__data-set-switcher-section__button_selected').text();
				showFines_V3Online(btnId1, btnId2);
			}, 500);
		});
		$(document).on('click', '#dataSet0', function(event) {showNumberOfThreads_V3Online("chartButton2_0");});
		$(document).on('click', '#dataSet1', function(event) {showNumberOfThreads_V3Online("chartButton2_1");});
		$(document).on('click', '#dataSet2', function(event) {showNumberOfThreads_V3Online("chartButton2_2");});
		$(document).on('click', '#chart_3 .big-data-block__data-set-switcher__button, #chart_3 .big-data-block__section-switcher__button', function(event) {
			setTimeout(function(){
				var btnId1 = $('#chart_3 .big-data-block__data-set-switcher__button_selected').text();
				var btnId2 = $('#chart_3 .big-data-block__data-set-switcher-section__button_selected').text();
				showUnpaidFines_V2Online(btnId1, btnId2);
			}, 500);
		});
    });
</script>

</html>