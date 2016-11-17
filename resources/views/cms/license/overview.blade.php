<div class="wrainbo-cms-license-overview">
  <h2>Licenses</h2>

  <div class="chart-holder">
    <canvas id="donut" height="260px" width="260px"></canvas>
  </div>
  <script>
    var total = {{$total_licenses}};
    var available = {{$available_licenses}};
    var active = {{$active_licenses}};
    var donutLocation = document.getElementById('donut').getContext('2d');

    Chart.pluginService.register({
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;

        ctx.restore();
        var fontSize = (height / 254).toFixed(2);
        ctx.font = fontSize + "em LatoWebLight";
        ctx.textBaseline = "middle";
        ctx.fillStyle = '#2a8bde';
        var text = "Available",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = (height / 2)*.7;
        ctx.fillText(text, textX, textY);

        var fontSize = (height / 80).toFixed(2);
        ctx.font = fontSize + "em LatoWebLight";
        ctx.textBaseline = "middle";
        ctx.fillStyle = '#2a8bde';
        var text = "{{$available_licenses}}",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = (height / 2)*1.0;
        ctx.fillText(text, textX, textY);

        var fontSize = (height / 254).toFixed(2);
        ctx.font = fontSize + "em LatoWebLight";
        ctx.textBaseline = "middle";
        ctx.fillStyle = 'black';
        var text = "{{$active_licenses}}/{{$total_licenses}} Active",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = (height / 2)*1.3;
        ctx.fillText(text, textX, textY);

        ctx.save();
      }
    });

    var myDoughnutChart = new Chart(donutLocation, {
      type: 'doughnut',
      data: {
        labels: ['Available Licenses','Active Licenses'],
        datasets: [{
            data: [available, active],
            backgroundColor: [
                'rgba(49, 130, 189, 1)',
                'rgba(107, 174, 214, 1)'
            ],
            borderWidth: 1
        }]
      },
      options: {
        cutoutPercentage: 75,
          legend: {
              display: false
          }
      }
    });
  </script>
  <div>
      <table>
        <tr>
          <td>
            Total licenses :
          </td>
          <td>
            {{$total_licenses}}
          </td>
        </tr>
        <tr>
          <td>
            Number of Licensed Used :
          </td>
          <td>
            {{$active_licenses}}
          </td>
        </tr>
        <tr>
          <td>
            Number of Licenses Available :
          </td>
          <td>
            {{$available_licenses}}
          </td>
        </tr>
      </table>
  </div>
</div>
