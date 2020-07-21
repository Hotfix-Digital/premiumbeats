document.addEventListener("DOMContentLoaded", function() {
    const selectElement = (element) => document.querySelector(element);

    selectElement(".hamburger").addEventListener("click", () => {
        selectElement(".hamburger").classList.toggle("active");
        selectElement(".nav-list").classList.toggle("active");
    });


    const tracklists = document.querySelectorAll(".tracklisting");

    tracklists.forEach(tracklist => {
        tracklist.addEventListener("click", event => {
        tracklist.classList.toggle("active");
        const tracklisting = tracklist.nextElementSibling;

        if(tracklist.classList.contains("active")) {
            tracklisting.style.maxHeight = 250 + "px";
        }
        else {
            tracklisting.style.maxHeight = 0;
        } 
    });
    });
});
