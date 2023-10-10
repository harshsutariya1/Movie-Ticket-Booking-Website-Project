document.addEventListener("DOMContentLoaded", function() {
     const links = document.querySelectorAll(".navigation a");
 
     links.forEach(function(link) {
         link.addEventListener("click", function(e) {
             // Remove the 'clicked' class from all links
             links.forEach(function(link) {
                 link.classList.remove("clicked");
             });
 
             // Add the 'clicked' class to the clicked link
             e.target.classList.add("clicked");
         });
     });
 });