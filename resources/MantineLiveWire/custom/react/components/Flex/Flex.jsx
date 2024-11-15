import React from 'react';
import { Flex as MantineFlex } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll, presets } from '../../utils/animations';

// Motion-enhanced flex
const MotionFlex = motion(MantineFlex);

// Shared animation configurations
const flexItemAnimation = {
    layout: true,
    initial: { opacity: 0, scale: 0.9 },
    animate: { opacity: 1, scale: 1 },
    exit: { opacity: 0, scale: 0.9 },
    transition: {
        ...springs.expand,
        opacity: {
            duration: presets.expand.duration,
            ease: presets.expand.ease
        }
    }
};

// Direction-aware animations with consistent timing
const getDirectionalAnimation = (direction, index) => {
    const baseDelay = index * presets.expand.duration * 0.25;
    const transition = {
        ...springs.expand,
        delay: baseDelay,
        opacity: {
            duration: presets.expand.duration,
            ease: presets.expand.ease
        }
    };

    switch (direction) {
        case 'row':
            return {
                hidden: { opacity: 0, x: 20, scale: 0.9 },
                visible: { opacity: 1, x: 0, scale: 1 },
                exit: { opacity: 0, x: -20, scale: 0.9 },
                transition
            };
        case 'row-reverse':
            return {
                hidden: { opacity: 0, x: -20, scale: 0.9 },
                visible: { opacity: 1, x: 0, scale: 1 },
                exit: { opacity: 0, x: 20, scale: 0.9 },
                transition
            };
        case 'column':
            return {
                hidden: { opacity: 0, y: 20, scale: 0.9 },
                visible: { opacity: 1, y: 0, scale: 1 },
                exit: { opacity: 0, y: -20, scale: 0.9 },
                transition
            };
        case 'column-reverse':
            return {
                hidden: { opacity: 0, y: -20, scale: 0.9 },
                visible: { opacity: 1, y: 0, scale: 1 },
                exit: { opacity: 0, y: 20, scale: 0.9 },
                transition
            };
        default:
            return flexItemAnimation;
    }
};

function Flex({ wire, mingleData, children }) {
    const {
        gap,
        justify,
        align,
        wrap,
        direction,
        // Additional animation props
        animate = true,
        scrollAnimation = false,
    } = mingleData;

    const flexRef = React.useRef(null);

    // Scroll-linked animations with consistent timing
    const { scrollYProgress } = useScroll({
        target: flexRef,
        offset: ["start end", "end start"]
    });

    // Base animation props with expand preset
    const motionProps = animate ? {
        ...layout.default,
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: {
            ...springs.expand,
            opacity: {
                duration: presets.expand.duration,
                ease: presets.expand.ease
            }
        }
    } : {};

    // Add scroll animation props if enabled
    const scrollProps = scrollAnimation ? {
        style: {
            ...scroll.scaleAndFade(scrollYProgress),
            transition: `all ${presets.expand.duration}s ${presets.expand.ease}`
        }
    } : {};

    return (
        <MotionFlex
            ref={flexRef}
            gap={gap}
            justify={justify}
            align={align}
            wrap={wrap}
            direction={direction}
            {...motionProps}
            {...scrollProps}
        >
            <AnimatePresence mode="wait">
                <motion.div
                    {...stagger.container}
                    style={{
                        display: 'flex',
                        flexDirection: direction,
                        flexWrap: wrap ? 'wrap' : 'nowrap',
                        gap: typeof gap === 'number' ? gap : 0,
                        width: '100%',
                        alignItems: align,
                        justifyContent: justify,
                    }}
                >
                    {React.Children.map(children, (child, index) => (
                        <motion.div
                            key={index}
                            {...getDirectionalAnimation(direction, index)}
                            style={{
                                display: 'flex',
                                alignItems: 'center',
                            }}
                        >
                            {child}
                        </motion.div>
                    ))}
                </motion.div>
            </AnimatePresence>
        </MotionFlex>
    );
}

// Add a new component for animated flex items
Flex.Item = function FlexItem({ children, ...props }) {
    return (
        <motion.div
            {...flexItemAnimation}
            style={{
                display: 'flex',
                alignItems: 'center',
            }}
            {...props}
        >
            {children}
        </motion.div>
    );
};

export default Flex;
