import React from 'react';
import { Group as MantineGroup } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll } from '../../utils/animations';

// Motion-enhanced group
const MotionGroup = motion(MantineGroup);

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

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: groupRef,
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
                            layout
                            variants={{
                                hidden: { 
                                    opacity: 0,
                                    x: 20,
                                    scale: 0.9,
                                },
                                visible: { 
                                    opacity: 1,
                                    x: 0,
                                    scale: 1,
                                    transition: {
                                        ...springs.default,
                                        delay: index * 0.05, // Faster stagger for horizontal layout
                                    },
                                },
                                exit: { 
                                    opacity: 0,
                                    x: -20,
                                    scale: 0.9,
                                },
                            }}
                            initial="hidden"
                            animate="visible"
                            exit="exit"
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
            layout
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: -20 }}
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

export default Group;
