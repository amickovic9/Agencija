document.addEventListener("DOMContentLoaded", function() {
    var currentPath = window.location.pathname;
    var links = document.querySelectorAll('.nav-option');

    links.forEach(function(link) {
        var linkPath = link.getAttribute('href');
        console.log('Current Path:', currentPath);
        console.log('Link Path:', linkPath);

        if (currentPath.endsWith(linkPath)) {
            link.classList.add('active');
        }
    });
});
