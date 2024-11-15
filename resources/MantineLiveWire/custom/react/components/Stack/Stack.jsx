import React from 'react';
import { Stack as MantineStack } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll, presets } from '../../utils/animations';

// Motion-enhanced stack
const MotionStack = motion(MantineStack);

// Shared animation configurations
const stackItemAnimation = {
    layout: true,
    initial: { opacity: 0, y: 20, scale: 0.9 },
    animate: { opacity: 1, y: 0, scale: 1 },
    exit: { opacity: 0, y: -20, scale: 0.9 },
    transition: {
        ...springs.expand,
        opacity: {
            duration: presets.expand.duration,
            ease: presets.expand.ease
        }
    }
};

function Stack({ wire, mingleData, children }) {
    const {
        align,
        justify,
        gap,
        h,
        bg,
        // Additional animation props
        animate = true,
        scrollAnimation = false,
    } = mingleData;

    const stackRef = React.useRef(null);

    // Scroll-linked animations with consistent timing
    const { scrollYProgress } = useScroll({
        target: stackRef,
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
        <MotionStack
            ref={stackRef}
            align={align}
            justify={justify}
            gap={gap}
            h={h}
            bg={bg}
            {...motionProps}
            {...scrollProps}
        >
            <AnimatePresence mode="wait">
                <motion.div
                    {...stagger.container}
                    style={{
                        display: 'flex',
                        flexDirection: 'column',
                        gap: typeof gap === 'number' ? gap : 0,
                    }}
                >
                    {React.Children.map(children, (child, index) => (
                        <motion.div
                            key={index}
                            {...stackItemAnimation}
                            transition={{
                                ...springs.expand,
                                delay: index * presets.expand.duration * 0.25,
                                opacity: {
                                    duration: presets.expand.duration,
                                    ease: presets.expand.ease
                                }
                            }}
                            style={{
                                width: '100%',
                                display: 'flex',
                                alignItems: align,
                                justifyContent: justify,
                            }}
                        >
                            {child}
                        </motion.div>
                    ))}
                </motion.div>
            </AnimatePresence>
        </MotionStack>
    );
}

// Add a new component for animated stack items
Stack.Item = function StackItem({ children, ...props }) {
    return (
        <motion.div
            {...stackItemAnimation}
            style={{
                width: '100%',
                display: 'flex',
            }}
            {...props}
        >
            {children}
        </motion.div>
    );
};

export default Stack;
