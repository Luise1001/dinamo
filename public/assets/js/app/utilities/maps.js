const error = document.getElementById("error");
let map;
let marker;
let autocomplete;
let geocoder;

document.addEventListener("DOMContentLoaded", function () {
    const script = document.createElement("script");
    script.src = `https://maps.googleapis.com/maps/api/js?key=${key}&libraries=places`;
    script.async = true;
    script.defer = true;
    script.onload = () => initMap();
    document.head.appendChild(script);
});

function initMap() {
    geocoder = new google.maps.Geocoder();

    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });

    autocomplete = new google.maps.places.Autocomplete(document.getElementById("autocomplete"));
    autocomplete.bindTo("bounds", map);

    autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            error.textContent = "No encontramos la ubicación seleccionada.";
            return;
        }

        error.textContent = "";
        map.setCenter(place.geometry.location);
        map.setZoom(15); 
        placeMarker(place.geometry.location);
    });

    map.addListener("click", (event) => {
        placeMarker(event.latLng);
        updateAddress(event.latLng);
    });
}

function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
    map.panTo(location);

    console.log(location);
}


function updateAddress(location) {
    geocoder.geocode({ location: location }, (results, status) => {
        if (status === "OK" && results[0]) {
            document.getElementById("autocomplete").value = results[0].formatted_address;
            error.textContent = "";
        } else {
            error.textContent = "No se pudo obtener la dirección de esta ubicación.";
        }
    });
}
