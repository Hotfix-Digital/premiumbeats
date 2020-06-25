document.addEventListener("DOMContentLoaded", function() {
    const selectElement = (element) => document.querySelector(element);

    selectElement(".hamburger").addEventListener("click", () => {
        console.log("I h ave been clicked");
        selectElement(".hamburger").classList.toggle("active");
        selectElement(".nav-list").classList.toggle("active");
    });


     const tracklists = document.querySelectorAll(".tracklisting");

        tracklists.forEach(tracklist => {
        tracklist.addEventListener("click", event => {
        tracklist.classList.toggle("active");
        const tracklisting = tracklist.nextElementSibling;
        console.log(tracklisting);
        if(tracklist.classList.contains("active")) {
            // tracklisting.style.maxHeight = tracklisting.scrollHeight + "px";
            tracklisting.style.maxHeight = 600 + "px";
        }
        else {
            tracklisting.style.maxHeight = 0;
        } 
     });
    });
});
