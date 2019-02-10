let forms = document.querySelectorAll('input.form-control');
let buttonClear = document.getElementById('clear');
		
buttonClear.onclick = () => {
	for (let i = 0; i < forms.length; i++) {
		forms[i].value = '';
	}
}