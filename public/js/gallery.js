document.addEventListener("DOMContentLoaded", () => {
  const track = document.getElementById("image-track");
  const images = track.getElementsByClassName("image");

  const firstImage = images[0].cloneNode(true);
  const lastImage = images[images.length - 1].cloneNode(true);
  track.prepend(lastImage);
  track.append(firstImage);

  track.dataset.percentage = -100 / (images.length + 2); 
  track.style.transform = `translate(${track.dataset.percentage}%, -50%)`;

  window.onmousedown = e => handleOnDown(e, track);
  window.ontouchstart = e => handleOnDown(e.touches[0], track);
  window.onmouseup = () => handleOnUp(track);
  window.ontouchend = () => handleOnUp(track);
  window.onmousemove = e => handleOnMove(e, track, images);
  window.ontouchmove = e => handleOnMove(e.touches[0], track, images);
});

document.getElementById('uploadBtn').addEventListener('click', function() {
  document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function() {
  var fileName = this.files[0].name;
  document.getElementById('uploadBtn').textContent = fileName;
});

function handleOnDown(e, track) {
  track.dataset.mouseDownAt = e.clientX;
}

function handleOnUp(track) {
  track.dataset.mouseDownAt = "0";
  track.dataset.prevPercentage = track.dataset.percentage;
}

function handleOnMove(e, track, images) {
  if (track.dataset.mouseDownAt === "0") return;

  const mouseDelta = parseFloat(track.dataset.mouseDownAt) - e.clientX;
  const maxDelta = window.innerWidth / 2;

  const percentage = (mouseDelta / maxDelta) * -100;
  const nextPercentageUnconstrained = parseFloat(track.dataset.prevPercentage) + percentage;
  let nextPercentage = nextPercentageUnconstrained;

  if (nextPercentage >= 0) {
      track.style.transition = 'none';
      nextPercentage = -100 * (images.length - 1) / (images.length + 2);
  } else if (nextPercentage <= -100 * images.length / (images.length + 2)) {
      track.style.transition = 'none';
      nextPercentage = -100 / (images.length + 2);
  } else {
      track.style.transition = '';
  }

  track.dataset.percentage = nextPercentage;
  track.style.transform = `translate(${nextPercentage}%, -50%)`;

  updateImagesOpacityAndPosition(images, nextPercentage);
}

function updateImagesOpacityAndPosition(images, nextPercentage) {
  for (const image of images) {
      const rect = image.getBoundingClientRect();
      const fadeStartLeft = 400;
      const fadeEndLeft = 50;
      const fadeStartRight = window.innerWidth - 400;
      const fadeEndRight = window.innerWidth - 50;
      let opacity = 1;

      if (rect.left < fadeStartLeft) {
          opacity = (rect.left - fadeEndLeft) / (fadeStartLeft - fadeEndLeft);
          opacity = Math.max(0, opacity);
      }

      if (rect.right > fadeStartRight) {
          opacity = (fadeEndRight - rect.right) / (fadeEndRight - fadeStartRight);
          opacity = Math.max(0, opacity);
      }
      opacity = Math.min(1, opacity);

      image.style.opacity = opacity;
  }
}
