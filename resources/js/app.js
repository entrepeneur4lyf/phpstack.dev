import './bootstrap';
import '../css/app.css';
import '../css/animations.css';
import './animations';

// Import Motion
import { motion } from 'motion/react';

// Initialize Alpine.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Initialize Motion
window.motion = motion;

// Import Mantine hooks
import './mantineHooks';

// Add intersection observer polyfill for older browsers
if (!('IntersectionObserver' in window)) {
    import('intersection-observer');
}

// Add smooth scroll behavior polyfill
if (!('scrollBehavior' in document.documentElement.style)) {
    import('smoothscroll-polyfill').then((module) => {
        module.polyfill();
    });
}

// Initialize any data attributes needed for animations
document.addEventListener('DOMContentLoaded', () => {
    // Add smooth scroll to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Initialize intersection observer for animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                if (entry.target.classList.contains('stagger-children')) {
                    entry.target.classList.add('visible');
                }
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });

    // Observe elements with animation classes
    document.querySelectorAll('[data-animate], .stagger-children, .process-step, .fade-in')
        .forEach(el => observer.observe(el));

    // Initialize Motion components
    const motionElements = document.querySelectorAll('[data-motion]');
    motionElements.forEach(element => {
        const animation = element.dataset.motion;
        if (animation && motion[animation]) {
            motion[animation](element);
        }
    });
});
