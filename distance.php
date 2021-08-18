<script>
directions.on("route", e => {
    // routes is an array of route objects as documented here:
    // https://docs.mapbox.com/api/navigation/#route-object
    let routes = e.route

    // Each route object has a distance property
    console.log("Route lengths", routes.map(r => r.distance))
})
</script>