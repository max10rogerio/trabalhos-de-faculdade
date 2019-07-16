var inputImage = document.querySelector('#imagem')
if (inputImage) {
  inputImage.addEventListener('change', function (e) {
    var file = this.files[0]
    var reader = new FileReader()
    reader.onload = function () {
      document.getElementById('thumb').src = this.result
    }
    reader.readAsDataURL(file)
  }, false)
}
