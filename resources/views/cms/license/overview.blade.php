<div class="wrainbo-cms-license-overview">
  <h2>Licenses</h2>

  <div class="chart-holder">
    <canvas id="donut" height="260px" width="260px"></canvas>
    <p>
      <span class="licenseDonutChart-title">Available</span>
      <span class="licenseDonutChart-remaining">{{$available_licenses}}</span>
      <span class="licenseDonutChart-total">{{$active_licenses}}/{{$total_licenses}} Active</span>
    </p>
  </div>
  <script>
    var total = {{$total_licenses}};
    var available = {{$available_licenses}};
    var active = {{$active_licenses}};
    var donutLocation = document.getElementById('donut').getContext('2d');
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
  <br />

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
