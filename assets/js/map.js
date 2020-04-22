function map_initialize(data) {
    console.log(data);
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
            .attr('id', function(d) { return ""+d.properties.CODE_DEPT; })
            .attr("d", path);

            //var data = ["1" -> 2, "2" => 4];
            //tableau nbr de ppl par dept

    //     d3.csv("population.csv", function(csv) {
    //     var quantile = d3.scale.quantile().domain([0, d3.max(csv, function(e) { return +e.POP; })]).range(d3.range(9));
    //     csv.forEach(function(e,i) {
    //         d3.select("#" + e.CODE_DEPT)
    //             .attr("class", function(d) { return "q" + quantile(+e.POP) + "-9"; })
    //     });
    // });

    //violet 4 #49006a
    //rose 3 #dd3497
    //rose 2 #f768a1
    //rose 1 #fa9fb5
    //rose 0 #fcc5c0
    });
}
    /*var map = L.map('map').setView([2.454071, 46.279229], 7);

    var osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { // LIGNE 20
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            });
    
            map.addLayer(osmLayer);
        }
            /*
            const width = 700, height = 550;


        const xy = d3.geo.albers()
            .origin([2.6,46.5])
            .parallels([44,49])
            .scale(2700)
            .translate([250,250]);
        var path = d3.geo.path().projection(xy);


const projection = d3.geoConicConformal() // Lambert-93
    .center([2.454071, 46.279229]) // Center on France
    .scale(2600)
    .translate([width / 2 - 50, height / 2]);

path.projection(projection);

const svg = d3.select('#map').append("svg")
    .attr("id", "svg")
    .attr("width", width)
    .attr("height", height)
    .attr("class", "Blues");

const deps = svg.append("g");

var promises = [];
promises.push(d3.json('d3js/map-population/departments.json'));


Promise.all(promises).then(function(values) {
    const geojson = values[0]; // Récupération de la première promesse : le contenu du fichier JSON
    const csv = values[1]; // Récupération de la deuxième promesse : le contenu du fichier csv
    
    var features = deps
        .selectAll("path")
        .data(geojson.features)
        .enter()
        .append("path")
        .attr('id', d => "d" + d.properties.CODE_DEPT)
        .attr("d", path);*/