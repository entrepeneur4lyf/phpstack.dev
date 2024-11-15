import React from 'react';
import { Group as MantineGroup } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll, presets } from '../../utils/animations';

// Motion-enhanced group
const MotionGroup = motion(MantineGroup);

// Shared animation configurations
const groupItemAnimation = {
    layout: true,
    initial: { opacity: 0, x: 20, scale: 0.9 },
    animate: { opacity: 1, x: 0, scale: 1 },
    exit: { opacity: 0, x: -20, scale: 0.9 },
    transition: {
        ...springs.expand,
        opacity: {
            duration: presets.expand.duration,
            ease: presets.expand.ease
        }
    }
};

function Group({ wire, mingleData, children }) {
    const {
        gap,
        justify,
        align,
        wrap,
        grow,
        preventGrowOverflow,
        // Additional animation props
        animate = true,
        scrollAnimation = false,
    } = mingleData;

    const groupRef = React.useRef(null);

    // Scroll-linked animations with consistent timing
    const { scrollYProgress } = useScroll({
        target: groupRef,
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
        <MotionGroup
            ref={groupRef}
            gap={gap}
            justify={justify}
            align={align}
            wrap={wrap}
            grow={grow}
            preventGrowOverflow={preventGrowOverflow}
            {...motionProps}
            {...scrollProps}
        >
            <AnimatePresence mode="wait">
                <motion.div
                    {...stagger.container}
                    style={{
                        display: 'flex',
                        flexDirection: 'row',
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
                            {...groupItemAnimation}
                            transition={{
                                ...springs.expand,
                                delay: index * presets.expand.duration * 0.25,
                                opacity: {
                                    duration: presets.expand.duration,
                                    ease: presets.expand.ease
                                }
                            }}
                            style={{
                                flex: grow ? '1 1 0%' : 'initial',
                                maxWidth: preventGrowOverflow && grow ? '100%' : 'none',
                                display: 'flex',
                                alignItems: 'center',
                            }}
                        >
                            {child}
                        </motion.div>
                    ))}
                </motion.div>
            </AnimatePresence>
        </MotionGroup>
    );
}

// Add a new component for animated group items
Group.Item = function GroupItem({ children, ...props }) {
    return (
        <motion.div
            {...groupItemAnimation}
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

export default Group;
