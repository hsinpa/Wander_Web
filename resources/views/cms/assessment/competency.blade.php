<div id="wrainbo-cms-assessment-usage" >
  <div class="tabs-content">
    <div class="row mainGraph">
      <div class="medium-12 columns">
          <canvas id="competency" height="150px" width="500px"></canvas>
          <script>
            var competencyData = {
              labels: ['Diligence','Responsiveness','Analytical','Coachable','Experimental'],
              data: [40, 55, 75, 47, 32]
            }
            var competencyLocation = document.getElementById('competency').getContext('2d');
            var competencyChart = new Chart(competencyLocation, {
              type: 'bar',
              data: {
                labels: ['Diligence','Responsiveness','Analytical','Coachable','Experimental'],
                  datasets: [{
                      data: [40, 55, 75, 47, 32],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
                  legend: {
                    display: false
                  }
              }
            });
          </script>
      </div>
    </div>
  </div>
  <div class="key-metrics">
    <div class="tabs-content">
      <div class="row"><p>
        <div>Diligence:</div>
        <div>Responsiveness:</div>
        <div>Analytical:</div>
        <div>Coachable:</div>
        <div>Experimental:</div>
      </p></div>
    </div>
  </div>
</div>
