/**
 * bit2ai Theme — main.js
 * Pure vanilla JS, no jQuery dependency
 */

(function () {
    'use strict';

    // ============================================================
    // Mobile menu toggle
    // ============================================================
    const hamburger = document.getElementById('hamburger-btn');
    const siteNav   = document.getElementById('site-nav');

    if (hamburger && siteNav) {
        hamburger.addEventListener('click', function () {
            const isOpen = siteNav.classList.toggle('is-open');
            hamburger.classList.toggle('is-open', isOpen);
            hamburger.setAttribute('aria-expanded', String(isOpen));
            hamburger.setAttribute(
                'aria-label',
                isOpen ? 'Navigation schließen' : 'Navigation öffnen'
            );
            // Prevent body scroll when menu is open
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });

        // Close menu when a nav link is clicked
        siteNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                siteNav.classList.remove('is-open');
                hamburger.classList.remove('is-open');
                hamburger.setAttribute('aria-expanded', 'false');
                hamburger.setAttribute('aria-label', 'Navigation öffnen');
                document.body.style.overflow = '';
            });
        });

        // Close menu on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && siteNav.classList.contains('is-open')) {
                siteNav.classList.remove('is-open');
                hamburger.classList.remove('is-open');
                hamburger.setAttribute('aria-expanded', 'false');
                hamburger.setAttribute('aria-label', 'Navigation öffnen');
                document.body.style.overflow = '';
                hamburger.focus();
            }
        });
    }

    // ============================================================
    // Sticky header — add .scrolled class for enhanced shadow
    // ============================================================
    const siteHeader = document.getElementById('site-header');

    if (siteHeader) {
        function onScroll() {
            if (window.scrollY > 20) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll(); // run once on load
    }

    // ============================================================
    // Smooth scroll to anchor links
    // ============================================================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (!target) return;

            e.preventDefault();

            const headerHeight = siteHeader ? siteHeader.offsetHeight : 0;
            const targetTop = target.getBoundingClientRect().top + window.scrollY - headerHeight - 16;

            window.scrollTo({
                top: targetTop,
                behavior: 'smooth',
            });
        });
    });

    // ============================================================
    // Contact form — basic client-side validation feedback
    // ============================================================
    const contactForm = document.querySelector('.contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            const requiredFields = contactForm.querySelectorAll('[required]');
            let valid = true;

            requiredFields.forEach(function (field) {
                field.classList.remove('form-input--error');
                if (!field.value.trim()) {
                    field.classList.add('form-input--error');
                    valid = false;
                }
            });

            const emailField = contactForm.querySelector('#email');
            if (emailField && emailField.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailField.value.trim())) {
                    emailField.classList.add('form-input--error');
                    valid = false;
                }
            }

            if (!valid) {
                e.preventDefault();
                const firstError = contactForm.querySelector('.form-input--error');
                if (firstError) {
                    firstError.focus();
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });

        // Clear error state on input
        contactForm.querySelectorAll('.form-input').forEach(function (input) {
            input.addEventListener('input', function () {
                this.classList.remove('form-input--error');
            });
        });
    }

})();
