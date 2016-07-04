    function initMap() {

        var fit = {
            lat: 59.902955,  //поменять координту lat
            lng: 30.322377// поменять координату lon
        };
        var park = {
            lat: 59.902548,  //поменять координту lat
            lng: 30.323986  // поменять координату lon
        };
        
          var image = 'img/parking-icon.png';

        var villages = new google.maps.Map(document.getElementById('villages'), {
            zoom: 15, //зум
            center: fit,
            scrollwheel: false
        });
        var marker = new google.maps.Marker({
            position: fit,
            map: villages,
            title: 'Экофитнес' //заголовок маркера
        });

        var marker = new google.maps.Marker({
            position: park,
            map: villages,
           icon: image,
            title: 'Парковка' //заголовок маркера
        });

    }
