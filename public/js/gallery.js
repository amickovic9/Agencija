document.addEventListener('DOMContentLoaded', function () {
    var scrollLeftButton = document.getElementById('scrollLeft');
    var scrollRightButton = document.getElementById('scrollRight');
    var imageTrack = document.getElementById('image-track');
    var largeImage = document.querySelector('.large-image');
    var firstImage = imageTrack.querySelector('img');

    if (firstImage) {
        largeImage.src = firstImage.src;
        firstImage.classList.add('selected-image');
    }

    scrollLeftButton.addEventListener('click', function() {
        imageTrack.scrollLeft -= 540;
    });

    scrollRightButton.addEventListener('click', function() {
        imageTrack.scrollLeft += 540;
    });

    imageTrack.addEventListener('click', function (event) {
        if (event.target.tagName === 'IMG') {
            var selectedImage = document.querySelector('.selected-image');
            if (selectedImage) {
                selectedImage.classList.remove('selected-image');
            }

            event.target.classList.add('selected-image');
            largeImage.src = event.target.src;
        }
    });

    document.getElementById('uploadBtn').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('uploadBtn').textContent = fileName;
    });
});
