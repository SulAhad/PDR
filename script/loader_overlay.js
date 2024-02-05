document.addEventListener("DOMContentLoaded", function(event) 
{
    var loaderOverlay = document.getElementById("loader-overlayX");
    window.addEventListener("beforeunload", function() 
    {
        loaderOverlay.style.display = "block";
    });
});