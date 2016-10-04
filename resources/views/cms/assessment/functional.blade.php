<div id="wrainbo-cms-assessment-usage" >
  <div class="tabs-content">
    <div class="row mainGraph">
      <div class="medium-5 medium-centered columns">
          <canvas id="functional" height="300px" width="500px"></canvas>
          <script>
            var functionalLocation = document.getElementById('functional').getContext('2d');
            var functionalChart = new Chart(functionalLocation, {
              type: 'pie',
              data: {
                labels: ['Learning by Doing','Data Driven','Knowledge Driven'],
                  datasets: [{
                      data: [55, 120, 75],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  legend: {
                    position: 'right'
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
        <div>Learning by Doing:</div>
        <div>Data Driven:</div>
        <div>Knowledge Driven:</div>
      </p></div>
    </div>
  </div>
</div>
