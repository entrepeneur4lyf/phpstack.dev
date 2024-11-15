import React from 'react';
import { Flex as MantineFlex } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll } from '../../utils/animations';

// Motion-enhanced flex
const MotionFlex = motion(MantineFlex);

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

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: flexRef,
        offset: ["start end", "end start"]
    });

    // Base animation props
    const motionProps = animate ? {
        ...layout.default,
        initial: { opacity: 0 },
        animate: { opacity: 1 },
        exit: { opacity: 0 },
        transition: springs.default,
    } : {};

    // Add scroll animation props if enabled
    const scrollProps = scrollAnimation ? {
        style: scroll.scaleAndFade(scrollYProgress),
    } : {};

    // Direction-aware animations
    const getDirectionalAnimation = (index) => {
        const baseDelay = index * 0.05;
        switch (direction) {
            case 'row':
                return {
                    hidden: { opacity: 0, x: 20 },
                    visible: { 
                        opacity: 1,
                        x: 0,
                        transition: {
                            ...springs.default,
                            delay: baseDelay,
                        },
                    },
                    exit: { opacity: 0, x: -20 },
                };
            case 'row-reverse':
                return {
                    hidden: { opacity: 0, x: -20 },
                    visible: { 
                        opacity: 1,
                        x: 0,
                        transition: {
                            ...springs.default,
                            delay: baseDelay,
                        },
                    },
                    exit: { opacity: 0, x: 20 },
                };
            case 'column':
                return {
                    hidden: { opacity: 0, y: 20 },
                    visible: { 
                        opacity: 1,
                        y: 0,
                        transition: {
                            ...springs.default,
                            delay: baseDelay,
                        },
                    },
                    exit: { opacity: 0, y: -20 },
                };
            case 'column-reverse':
                return {
                    hidden: { opacity: 0, y: -20 },
                    visible: { 
                        opacity: 1,
                        y: 0,
                        transition: {
                            ...springs.default,
                            delay: baseDelay,
                        },
                    },
                    exit: { opacity: 0, y: 20 },
                };
            default:
                return {
                    hidden: { opacity: 0, scale: 0.9 },
                    visible: { 
                        opacity: 1,
                        scale: 1,
                        transition: {
                            ...springs.default,
                            delay: baseDelay,
                        },
                    },
                    exit: { opacity: 0, scale: 0.9 },
                };
        }
    };

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
                            layout
                            variants={getDirectionalAnimation(index)}
                            initial="hidden"
                            animate="visible"
                            exit="exit"
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
            layout
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={{ opacity: 0, scale: 0.9 }}
            transition={springs.default}
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
