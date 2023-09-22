<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
  <title>Uprava</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>
  <style type="text/css">
      .custom-select__list_hidden {
          display: none !important;
      }.custom-select__list_opened {
           display: block !important;
       }        .tab-custom-select__label-text {
                    display: block;

                    margin-bottom: 5px;

                    font-size: 14px;
                    font-weight: normal;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: 1.43;
                    letter-spacing: normal;
                    color: black;
                }.tab-custom-select__input-container {
                     padding-top: 2px;

                     border-bottom: 2px solid #1A78E2;

                     background-color: transparent;
                     cursor: pointer;
                 }.tab-custom-select__font-style {
                      font-size: 14px;
                      font-weight: normal;
                      font-style: normal;
                      font-stretch: normal;
                      line-height: 1.43;
                      letter-spacing: normal;
                      color: black;
                  }.tab-custom-select__input {
                       float: left;

                       *padding-top: 5px;
                       padding-left: 15px;

                       font-size: 13px;
                       font-weight: bold;

                       border: none;

                       background: transparent;
                   }.tab-custom-select__open-btn {
                        float: left;

                        width: 32px;

                        border: none;

                        cursor: pointer;
                        background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
                    }.tab-custom-select__open-btn:focus {
                         outline: none;
                     }.tab-custom-select__open-btn_when-multi-select {
                          background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDCEp1kuzLAAAAC1JREFUSMdjYBgFo2DIg60MDAz/CeCt+AxgooIj/o/GwWgcjMbBSI+DUTAMAAAf2B8q+ZTHEwAAAABJRU5ErkJggg==') no-repeat center center;
                      }.tab-custom-select__open-btn_opened {
                           background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
                           transform: rotate(180deg);
                       }.tab-custom-select__open-btn_when-multi-select-opened {
                            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAC4XpUWHRSYXcgcHJvZmlsZSB0eXBlIGV4aWYAAHja7ZdbsuMqDEX/GUUPAUkIieFgA1U9gx5+b7DjPE76Vt1T/dEfMRUeMpbEXpgkof/6OcIPXFSEQ1LzXHKOuFJJhSs6Ho/raCmmVR+D2z16tofrBsMkaOUY5n7Or7Dr/QFLp317tgfbTz9+Ojpv3BzKjMzotDPJ05HwYadzHAofnZoflnN+xJaLa/LrOBnEaAojNOIuJHHVfEQSZCFFKlpHDTtPCy2LoE5CX/ULl3RvBLx6L/rF/bTLXY7D0W1Z+UWn0076Xr+l0mNGxFdkfszI5ArxRb8xmo/Rj9XVlAPkyueibktZPUzcIKesxzKK4aPo2yoFxWONO4RvWOoW4oZBIYbigxI1qjSor3anHSkm7mxomXeWZXMxLrwvKGkWGmwBfBrosOwgJzDzlQutuGXGQzBH5EaYyQRnYPlcwqvhu+XJ0RhzmxNFv7RCXjz3F9KY5GaNWQBC49RUl74Ujia+XhOsgKAumR0LrHE7XGxK970li7NEDZia4rHlydrpABIhtiIZ7OhEMZMoZYrGbETQ0cGnInOWxBsIkAblhiw5iWTAcZ6x8YzRmsvKhxnHC0CoZDGgwQsEWClpynjfHFuoBhVNqprV1LVozZJT1pyz5XlOVRNLppbNzK1YdfHk6tnN3YvXwkVwjGkouVjxUkqtCFpTha+K+RWGjTfZ0qZb3mzzrWx1x/bZ06573m33vey1cZOGIyC03Kx5K6126thKPXXtuVv3Xnod2GtDRho68rDho4x6UTupPlN7Jfff1OikxgvUnGd3ajCb3VzQPE50MgMxTgTiNgnMw2kyi04p8SQ3mcXCEkSUkaVOOI0mMRBMnVgHXezu5P7ILUDd/8uN35ELE93fIBcmugdyX7m9odbqOm5lAZpvITTFCSl4/TChe2Wv83vpW2347oMfRx9HH0cfRx9HH0cfR/+mo4EfDwV/p34DYDyRp9kjU70AAAGFaUNDUElDQyBwcm9maWxlAAB4nH2RPUjDQBzFX1OlRSoOdhBxyFCdLIhfiJNUsQgWSluhVQeTS7+gSUOS4uIouBYc/FisOrg46+rgKgiCHyAurk6KLlLi/5JCixgPjvvx7t7j7h0gNCpMNbvGAFWzjFQ8JmZzq2LgFUGEEMAspiRm6on0Ygae4+sePr7eRXmW97k/R6+SNxngE4nnmG5YxBvE05uWznmfOMxKkkJ8Tjxq0AWJH7kuu/zGueiwwDPDRiY1TxwmFosdLHcwKxkq8SRxRFE1yheyLiuctzirlRpr3ZO/MJTXVtJcpzmEOJaQQBIiZNRQRgUWorRqpJhI0X7Mwz/o+JPkkslVBiPHAqpQITl+8D/43a1ZmBh3k0IxoPvFtj+GgcAu0Kzb9vexbTdPAP8zcKW1/dUGMPNJer2tRY6Avm3g4rqtyXvA5Q4w8KRLhuRIfppCoQC8n9E35YD+W6Bnze2ttY/TByBDXS3fAAeHwEiRstc93h3s7O3fM63+fgDgI3LTZhc9jgAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB+MIDAgDKUEureIAAAEFSURBVEjH7dS/K4VRHMfxV4oUCUmSblFKVoP4B0wm8g/I4GZB1yqr3WIQo8nCX2DxH1BCbPIzdYXiWr7D8cS9z6qez3JO7/Oc7+c5n77nUKjQv1QT1nCGd9xiB32xPoAadpM9c/jEDUqNDDbj42V0YRyXuEDnLwZT8SN3GGlUfCiKH2T4dBRdzxhMoooXjOWJZz42lzO8LfhxYnCCp5gv1cs7VU+M9xlexVuyLqLriBMvojmPwWOMvRnejlY8JKyGBWxjFJU8EQ3jC4cZPhMFN5KI9pNTP+MVg3lMtsKkEl00gWtcofuPNl0NdpT3HqzgFB/Rfnvor3MPWnAefLZ4SgoV+qlv2dVAThtphkoAAAAASUVORK5CYII=') no-repeat center center;
                        }.tab-custom-select__list {
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
                         }.tab-custom-select__list-item {
                              display: block;
                              overflow-x: hidden;

                              min-height: 24px;
                              padding: 5px 0;

                              color: black;
                              white-space: nowrap;

                              background: transparent;
                              cursor: pointer;
                          }.tab-custom-select__list-selected-item-indicator {
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
                           }.tab-custom-select__list-item_selected .tab-custom-select__list-selected-item-indicator {
                                background: #1A78E2;
                            }.tab-custom-select__list-item-button {
                                 float: left;

                                 width: 30px;
                                 height: 20px;

                                 font-size: 8px;
                                 text-align: center;
                                 color: black;

                                 border: none;

                                 background: transparent;
                                 cursor: pointer;
                             }.tab-custom-select__list-item-folder {
                                  float: left;

                                  width: 30px;
                                  height: 20px;

                                  font-size: 12px;
                                  text-align: center;
                                  color: black;

                                  border: none;

                                  background: transparent;
                                  cursor: pointer;
                              }.tab-custom-select__list-item_selected .tab-custom-select__list-item-button {
                                   color: black;
                               }        .custom-bar-chart-label {
                                            color: #000000;
                                            font-size: 14px;
                                        }.custom-bar-chart-button {
                                             width: 30px;

                                             border: none;

                                             cursor: pointer;
                                             background-color: transparent;
                                             background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
                                         }.custom-bar-chart-button:focus {
                                              /* Нехорошо так делать, ой нехорошо */
                                              outline: none;
                                          }.custom-bar-chart-button_opened {
                                               background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48ZyBpZD0ib3JpZ2luYWwtaWNvbiIgZmlsbD0iIzFhNzhlMiI+PHBhdGggZD0iTTUzLjI0NjA5LDY4LjA4MzMzbC0xMC43NSwxMC43NWw0My41MDM5MSw0My41MDM5bDQzLjUwMzksLTQzLjUwMzlsLTEwLjc1LC0xMC43NWwtMzIuNzUzOSwzMi43NTM5eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==') no-repeat center center;
                                               transform: rotate(180deg);
                                           }.custom-bar-chart-subtitle {
                                                color: black;
                                                font-weight: 600;
                                            }    </style>

  <script>
    function drawSingleColumnChartHorizontal(container, category, needToShowCategory, series, index, max, options) {
      if (!options.numbersAfterComma && options.numbersAfterComma !== 0) {
        options.numbersAfterComma = 2;
      }    Highcharts.chart({
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
          formatter: function() {
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
          gridLineColor:"#e6e6e6",
          gridLineDashStyle:"Solid",
          gridLineWidth:0,
          gridZIndex:1,
          lineWidth:0,
          labels: {
            useHTML: true,
            align: "left",
            reserveSpace: true,
            style: options.labelStyles && options.labelStyles[index] ? options.labelStyles[index] : {
              fontSize:'14px',
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
            formatter: function() {
              return Highcharts.numberFormat(this.value, options && options.numbersAfterComma !== undefined && options.numbersAfterComma !== null ?
                options.numbersAfterComma : 2, '.', ' ');
            }
          },
          lineWidth:0,
          gridLineWidth:0
        },
        plotOptions: {
          bar: {
            borderRadius: 8,
            dataLabels: {
              enabled: true,
              formatter: function() {
                return Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                  options.numbersAfterComma, '.', ' ');
              }
            }
          }
        },
        legend: {
          enabled:false
        },
        credits: {
          enabled: false
        },
        series: series
      });
    }function drawCustomBarChart(container, options, dataSetIndex) {
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
      }    max = max * 1.1;

      if (options.altNameStyle) {
        var maxLength = 0;

        for (var i = 0; i < categories.length; i++) {
          if (categories[i].length > maxLength) {
            maxLength = categories[i].length;
          }            if (options.subTitles && options.subTitles[i]) {
            height += 36;
          }
        }        for (var i = 0; i < categories.length; i++) {
          if (options.subTitles && options.subTitles[i]) {
            var newDivSubTitle = document.createElement("div");

            newDivSubTitle.innerText = options.subTitles[i];
            newDivSubTitle.className = 'custom-bar-chart-subtitle';

            newDivSubTitle.style.fontSize = '14px';
            newDivSubTitle.style.fontFamily = 'Arial';
            newDivSubTitle.style.padding = '10px 0';
            newDivSubTitle.style.paddingLeft = '14px';

            container.appendChild(newDivSubTitle);
          }            var newDivData = document.createElement("div");

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
          setTimeout(function() {
            $(container).find('div > .highcharts-axis-labels.highcharts-xaxis-labels > span').css('left', '0');
          }, 0);
        }
      } else {
        height += categories.length * 16;

        for (var i = 0; i < categories.length; ++i) {
          if (options.subTitles && options.subTitles[i]) {
            height += 36;
          }
        }        for (var i = 0; i < categories.length; ++i) {
          if (options.subTitles && options.subTitles[i]) {
            var newDivSubTitle = document.createElement("div");

            newDivSubTitle.innerText = options.subTitles[i];
            newDivSubTitle.className = 'custom-bar-chart-subtitle';

            newDivSubTitle.style.fontSize = '14px';
            newDivSubTitle.style.fontFamily = 'Arial';
            newDivSubTitle.style.padding = '10px 0';
            newDivSubTitle.style.paddingLeft = '24px';

            container.appendChild(newDivSubTitle);
          }            var newDivLabel = document.createElement("div");

          newDivLabel.innerText = categories[i];
          $(newDivLabel).css("color", '#000000');
          $(newDivLabel).css("font-size", '14px');
          $(newDivLabel).css("padding-left", '24px');
          $(newDivLabel).css("font-family", 'robotoregular');
          $(newDivLabel).css("font-family", 'Arial');

          if (i === 0 && (options.subTitles && !options.subTitles[0] || !options.subTitles)) {
            $(newDivLabel).css("padding-top", '20px');

            height += 20;
          }            container.appendChild(newDivLabel);

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
    }        function drawPieChart(container, pieData) {
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
    }
    function _customSelectGetFolderState(selectIndex, folderIndex) {
      var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
      var selectData = _customSelectArray[selectIndex].data;

      // Раскоментить, если понадобится ставить галочку, когда выделена только папка, но не потомки
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
    }        // Необхожим плагин custom-bar-chart.js
    // Необходимы стили custom-bar-chart.css
    var _customBarChartIndexesCounter = 0;
    var _labelHeight = 20;


    function _customBarChartCreateItems(container, dataSet, options, leftMargin, max, parentId) {
      for (var i = 0; i < dataSet.length; i++) {
        var id = "div_item_" + _customBarChartIndexesCounter;

        _customBarChartAddItem(container, options, dataSet, i, leftMargin, max, id, parentId);
        _customBarChartIndexesCounter++;

        if (dataSet[i].children) {
          _customBarChartCreateItems(container, dataSet[i].children, options, leftMargin + options.leftChildrenMargin, max, id);
        }
      }
    }function _customBarChartAddItem(container, options, dataSet, index, leftMargin, max, id, parentId) {
      var dataSetItem = dataSet[index];
      dataSetItem.data.color = getLinearGradient(dataSetItem.data.color, true);
      var mainItemContainer = document.createElement("div");
      mainItemContainer.setAttribute("id", id);

      if (parentId) {
        mainItemContainer.setAttribute("parentId", parentId);
        mainItemContainer.style.display = 'none';
      }    if (dataSetItem.subTitle) {
        var newDivSubTitle = document.createElement("div");

        newDivSubTitle.innerText = dataSetItem.subTitle;
        newDivSubTitle.className = 'custom-bar-chart-subtitle';

        container.style.height = container.offsetHeight + 36 + 'px';
        newDivSubTitle.style.fontSize = '14px';
        newDivSubTitle.style.fontFamily = 'Arial';
        newDivSubTitle.style.padding = '10px 0';
        newDivSubTitle.style.paddingLeft = '24px';

        container.appendChild(newDivSubTitle);
      }    var newDivLabel = document.createElement("div");

      newDivLabel.className = 'custom-bar-chart-label';
      newDivLabel.innerText = dataSetItem.name;
      newDivLabel.style.height = _labelHeight + 'px';
      newDivLabel.style.paddingLeft = leftMargin + 10 + 'px';

      if (dataSetItem.children) {
        var button = document.createElement("button");
        button.className = 'custom-bar-chart-button';
        button.style.height = _labelHeight + 'px';

        button.onclick = function () {
          if (button.getAttribute("state") === "closed") {
            container.style.height = container.offsetHeight + dataSetItem.children.length * (options.itemHeight + _labelHeight) + 'px';
            button.setAttribute("state", "opened");
            button.className += ' custom-bar-chart-button_opened';
            var childElements = $("[parentId=" + button.getAttribute("itemId") + "]");
            for (var j = 0; j < childElements.length; j++) {
              $(childElements[j]).css("display",  'block');
            }
          } else {
            _customBarChartHideChildren(button, button.getAttribute("itemId"), container, options);
          }
        };

        button.setAttribute("state", "closed");
        button.setAttribute("itemId", id);
        newDivLabel.appendChild(button);
      }
      mainItemContainer.appendChild(newDivLabel);

      var newDivData = document.createElement("div");
      newDivData.style.paddingLeft = leftMargin + 'px';
      newDivData.style.height = options.itemHeight + 'px';

      mainItemContainer.appendChild(newDivData);
      container.appendChild(mainItemContainer);
      var series = [{
        name: options.seriesName ? options.seriesName : 'Количество',
        data: [dataSetItem.data]
      }];

      drawSingleColumnChartHorizontal(newDivData, dataSetItem.name, false, series, index, max, options);
    }function _customBarChartHideChildren(button, id, container, options) {
      var childElements = $("[parentId=" + id + "]");
      var hiddenChildrenCount = 0;

      if (button) {
        $(button).removeClass('custom-bar-chart-button_opened');
      }    for (var j = 0; j < childElements.length; j++) {
        var $childElement = $(childElements[j]);

        if ($childElement.css('display') !== 'none') {
          $childElement.css("display",  'none');

          ++hiddenChildrenCount;
          _customBarChartHideChildren(undefined, childElements[j].getAttribute("id"), container, options) + 1;
        }
      }    var childButtons = $("[itemId=" + id + "]");

      for (var j = 0; j < childButtons.length; j++) {
        $(childButtons[j]).attr("state", "closed");
      }    container.style.height = container.offsetHeight - hiddenChildrenCount * (options.itemHeight + _labelHeight) + 'px';
    }function _customBarChartPrepareData(dataSet, max) {
      for (var i = 0; i < dataSet.length; ++i) {
        if (dataSet[i].data.y > max) {
          max = dataSet[i].data.y;
        }        if (dataSet[i].children && dataSet[i].children.length > 0) {
          max = _customBarChartPrepareData(dataSet[i].children, max);
        }
      }    return max;
    }function createCustomBarChart(container, options) {
      options = parseDataFromString(options);
      var dataSet = options.dataSet;

      var max = _customBarChartPrepareData(dataSet, 0) * 1.05;
      calcVisibleYInHierarchy(dataSet, options.acceptableDif ? options.acceptableDif : 2, max);

      options.leftMargin = options.leftMargin ? options.leftMargin : 14;
      options.leftChildrenMargin = options.leftChildrenMargin ? options.leftChildrenMargin : 14;
      options.itemHeight = options.itemHeight ? options.itemHeight : 45;

      container.style.height = 20 + dataSet.length * (options.itemHeight + _labelHeight) + 'px';
      container.innerHtml = '';
      container.style.paddingTop = '10px';

      _customBarChartCreateItems(container, dataSet, options, options.leftMargin, max);
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
    function showDataFullness(percent) {
      var percentContainer = document.getElementById('data-fullness');
      percentContainer.innerText = percent + '%';
    }
    function showObjectsForRegistration(value) {
      var valueContainer = document.getElementById('objects-for-registration');
      valueContainer.innerText = value;
    }function showCashFlowInformation(dataSet) {
      dataSet = parseDataFromString(dataSet);

      addLinearGradientToSeries(dataSet.series, true);

      var options = {
        id: 1,
        type: "barChart",
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
      };

      renderChart(options);
    }function showUnauthorizedTradePenalties(dataSet) {
      dataSet = parseDataFromString(dataSet);

      addLinearGradientToSeries(dataSet.series);

      var options = {
        id: 2,
        type: "columnChart",
        tabSection: [
          {
            id: 1,
            type: "legend",
            marginLeft: "auto",
            marginRight: "0",
            rightTab: false
          }
        ],
        dataSets: [{categories: dataSet.categories, series: dataSet.series}]
      };

      renderChart(options);
    }function showNumberOfChangesInNTOLayout(dataSet) {
      dataSet = parseDataFromString(dataSet);

      addLinearGradientToSeries(dataSet.series);

      var options = {
        id: 3,
        type: "columnChart",
        tabSection: [
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
    }function showGarbageRemoval(dataSet) {
      dataSet = parseDataFromString(dataSet);

      addLinearGradientToData(dataSet);

      var options = {
        id: 4,
        type: "pieChart",
        dataSets: [
          {
            data: dataSet,
            hideDataLine: true,
            total: true,
            numbersAfterComma: 0,
            dataLabelFormat: 'onlyPercentages',
            autoItemMargin: true
          }
        ]
      };

      renderChart(options);
    }function showEGAS(data) {
      data = parseDataFromString(data);

      var getItemFromEgas = function(id, items) {
        for (var i = 0; i < items.length; i++) {
          if (items[i].id === id) {
            return items[i];
          }
        }
        // default
      // , '#40B3EE', 'rgb(255, 205, 86)', 'rgb(255, 99, 132)', '#28C75E', '#40B3EE'
        return {
          id: 0,
          name: 'не определено',
          color: ['#D1FFAC', '#1A78E2']
        }
      }
      item = getItemFromEgas(data.selectedItem.id, data.items);
     

      dataPie = [
        {
          name: 'Несоответствие',
          y: data.selectedItem.total - data.selectedItem.y,
          color: getLinearGradient(['rgb(255, 205, 86)', 'rgb(255, 205, 86)'])
        },
        {
          name: 'Соответствие',
          y: data.selectedItem.y,
          color: getLinearGradient(item.color)
        }
      ];

      var options = {
        id: 5,
        type: "pieChartCustomLegend",
        dataSets: [{
          total: true,
          data: dataPie,
          legend: data.items,
          legendItemIndex: data.selectedItem.id,
          hideDataLine: true,
          dataLabelFormat: 'onlyPercentages',
          numbersAfterComma: 0,
          legendType: 'top',
          autoItemMargin: true
        }]
      };

      renderChart(options);
    }function showNTOStatistics(dataSet, tabs) {
      dataSet = parseDataFromString(dataSet);
      tabs = parseDataFromString(tabs);

      var options = {
        id: 6,
        type: 'customHierarchyBarChart',
        tabSection: [
          {
            id: 3,
            type: "customComboBox",
            caption: "За:",
            marginLeft: "17px",
            marginRight: "auto",
            rightTab: true,
            items: tabs
          }
        ],
        leftChildrenMargin: 30,
        itemHeight: 50,
        numbersAfterComma: 0,
        dataSet: dataSet
      }
      renderChart(options);
    }
  </script>
</head>
<body>
<div class="main-content">
  <div class="main-content__selection">

    <div class="section__content">
      <div class="section__content__container">
        <div id="TestName"></div>
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
        <td class="section__small-blocks-table__gap"></td>
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
        <td class="small-data-block" id="objects_for_registration_block">
            <div class="small-data-block__header-part" id="objects-for-registration"></div>
            <div class="small-data-block__text-part">Объекты для регистрации</div>
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
                    <td class="big-data-block__header__text">Информация по поступлению денежных средств по сезонным объектам (бахча, елки, тележки (тыс.руб.))</td>
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

          <tr class="section__big-blocks-table__row" style="z-index: 390" >








            <td class="big-data-block" id="infoBlock2">

              <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                  <tbody>
                  <tr>
                    <td class="big-data-block__header__text">Доходы от штрафов по несанкционированной торговле, (тыс. руб.)</td>
                    <td class="big-data-block__header__resize-button">

                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                           alt=""
                           data-id="2"
                           data-height="376px"
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
                     style="overflow: hidden; height:376px ">

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
                    <td class="big-data-block__header__text">Количество изменений в схеме размещения НТО при СТО</td>
                    <td class="big-data-block__header__resize-button">

                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                           alt=""
                           data-id="3"
                           data-height="376px"
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
                     style="overflow: hidden; height:376px ">

                </div>

              </div>
            </td>


          <tr class="section__big-blocks-table__row-gap"></tr>

          <tr class="section__big-blocks-table__row" style="z-index: 380" >








            <td class="big-data-block" id="infoBlock4">

              <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                  <tbody>
                  <tr>
                    <td class="big-data-block__header__text">Наличие договоров на вывоз мусора у стационарных объектов (%), (тыс. руб.)</td>
                    <td class="big-data-block__header__resize-button">

                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                           alt=""
                           data-id="4"
                           data-height="354px"
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
                     style="overflow: hidden; height:354px ">

                </div>

                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_1">
                  <span>Перейти в отчет</span>

                  <div class="colors-font big-data-block__data-list__show-more-button-array"></div>

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
                    <td class="big-data-block__header__text">Сверка с ФНС России полноты заполнения карточек хозяйствующих субъектов в ЕГАС СИОПР (%)</td>
                    <td class="big-data-block__header__resize-button">

                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAK5JREFUSA1jYBgFAx0CjOgOmLrixNb//xm8kMUZGRm2ZUdYeCOLEauOCVkTiI1uOFj+P+N/dHXY+Nj0smBTCBLLibTA8B2yWnQfTVl+AqsjMHyAbAg12DS3ACOIQBHKQGSYI/uQXH3IZoyy6RQCoBwKwqRah0sfRirClhuJsQyXPprnA5pbgBFEsOBALluILU1hepFpDB+AcySyChCbyJzNyMBIcuJAt2qUT/0QAACa/DxJxwt9AAAAAABJRU5ErkJggg=="
                           alt=""
                           data-id="5"
                           data-height="354px"
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
                     style="overflow: hidden; height:354px ">

                </div>

                <div class="colors-font big-data-block__data-list__show-more-button" id="transition_button_2">
                  <span>перейти в отчёт</span>

                  <div class="colors-font big-data-block__data-list__show-more-button-array"></div>

                </div>

              </div>
            </td>


          <tr class="section__big-blocks-table__row-gap"></tr>

          <tr class="section__big-blocks-table__row" style="z-index: 370" >








            <td class="big-data-block" id="infoBlock6" colspan="3">

              <div class="big-data-block__header">
                <table class="big-data-block__header-table">
                  <tbody>
                  <tr>
                    <td class="big-data-block__header__text">Статистика по схеме согласования НТО при СТО (шт.)</td>
                    <td class="big-data-block__header__resize-button">

                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="big-data-block__content">
                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_6"
                     style="overflow: hidden; height: ">

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
  // Верхняя панель
  // Полнота данных (в процентах)
  function showDataFullnessOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getDataFullnessFromServer",
      success: function(data) {
        showDataFullness(data);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showDataFullness');
      }
    });
  }// Объекты для регистрации в торговом реестре
  function showObjectsForRegistrationOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getObjectsForRegistrationFromServer",
      success: function(data) {
        showObjectsForRegistration(data);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showObjectsForRegistration');
      }
    });
  }
  var colorsArr =
    [ ['#D1FFAC', '#D1FFAC',],

      [ '#1A78E2', '#1A78E2'],
      [ '#40B3EE', '#40B3EE'],
      ['rgb(255, 205, 86)', 'rgb(255, 205, 86)'],
      ['rgb(255, 99, 132)', 'rgb(255, 99, 132)'],
  
      ['rgb(54, 162, 235)', 'rgb(54, 162, 235)',],
      ['#28C75E', '#28C75E',],
      [ 'rgb(255, 99, 132)','rgb(255, 99, 132)'],
      ['#D1FFAC', '#D1FFAC',],
      ['#1A78E2', '#1A78E2',],
      [ '#40B3EE','#40B3EE'],
      ['#28C75E', '#28C75E',],
      ['rgb(255, 205, 86)', 'rgb(255, 205, 86)',],
      [ '#40B3EE', '#40B3EE'],
      ['rgb(54, 162, 235)', 'rgb(54, 162, 235)',],
      ['rgb(255, 99, 132)','rgb(255, 99, 132)'],
      ['#28C75E', '#28C75E',],
      ['#40B3EE', '#40B3EE'],
      ['#1A78E2', '#1A78E2',],
      ['rgb(54, 162, 235)', 'rgb(54, 162, 235)'],
      ['#D1FFAC', '#28C75E',],

      ['#1A78E2', '#1A78E2',],


    ]
  // 1) Информация по поступлению денежных средств по сезонным объектам (бахча, елки, тележки (тыс.руб.))
  function showCashFlowInformationOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getCashFlowInformationFromServer",
      success: function(data) {

        let newData = JSON.parse(data)
        for (let i = 0; i <  newData.series[0].data.length; i++) {


            newData.series[0].data[i].color = colorsArr[i]



        }
        let json = JSON.stringify(newData)
        showCashFlowInformation(json);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showCashFlowInformation');
      }
    });
  }// 2) Доходы от штрафов по несанкционированной торговле, (тыс. руб.)
  function showUnauthorizedTradePenaltiesOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getUnauthorizedTradePenaltiesFromServer",
      success: function(data) {

        let newData = JSON.parse(data)
        for (let i = 0; i <  newData.series.length; i++) {

            newData.series[i].color = colorsArr[i + 2]

        }
        let json = JSON.stringify(newData)
        showUnauthorizedTradePenalties(json);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showUnauthorizedTradePenalties');
      }
    });
  }// 3) Количество изменений в схеме размещения НТО при СТО
  function showNumberOfChangesInNTOLayoutOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getNumberOfChangesInNTOLayoutFromServer",
      success: function(data) {
        let newData = JSON.parse(data)
        for (let i = 0; i <  newData.series.length; i++) {


            newData.series[i].color = colorsArr[i + 3]

        }
        let json = JSON.stringify(newData)
        showNumberOfChangesInNTOLayout(json);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showNumberOfChangesInNTOLayout');
      }
    });
  }// 4) Наличие договоров на вывоз мусора у объектов (%), (тыс. руб.)
  function showGarbageRemovalOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getGarbageRemovalFromServer",
      success: function(data) {

        let newData = JSON.parse(data)
        for (let i = 0; i <  newData.length; i++) {


            newData[i].color = colorsArr[i + 4]


        }

        let json = JSON.stringify(newData)
        showGarbageRemoval(json);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showGarbageRemoval');
      }
    });
  }// 5) Сверка с ФНС России полноты заполнения карточек хозяйствующих субъектов в ЕГАС СИОПР (%)   -  "chartButton_5_1"
  function showEGASOnline(btn) {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getEGASFromServer",
      success: function(data) {
        var JSONx;
        var datax = JSON.parse(data);
        console.log(datax)


        var curCount = datax.length -1;

        var nameArr = ["ФИО Руководителя", "Статус «Действует»", "ОКПФ", "КПП", "ОГРН", "ИНН", "Наименование хозяйствующего субъекта"];
        var colorsArr =
          [['#D1FFAC',
            '#28C75E',
          ],
            [ '#40B3EE', '#1A78E2'],
            [
              'rgb(255, 205, 86)',
              'rgb(255, 99, 132)'],

            [ 'rgb(255, 99, 132)','#40B3EE'],
            ['#D1FFAC',
              '#28C75E',
            ],
            ['#1A78E2',
              'rgb(255, 205, 86)',
            ],

            ['rgb(255, 99, 132)','rgb(255, 99, 132)'],
            ['#D1FFAC',
              '#28C75E',
            ],
            ['#40B3EE', 'rgb(255, 99, 132)'],
            ['#1A78E2',
              'rgb(255, 205, 86)',
            ],
            ['rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
            ],]
        if(curCount != 0) {
          var JSONx2 = [];
          for(var i = 0; i < curCount; i++) {
            JSONx2[i] = {"id": i+1, "name": nameArr[i], "color": colorsArr[i]};
          }


          var id = btn.substr(btn.length -1);
          var selectedItem = {"id": id, "y": datax[curCount-1] - datax[id-1], "total": datax[curCount-1]};

          JSONx = {"items": JSONx2, "selectedItem": selectedItem};
        }

        showEGAS(JSONx);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showEGAS');
      }
    });
  }// 6) Статистика по схеме согласования НТО шт.  -  "comboBoxItem_1_1"
  async function getTitleName() { 
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=ПолучитьТекущуюУправу",
      success: function(data) {
        TestName.innerHTML = `<h2>${"Управа "  + " " + data}</h2>`;
      },
      error:  function(){
        alert('Ошибка получения данных для функции ПолучитьТекущуюУправу');
      }
    });
  } 
  function showNTOStatisticsOnline(btn) {
    var param = utf8_to_b64('btn1='+btn);
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getNTOStatisticsFromServer&param="+param,
      success: function(data) {
        var JSONx;
        var datax = JSON.parse(data);

        var textArr = ["Сегодня", "Эта неделя", "Этот месяц", "Этот квартал", "Этот год"];

        var textTab = "comboBoxItem_1_";
        var btnText;
        var tabs = [];
        for(var i = 1; i < 6; i++) {
          btnText = textTab + i;
          if(btnText == btn) {
            tabs[i-1] = {"id": i, "text": textArr[i-1], "buttonId": btnText, "selected": "true"};
          } else {
            tabs[i-1] = {"id": i, "text": textArr[i-1], "buttonId": btnText};
          }
        }

        showNTOStatistics(data, tabs);
      },
      error:  function(){
        alert('Ошибка получения данных для функции showNTOStatistics');
      }
    });
  }// Установка даты актуальности
  function setActualDateOnline() {
    $.ajax({
      type: 'POST',
      url: 'selector_1s.php', // Обработчик собственно
      data: "wp=Uprava&func=getActualDate",
      success: function(data) {
        setActualDate(data);
      },
      error:  function(){
        alert('Ошибка получения данных для функции setActualDate');
      }
    });
  }
  function utf8_to_b64( str ) {
    return window.btoa(unescape(encodeURIComponent( str )));
  }    $(document).ready(function() {
    attachButtonsEventPerformers();
    getTitleName();
    showDataFullnessOnline();
    showObjectsForRegistrationOnline();
    showCashFlowInformationOnline();
    showUnauthorizedTradePenaltiesOnline();
    showNumberOfChangesInNTOLayoutOnline();
    showGarbageRemovalOnline();
    showEGASOnline("chartButton_5_1");
    showNTOStatisticsOnline("comboBoxItem_1_1");
    setActualDateOnline();

    $(document).on('click', '#chart_6 #tabPanel_0 li', function(event) {
      setTimeout(function(){
        var btn = $('#chart_6 #tabPanel_0 li.tab-custom-select__list-item_selected').data('id');
        showNTOStatisticsOnline("comboBoxItem_1_"+btn);
      }, 500);
    });
  });
</script>
</html>
