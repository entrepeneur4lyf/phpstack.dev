// Animation presets for Motion
export const presets = {
    // Fade animations
    fade: {
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: { duration: 0.3 }
    },

    // Slide animations
    slideUp: {
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: { duration: 0.3 }
    },

    slideDown: {
        initial: { opacity: 0, y: -20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: 20 },
        transition: { duration: 0.3 }
    },

    // Scale animations
    scale: {
        initial: { opacity: 0, scale: 0.95 },
        animate: { opacity: 1, scale: 1 },
        exit: { opacity: 0, scale: 0.95 },
        transition: { duration: 0.3 }
    },

    // Spring configurations
    spring: {
        type: "spring",
        stiffness: 300,
        damping: 30,
        mass: 1
    },

    // Stagger animations
    stagger: {
        container: {
            initial: { opacity: 0 },
            animate: {
                opacity: 1,
                transition: {
                    staggerChildren: 0.1
                }
            }
        },
        item: {
            initial: { opacity: 0, y: 20 },
            animate: { opacity: 1, y: 0 }
        }
    }
};

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize intersection observer for animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add in-view class for CSS animations
                entry.target.classList.add('in-view');

                // Handle stagger animations
                if (entry.target.classList.contains('stagger-children')) {
                    entry.target.classList.add('visible');
                }

                // Handle process steps
                if (entry.target.classList.contains('process-step')) {
                    const isEven = Array.from(entry.target.parentNode.children)
                        .indexOf(entry.target) % 2 === 0;
                    entry.target.classList.toggle('even', isEven);
                }

                // Stop observing after animation
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });

    // Observe elements with animation classes
    document.querySelectorAll('[data-animate], .stagger-children, .process-step, .fade-in')
        .forEach(el => observer.observe(el));

    // Handle marquee hover effects
    const marquees = document.querySelectorAll('.animate-marquee');
    marquees.forEach(marquee => {
        ['mouseenter', 'touchstart'].forEach(event => {
            marquee.addEventListener(event, () => {
                marquee.style.animationPlayState = 'paused';
            });
        });

        ['mouseleave', 'touchend'].forEach(event => {
            marquee.addEventListener(event, () => {
                marquee.style.animationPlayState = 'running';
            });
        });
    });

    // Handle brand logo hover effects
    const brandLogos = document.querySelectorAll('.brand-logo');
    brandLogos.forEach(logo => {
        logo.addEventListener('touchstart', () => {
            // Remove active class from all logos
            brandLogos.forEach(l => l.classList.remove('active'));
            // Add active class to current logo
            logo.classList.add('active');
        });
    });
});
