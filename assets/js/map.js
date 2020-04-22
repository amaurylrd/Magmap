function map_initialize(data) {
    const width = 600, height = 600;

    const svg = d3.select('#map').append("svg")
        .attr("id", "svg")
        .attr("width", width)
        .attr("height", height);

    const deps = svg.append("g");

    const projection = d3.geoConicConformal()
        .center([2.454071, 46.279229])
        .scale(3000)
        .translate([width / 2, height / 2]);

    const path = d3.geoPath().projection(projection);

    d3.json("assets/json/departments.json").then(function(geojson) {
        deps.selectAll("path")
            .data(geojson.features)
            .enter()
            .append("path")
            .attr("stroke", "white")
            .attr('id', function(d) { return "d"+d.properties.CODE_DEPT; })
            .attr("d", path);
            

            var values = [];
            for (let i = 1; i < 95; i++) {
                if (i != 20) {
                    let rand = Math.floor(Math.random() * Math.floor(500));
                    values.push({code: i, weight: rand});
                }
            }            

            const sum = array => array.reduce((accumulator, currentValue) => accumulator + currentValue.weight, 0);
            const chunk = (arr, n) => arr.length ? [arr.slice(0, n), ...chunk(arr.slice(n), n)] : [];
            values.sort(function(a, b) { return d3.descending(a.weight, b.weight) });

            var nclasses = Math.floor(Math.log2(values.length + 1));
            var classes = chunk(values, Math.ceil(values.length / nclasses));
            
            const color_scale = d3.scaleLinear().domain([1, nclasses])
                .interpolate(d3.interpolateHcl)
                .range([d3.rgb("#FCC5C0"), d3.rgb('#49006A')]);

            console.log('classes');
            console.log(classes);
            for (let i = nclasses - 1; i >= 0 ; i--) {
                let color = color_scale(i);
                for (let j = 0; j < classes[i].length; j++) {
                    let id = ("0"+classes[i][j].code).slice(-2);
                    d3.select("#d"+id)._groups[0][0].style.fill = color;
                }
          }
    //violet 4 #49006a
    //rose 3 #dd3497
    //rose 2 #f768a1
    //rose 1 #fa9fb5
    //rose 0 #fcc5c0
    });
}