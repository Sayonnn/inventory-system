const imgInput = document.querySelector('#itemimage');
const imgEl = document.querySelector('#image');
imgInput.addEventListener("change",()=>{
  imgEl.src = URL.createObjectURL(imgInput.files[0]);
})