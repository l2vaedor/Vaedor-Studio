(function(api,data){
	'use strict';
	const shadow={none:'none',subtle:'0 4px 16px color-mix(in srgb,var(--shadow-color) 8%,transparent)',medium:'0 12px 32px color-mix(in srgb,var(--secondary-shadow-color) 14%,transparent)'};
	function value(raw,format){
		if(format==='case')return raw?'uppercase':'none';
		if(format==='ratio')return String(raw).replaceAll('-','/');
		if(format==='shadow')return shadow[raw]||'none';
		return String(raw)+(format||'');
	}
	Object.keys(data.tokens||{}).forEach(function(group){
		Object.keys(data.tokens[group]).forEach(function(key){
			const spec=data.tokens[group][key],id='vaedor_base_'+group+'['+key+']';
			api(id,function(setting){setting.bind(function(next){
				const target=spec[0]==='--card-shadow'?document.querySelectorAll('.card'):[document.documentElement];
				target.forEach(function(element){element.style.setProperty(spec[0],value(next,spec[1]));});
			});});
		});
	});
})(wp.customize,window.vaedorCustomizerPreview||{});
