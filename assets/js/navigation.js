(() => {
	'use strict';

	const toggle = document.querySelector('[data-js="mobile-menu-toggle"]');
	const menu = document.querySelector('[data-js="mobile-menu"]');
	if (!toggle || !menu) return;
	const desktop = window.matchMedia('(min-width: 64rem)');

	const close = (restoreFocus = false) => {
		toggle.setAttribute('aria-expanded', 'false');
		menu.hidden = !desktop.matches;
		if (restoreFocus) toggle.focus();
	};
	const sync = () => {
		const focusInMenu = menu.contains(document.activeElement);
		toggle.hidden = desktop.matches;
		close(!desktop.matches && focusInMenu);
		// A focused toggle becomes hidden at desktop width.
		if (desktop.matches && document.activeElement === toggle) menu.querySelector('a')?.focus();
	};
	toggle.addEventListener('click', () => {
		const open = toggle.getAttribute('aria-expanded') !== 'true';
		toggle.setAttribute('aria-expanded', String(open));
		menu.hidden = !open;
	});
	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') close(true);
	});
	document.addEventListener('click', (event) => {
		if (!desktop.matches && !menu.contains(event.target) && !toggle.contains(event.target)) {
			close(menu.contains(document.activeElement));
		}
	});
	desktop.addEventListener('change', sync);
	sync();
})();
