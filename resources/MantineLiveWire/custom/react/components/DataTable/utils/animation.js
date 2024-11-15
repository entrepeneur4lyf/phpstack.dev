import { springs } from '../../../utils/animations';
import { stagger, useTransform, useMotionValue } from 'motion/react';

// Core spring configurations
const springConfig = {
    snappy: {
        type: "spring",
        mass: 0.3,
        stiffness: 300,
        damping: 30
    },
    layout: {
        type: "spring",
        mass: 0.8,
        stiffness: 200,
        damping: 25
    }
};

// Motion value creators for tracking animation state
export const createMotionState = () => ({
    scroll: useMotionValue(0),
    sortProgress: useMotionValue(0),
    filterProgress: useMotionValue(0)
});

// Value transformations with velocity support
export const transforms = {
    fadeOut: (scrollProgress) => {
        const velocity = scrollProgress.getVelocity();
        const velocityFactor = Math.min(Math.abs(velocity) / 1000, 0.3);
        
        return useTransform(
            scrollProgress,
            [0, 0.8],
            [1, Math.max(0, 1 - velocityFactor)]
        );
    },
    scaleDown: (scrollProgress) => {
        const velocity = scrollProgress.getVelocity();
        const velocityFactor = Math.min(Math.abs(velocity) / 1000, 0.1);
        
        return useTransform(
            scrollProgress,
            [0, 1],
            [1, 0.95 + velocityFactor]
        );
    },
    backgroundFade: (scrollProgress) => useTransform(
        scrollProgress,
        [0, 0.5, 1],
        ['rgba(0,0,0,0)', 'rgba(0,0,0,0.05)', 'rgba(0,0,0,0)']
    ),
    rowOffset: (scrollProgress, index) => {
        const velocity = scrollProgress.getVelocity();
        const direction = velocity >= 0 ? 1 : -1;
        
        return useTransform(
            scrollProgress,
            [0, 1],
            [0, direction * index * 10]
        );
    }
};

// Viewport configuration
export const viewportConfig = {
    amount: 0.2,
    margin: "50px",
    once: true
};

// Shared layout configuration
export const layoutConfig = {
    layout: true,
    layoutScroll: true
};

// Sequential animation sequences
export const sequences = {
    enter: async (scope, animate) => {
        await animate(scope.current, { opacity: 1 }, { duration: 0.2 });
        await animate("tr", 
            { opacity: 1, y: 0 },
            { 
                duration: 0.3,
                delay: stagger(0.05),
                type: "spring",
                ...springConfig.snappy
            }
        );
    },
    exit: async (scope, animate) => {
        await animate("tr", 
            { opacity: 0, y: 20 },
            { 
                duration: 0.2,
                delay: stagger(0.05, { from: "last" })
            }
        );
        await animate(scope.current, { opacity: 0 }, { duration: 0.2 });
    },
    sort: async (scope, animate) => {
        await animate("tr", 
            { x: [-20, 0], opacity: [0, 1] },
            { 
                duration: 0.3,
                delay: stagger(0.05),
                ...springConfig.snappy
            }
        );
    },
    filter: async (scope, animate) => {
        await animate("tr", 
            { scale: [0.95, 1], opacity: [0, 1] },
            { 
                duration: 0.2,
                delay: stagger(0.05),
                ...springConfig.snappy
            }
        );
    }
};

// Row animations with transform support
export const getRowAnimation = (index, type = 'default', scrollProgress) => {
    const baseDelay = index * 0.05;
    const yOffset = scrollProgress ? transforms.rowOffset(scrollProgress, index) : 0;

    const baseConfig = {
        initial: { opacity: 0, y: 20 },
        whileInView: { 
            opacity: 1, 
            y: yOffset,
            transition: {
                ...springConfig.snappy,
                delay: baseDelay
            }
        },
        viewport: viewportConfig
    };

    switch (type) {
        case 'sort':
            return {
                ...baseConfig,
                initial: { opacity: 0, y: 20 },
                animate: { 
                    opacity: 1,
                    y: yOffset,
                    transition: {
                        ...springConfig.snappy,
                        delay: baseDelay
                    }
                },
                exit: { opacity: 0, y: -20 }
            };
        case 'filter':
            return {
                ...baseConfig,
                initial: { opacity: 0, x: -20 },
                animate: { 
                    opacity: 1,
                    x: 0,
                    y: yOffset,
                    transition: {
                        ...springConfig.snappy,
                        delay: baseDelay
                    }
                },
                exit: { opacity: 0, x: 20 }
            };
        case 'select':
            return {
                animate: { 
                    scale: [1, 1.02, 1],
                    y: yOffset,
                    transition: {
                        duration: 0.2
                    }
                }
            };
        default:
            return baseConfig;
    }
};

// Cell animations with color transforms
export const getCellAnimation = (type = 'default', scrollProgress) => {
    const baseConfig = {
        initial: { opacity: 0 },
        whileInView: { 
            opacity: 1,
            transition: { duration: 0.2 }
        },
        viewport: viewportConfig
    };

    switch (type) {
        case 'update':
            return {
                ...baseConfig,
                animate: { 
                    backgroundColor: scrollProgress ? 
                        transforms.backgroundFade(scrollProgress) :
                        ['transparent', 'var(--highlight-color)', 'transparent'],
                    transition: {
                        duration: 0.5,
                        times: [0, 0.1, 1]
                    }
                }
            };
        default:
            return baseConfig;
    }
};

// Container animations with scroll transforms
export const getContainerAnimation = (type = 'default', scrollProgress) => {
    const baseConfig = {
        initial: { opacity: 0 },
        whileInView: { 
            opacity: scrollProgress ? transforms.fadeOut(scrollProgress) : 1,
            scale: scrollProgress ? transforms.scaleDown(scrollProgress) : 1,
            transition: {
                staggerChildren: 0.05
            }
        },
        viewport: {
            ...viewportConfig,
            amount: 0.1
        }
    };

    switch (type) {
        case 'sort':
        case 'filter':
            return {
                ...baseConfig,
                initial: 'hidden',
                animate: 'visible',
                variants: {
                    hidden: { opacity: 0 },
                    visible: {
                        opacity: scrollProgress ? transforms.fadeOut(scrollProgress) : 1,
                        transition: {
                            staggerChildren: 0.05,
                            when: "beforeChildren"
                        }
                    }
                }
            };
        default:
            return baseConfig;
    }
};

// Interactive element animations
export const getCheckboxAnimation = (checked) => ({
    initial: { scale: 0.8 },
    animate: { 
        scale: 1,
        transition: springConfig.snappy
    },
    whileTap: { scale: 0.9 }
});

export const getHeaderAnimation = (sorted) => ({
    animate: { 
        opacity: 1,
        scale: sorted ? 1.02 : 1,
        transition: springConfig.layout
    },
    whileHover: { 
        scale: sorted ? 1.05 : 1.02
    }
});

export const getExpansionAnimation = () => ({
    initial: { height: 0, opacity: 0 },
    animate: { 
        height: 'auto',
        opacity: 1,
        transition: springConfig.layout
    },
    exit: { 
        height: 0,
        opacity: 0,
        transition: {
            height: { ...springConfig.layout },
            opacity: { duration: 0.2 }
        }
    }
});
