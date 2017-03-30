<div id="wrainbo-cms-assessment-usage" >
  <div class="tabs-content">
    <div class="row learningRow">
      <div class="medium-4 columns">
          <canvas id="learningMarketing"></canvas>
          <script>
          var opts = {
              lines: 12, // The number of lines to draw
              angle: 0, // The length of each line
              lineWidth: 0.44, // The line thickness
              pointer: {
              length: 0.9, // The radius of the inner circle
              strokeWidth: 0.035, // The rotation offset
              color: '#000000' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#6FADCF',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
            };
            var target = document.getElementById('learningMarketing'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 3000; // set max gauge value
            gauge.animationSpeed = 32; // set animation speed (32 is default value)
            gauge.set(1250); // set actual value
          </script>
          <div>Marketing</div>
      </div>
      <div class="medium-4 columns">
          <canvas id="learningOperations"></canvas>
          <script>
          var opts = {
              lines: 12, // The number of lines to draw
              angle: 0, // The length of each line
              lineWidth: 0.44, // The line thickness
              pointer: {
              length: 0.9, // The radius of the inner circle
              strokeWidth: 0.035, // The rotation offset
              color: '#000000' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#6FADCF',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
            };
            var target = document.getElementById('learningOperations'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 3000; // set max gauge value
            gauge.animationSpeed = 32; // set animation speed (32 is default value)
            gauge.set(1250); // set actual value
          </script>
          <div>Operations</div>
      </div>
      <div class="medium-4 columns">
          <canvas id="learningFinance"></canvas>
          <script>
          var opts = {
              lines: 12, // The number of lines to draw
              angle: 0, // The length of each line
              lineWidth: 0.44, // The line thickness
              pointer: {
              length: 0.9, // The radius of the inner circle
              strokeWidth: 0.035, // The rotation offset
              color: '#000000' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#6FADCF',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: '#E0E0E0',   // to see which ones work best for you
            generateGradient: true
            };
            var target = document.getElementById('learningFinance'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 3000; // set max gauge value
            gauge.animationSpeed = 32; // set animation speed (32 is default value)
            gauge.set(1250); // set actual value
          </script>
          <div>Finance</div>
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
