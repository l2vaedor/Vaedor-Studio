(function(api){
	'use strict';
	document.addEventListener('input',function(event){
		const wrap=event.target.closest('.vaedor-customize-range__inputs');
		if(!wrap)return;
		wrap.querySelectorAll('input').forEach(function(input){if(input!==event.target)input.value=event.target.value;});
	});
	document.addEventListener('click',function(event){
		const button=event.target.closest('[data-vaedor-reset]');
		if(!button)return;
		if(!window.confirm('Да върнем ли началните стойности само за тази група?'))return;
		let values={};try{values=JSON.parse(button.dataset.vaedorReset||'{}');}catch(error){return;}
		Object.keys(values).forEach(function(id){if(api(id))api(id).set(values[id]);});
	});
})(wp.customize);
