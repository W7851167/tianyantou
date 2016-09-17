/*switch tab */
  (function(){ 
    var halfYeayIncomesChart = function() {
      if(arguments.callee.loaded) return;
      arguments.callee.loaded  = 1;
      $.ajax({
          url: '/chart/incomeStats',
          type: 'GET',
          dataType: 'json'
      }).done(function(response) {
            var categories = new Array();
            var serieData =  new Array();
            var showCharts = false;
            var colors = Highcharts.getOptions().colors;
            var i = 0;
            $.each(response, function(cate, data){
              categories.push(cate.replace('-', '/'));
              serieData.push({y:data, color: colors[i]});
              i++;
              if(data > 0) {
                showCharts = true;
              }
            });
            var chartSetting = {
              chart: {
                  type: 'column'
              },
              title: {
                  text: ''
              },
              subtitle: {
                  text: ''
              },
              xAxis: {
                  categories: categories
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: '单位(元)'
                  },
                   labels: {
                      formatter:function () {
                        var axis = this.axis,
                          value = this.value,
                          numericSymbols = ['千', '万',  '百万', '千万', '亿'],
                          units = [1000, 10000, 1000000, 10000000, 100000000],
                          categories = axis.categories,
                          dateTimeLabelFormat = this.dateTimeLabelFormat,
                          i = numericSymbols && numericSymbols.length,
                          multi,
                          ret,
                          formatOption = axis.options.labels.format,
                          numericSymbolDetector = axis.isLog ? value : axis.tickInterval;
                        if (i && numericSymbolDetector >= 1000) {
                          while (i-- && ret === undefined) {
                            multi = units[i];
                            if (numericSymbolDetector >= multi && value % multi === 0 && numericSymbols[i] !== null) {
                              ret = Highcharts.numberFormat(value / multi, -1) + numericSymbols[i];
                            }
                          }
                        }
                        if (ret === undefined) {
                          if (Math.abs(value) >= 10000) { 
                            ret = Highcharts.numberFormat(value, -1);

                          } else { 
                            ret = Highcharts.numberFormat(value, -1, undefined, ''); 
                          }
                        }
                        return ret;
                      }
                    }
              },
              plotOptions: {
                  column: {
                      cursor: 'pointer',
                      point: {
                      },
                      dataLabels: {
                          enabled: true,
                          color: colors[0],
                          style: {
                              fontWeight: 'bold'
                          },
                          formatter: function() {
                            return this.y
                          }
                      }
                  }
              },
              tooltip: {
                  formatter: function() {
                      var point = this.point,
                          s = this.x + ' 收益：￥<b>'+ this.y +'</b><br/>';
                      return s;
                  }
              },
              series: [{
                  name: '近半年收益',
                  data: serieData,
                  color: 'white'
              }],
              exporting: {
                  enabled: true
              }
          };
          var $profitChart = $('#profit-chart');
          if (showCharts) {
            $profitChart.highcharts(chartSetting);
          } else {
            $profitChart.html('<p class="no-record">您暂无任何投资收益</p>');
          }
          Ucenter.readaptSidemenuAndMainpanel();
      }).fail(function() {
          $('#profit-chart').html('<p class="no-record">加载投资收益信息失败 :-(</p>');
      });

    }

    var waitIncomeCalendar = function() {
      var dtd = $.Deferred();
      var date = new Date();
	  var month = date.getMonth() + 1;
	  month = month < 10 ? '0' + month : month;
      var calendarSetting = {
        header: {
          left: '',
          center: 'title',
          right: 'prev,next'
        },
        defaultDate: date.getFullYear() + '-' + month + '-01',
        timezone:'utc',
        lang: 'zh-cn',
        buttonIcons: false,
        weekNumbers: false,
        editable: false,
        eventLimit: false,
        events: function(start, end, timezone, callback) {
          $.ajax({
            url : '/chart/waitIncomeStats',
            data : {
              start:start.format(),
              end:end.format(),
              token: $('input[name=utoken]').val(),
              version: 3
            },
            success: function(data) {
              var date = ($('#paieback-calendar .fc-center').text()).split(' ');
              var summary = '<li>'+date[1]+'待收本息：<em>' +data.dueIn+ '</em></li>';
              summary += '<li>'+date[1]+'待还本息：<em>' +data.billAmt+ '</em></li>'
              $('.summary-info').html(summary);
              callback(data.details);
              dtd.resolve();
            },
            error: function() {
              dtd.resolve();
            }
          })
        }
     }

     $('#paieback-calendar').fullCalendar(calendarSetting);
     Ucenter.readaptSidemenuAndMainpanel();
     return dtd.promise();
  }

// $.when(waitIncomeCalendar()).done(function(){
//  halfYeayIncomesChart();
// });
waitIncomeCalendar()
$('.chart-calendar').on('click','.tab li',function(){
  halfYeayIncomesChart(); 
});



})();