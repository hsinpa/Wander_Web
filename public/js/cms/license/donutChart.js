var DonutChart = (function () {


  return {
    Plot : function(chartClass) {
      var dataset = [
        { label: 'Used', count: 412 },
        { label: 'Available', count: 88 }
      ];

      var width = 220;
      var height = 220;
      var radius = Math.min(width, height) / 2;
      var donutWidth = 20;                            // NEW

      var color = d3.scaleOrdinal(d3.schemeCategory20c);

      var svg = d3.select('.'+chartClass)
        .append('svg')
        .attr('width', width)
        .attr('height', height)
        .append('g')
        .attr('transform', 'translate(' + (width / 2) +
          ',' + (height / 2) + ')');

      var arc = d3.arc()
                  .outerRadius(radius)
  		            .innerRadius(radius - donutWidth);

      var pie = d3.pie()
                  .value(function(d) { return d.count; })
                  .sort(null);


      var path = svg.selectAll('path')
        .data(pie(dataset))
        .enter()
        .append('path')
        .attr('d', arc)
        .attr('fill', function(d, i) {
          return color(d.data.label);
        });
    }
  }

})();
