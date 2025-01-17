// Image Upload
const dropArea = document.getElementById('drop-area');
const inputFile = document.getElementById('inputImage');
const imageView = document.getElementById('img-view');

inputFile.addEventListener('change', uploadImage);

function uploadImage() {
  let imgLink = URL.createObjectURL(inputFile.files[0]);
  imageView.style.backgroundImage = `url(${imgLink})`;
  imageView.textContent = '';
  dropArea.style.border = 0;
}

dropArea.addEventListener('dragover', function (e) {
  e.preventDefault();
});

dropArea.addEventListener('drop', function (e) {
  e.preventDefault();
  inputFile.files = e.dataTransfer.files;
  uploadImage();
});
