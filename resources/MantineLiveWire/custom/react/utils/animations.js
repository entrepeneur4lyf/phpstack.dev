// Interaction-specific presets
export const presets = {
    // Large, smooth animations for modals/drawers
    drawer: {
        distance: 100,
        scale: 0.95,
        spring: {
            type: "spring",
            stiffness: 300,
            damping: 30,
            mass: 1
        },
        duration: 0.3
    },
    
    // Medium, snappy animations for menus/popovers
    popover: {
        distance: 10,
        scale: 0.95,
        spring: {
            type: "spring",
            stiffness: 400,
            damping: 25,
            mass: 0.8
        },
        duration: 0.2
    },
    
    // Quick, light animations for hover cards
    hover: {
        distance: 8,
        scale: 0.97,
        spring: {
            type: "spring",
            stiffness: 500,
            damping: 30,
            mass: 0.8
        },
        duration: 0.15
    },
    
    // Very quick, subtle animations for tooltips
    tooltip: {
        distance: 6,
        scale: 0.98,
        spring: {
            type: "spring",
            stiffness: 600,
            damping: 30,
            mass: 0.5
        },
        duration: 0.1
    }
};

// Spring configurations based on presets
export const springs = {
    default: presets.popover.spring,
    snappy: presets.hover.spring,
    bouncy: {
        type: "spring",
        stiffness: 200,
        damping: 15,
        mass: 1
    }
};

// Duration-based transitions
export const durations = {
    fast: presets.tooltip.duration,
    default: presets.popover.duration,
    slow: presets.drawer.duration
};

// Overlay animations with preset support
export const overlayAnimations = {
    // Fade animation
    fade: {
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: { duration: durations.default }
    },
    
    // Scale and fade animation
    scale: {
        initial: { opacity: 0, scale: 0.9 },
        animate: { opacity: 1, scale: 1 },
        exit: { opacity: 0, scale: 0.9 },
        transition: springs.default
    },
    
    // Position-based animations with preset support
    getPositionAnimation: (position, preset = 'popover') => {
        const config = presets[preset];
        const { distance, scale } = config;

        switch (position) {
            case 'top':
                return {
                    initial: { opacity: 0, y: -distance, scale },
                    animate: { opacity: 1, y: 0, scale: 1 },
                    exit: { opacity: 0, y: -distance, scale },
                    transition: config.spring
                };
            case 'bottom':
                return {
                    initial: { opacity: 0, y: distance, scale },
                    animate: { opacity: 1, y: 0, scale: 1 },
                    exit: { opacity: 0, y: distance, scale },
                    transition: config.spring
                };
            case 'left':
                return {
                    initial: { opacity: 0, x: -distance, scale },
                    animate: { opacity: 1, x: 0, scale: 1 },
                    exit: { opacity: 0, x: -distance, scale },
                    transition: config.spring
                };
            case 'right':
                return {
                    initial: { opacity: 0, x: distance, scale },
                    animate: { opacity: 1, x: 0, scale: 1 },
                    exit: { opacity: 0, x: distance, scale },
                    transition: config.spring
                };
            default:
                return {
                    initial: { opacity: 0, scale },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale },
                    transition: config.spring
                };
        }
    }
};

// Interactive element animations
export const interactive = {
    // Button animations
    button: {
        whileHover: { scale: 1.05 },
        whileTap: { scale: 0.95 },
        transition: springs.snappy
    },
    
    // Link animations
    link: {
        whileHover: { scale: 1.02 },
        whileTap: { scale: 0.98 },
        transition: springs.snappy
    }
};

// Layout animations
export const layout = {
    // Default layout animation
    default: {
        layout: true,
        transition: { duration: durations.default }
    },
    
    // List item animations
    listItem: {
        layout: true,
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: springs.default
    },
    
    // Content animations
    content: {
        layout: true,
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: { duration: durations.default }
    }
};

// Scroll-linked animations
export const scroll = {
    // Fade in/out based on scroll position
    fade: (scrollYProgress) => ({
        opacity: scrollYProgress
    }),
    
    // Scale and fade
    scaleAndFade: (scrollYProgress) => ({
        opacity: scrollYProgress,
        scale: 0.8 + (scrollYProgress * 0.2)
    })
};

// Stagger animations for lists/grids
export const stagger = {
    // Container animation
    container: {
        animate: {
            transition: {
                staggerChildren: 0.05
            }
        }
    },
    
    // Child item animation
    item: {
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: springs.default
    }
};
