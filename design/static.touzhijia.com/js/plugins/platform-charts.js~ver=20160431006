$(function () {

  if ($('#no-plat-distribution-data').length == 0) {
    $.ajax({
      url: '/home/platformCharts',
      type: 'get',
      dataType: 'json',
      data: {},
      success: function (values) {
        if (values.platform.length != 0) {
          platformDistribution(values.platform);
          periodDistribution(values.period);
        }
      }
    });

    function platformDistribution(seriesData) {
      // Build the chart
      $('#platChart').highcharts({
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          marginLeft: 340,
          marginTop: -40,
          height: 314
        },
        title: {
          text: ''
        },
        tooltip: {
          pointFormat: '占比: <b>{point.percentage:.2f}%</b><br/>{series.name}: <b>{point.y}元</b>'
        },
        legend: {
          layout: 'vertical',
          align: 'left',
          verticalAlign: 'top',
          x: 120,
          y: 0,
          borderWidth: 0,
          maxHeight: 300
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: false
            },
            showInLegend: true
          }
        },
        series: [{
          type: 'pie',
          name: '待收',
          data: seriesData
        }]
      });
    }

    function periodDistribution(seriesData) {
      // Build the chart
      $('#timeChart').highcharts({
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          marginLeft: 340,
          marginTop: -40,
          height: 314
        },
        title: {
          text: ''
        },
        tooltip: {
          pointFormat: '占比: <b>{point.percentage:.2f}%</b><br/>{series.name}: <b>{point.y}个</b>'
        },
        legend: {
          layout: 'vertical',
          align: 'left',
          verticalAlign: 'top',
          x: 120,
          y: 0,
          borderWidth: 0,
          maxHeight: 230
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: false
            },
            showInLegend: true
          }
        },
        series: [{
          type: 'pie',
          name: '平台数',
          data: seriesData
        }]
      });
    }
  }

  
});