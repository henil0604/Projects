updateMap();


function updateMap() {

    console.log("Map Reloded")
    fetch("http://127.0.0.1:5500/data.json")
        .then(response => response.json())
        .then(rsp => {
            // console.log(rsp.data);
            rsp.data.forEach(element => {
                var letitude = element.latitude;
                var longitude = element.longitude

                var cases = element.infected;
                if (cases > 2000) {
                    color = "rgb(255,0,0)"
                }
                else {
                    color = `rgb(${cases},0,0)`
                }


                //marker

                var marker = new mapboxgl.Marker({
                    draggable: false,
                    color: `${color}`,
                })
                    .setLngLat([longitude, letitude])
                    .addTo(map);

            });

        })

}
