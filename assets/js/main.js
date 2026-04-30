/**
 * JIWF Academy — main JS bundle (vanilla, no dependencies).
 */
(function () {
	'use strict';

	const ready = (fn) => {
		if (document.readyState !== 'loading') fn();
		else document.addEventListener('DOMContentLoaded', fn);
	};

	/* === Header scroll state === */
	const initHeader = () => {
		const header = document.querySelector('.site-header');
		if (!header) return;
		const onScroll = () => {
			header.classList.toggle('is-scrolled', window.scrollY > 16);
		};
		onScroll();
		window.addEventListener('scroll', onScroll, { passive: true });
	};

	/* === Mobile nav toggle === */
	const initNav = () => {
		const header = document.querySelector('.site-header');
		const toggle = document.querySelector('.nav-toggle');
		if (!header || !toggle) return;

		toggle.addEventListener('click', () => {
			const isOpen = header.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', String(isOpen));
		});

		// Close on link click (mobile)
		header.querySelectorAll('.primary-nav a').forEach((a) => {
			a.addEventListener('click', () => {
				header.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
			});
		});
	};

	/* === Reveal-on-scroll === */
	const initReveal = () => {
		const items = document.querySelectorAll('.fade-up, .fade-in');
		if (!items.length || !('IntersectionObserver' in window)) {
			items.forEach((el) => el.classList.add('is-visible'));
			return;
		}
		const io = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						io.unobserve(entry.target);
					}
				});
			},
			{ rootMargin: '0px 0px -80px 0px', threshold: 0.05 }
		);
		items.forEach((el) => io.observe(el));
	};

	ready(() => {
		initHeader();
		initNav();
		initReveal();
	});
})();
