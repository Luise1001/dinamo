if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
        (position) => {
            Livewire.dispatch('saveLocation', [position.coords]);     
        },
        (error) => {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.error("Permission denied.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.error("Locaion is not available.");
                    break;
                case error.TIMEOUT:
                    console.error("time request expired.");
                    break;
                default:
                    console.error("Error:", error.message);
            }
        }
    );
} else {
    console.error("Geolocation is not available.");
}
