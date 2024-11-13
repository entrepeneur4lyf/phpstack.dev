// Spring configurations
export const springs = {
    // Natural feeling spring for most animations
    default: {
        type: "spring",
        stiffness: 300,
        damping: 30,
        mass: 1,
    },
    
    // Snappier spring for quick interactions
    snappy: {
        type: "spring",
        stiffness: 400,
        damping: 25,
        mass: 1,
    },
    
    // Bouncy spring for playful animations
    bouncy: {
        type: "spring",
        stiffness: 200,
        damping: 15,
        mass: 1,
    },
};

// Duration-based transitions
export const durations = {
    fast: 0.15,
    default: 0.2,
    slow: 0.3,
};

// Overlay animations (Modal, Dialog, Drawer)
export const overlayAnimations = {
    // Fade animation for overlays
    fade: {
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: { duration: durations.default },
    },
    
    // Scale and fade animation
    scale: {
        initial: { opacity: 0, scale: 0.9 },
        animate: { opacity: 1, scale: 1 },
        exit: { opacity: 0, scale: 0.9 },
        transition: springs.default,
    },
    
    // Position-based animations
    getPositionAnimation: (position, distance = 20) => {
        switch (position) {
            case 'top':
                return {
                    initial: { opacity: 0, y: -distance, scale: 0.95 },
                    animate: { opacity: 1, y: 0, scale: 1 },
                    exit: { opacity: 0, y: -distance, scale: 0.95 },
                };
            case 'bottom':
                return {
                    initial: { opacity: 0, y: distance, scale: 0.95 },
                    animate: { opacity: 1, y: 0, scale: 1 },
                    exit: { opacity: 0, y: distance, scale: 0.95 },
                };
            case 'left':
                return {
                    initial: { opacity: 0, x: -distance, scale: 0.95 },
                    animate: { opacity: 1, x: 0, scale: 1 },
                    exit: { opacity: 0, x: -distance, scale: 0.95 },
                };
            case 'right':
                return {
                    initial: { opacity: 0, x: distance, scale: 0.95 },
                    animate: { opacity: 1, x: 0, scale: 1 },
                    exit: { opacity: 0, x: distance, scale: 0.95 },
                };
            default:
                return {
                    initial: { opacity: 0, scale: 0.9 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.9 },
                };
        }
    },
};

// Interactive element animations
export const interactive = {
    // Hover and tap animations for buttons
    button: {
        whileHover: { scale: 1.1 },
        whileTap: { scale: 0.95 },
        transition: springs.snappy,
    },
    
    // Subtle hover and tap for links
    link: {
        whileHover: { scale: 1.05 },
        whileTap: { scale: 0.98 },
        transition: springs.snappy,
    },
};

// Layout animations
export const layout = {
    // Default layout animation
    default: {
        layout: true,
        transition: { duration: durations.default },
    },
    
    // List item animations
    listItem: {
        layout: true,
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: springs.default,
    },
    
    // Content animations
    content: {
        layout: true,
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: { duration: durations.default },
    },
};

// Scroll-linked animations
export const scroll = {
    // Fade in/out based on scroll position
    fade: (scrollYProgress) => ({
        opacity: scrollYProgress,
    }),
    
    // Scale and fade
    scaleAndFade: (scrollYProgress) => ({
        opacity: scrollYProgress,
        scale: 0.8 + (scrollYProgress * 0.2),
    }),
};

// Stagger animations for lists/grids
export const stagger = {
    // Default stagger animation
    container: {
        animate: {
            transition: {
                staggerChildren: 0.05,
            },
        },
    },
    
    // Child item animation
    item: {
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: springs.default,
    },
};
