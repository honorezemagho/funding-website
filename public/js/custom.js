
function CheckFileSize(element){
    const input = document.getElementById(element)

input.addEventListener('change', (event) => {
  const target = event.target
  	if (target.files && target.files[0]) {
      const maxAllowedSize = 5 * 1024 * 1024;
      if (target.files[0].size > maxAllowedSize) {
      	// Here you can ask your users to load correct file
          alert('Vous ne pouvez pas uploader un fichier de plus de 5MB');
       	  target.value = ''
      }
  }
})
}