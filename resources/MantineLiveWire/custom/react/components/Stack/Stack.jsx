import React from 'react';
import { Stack as MantineStack } from '@mantine/core';
import { motion, AnimatePresence, useScroll, useTransform } from 'motion/react';
import { springs, layout, stagger, scroll } from '../../utils/animations';

// Motion-enhanced stack
const MotionStack = motion(MantineStack);

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

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: stackRef,
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
                            layout
                            variants={{
                                hidden: { 
                                    opacity: 0,
                                    y: 20,
                                    scale: 0.9,
                                },
                                visible: { 
                                    opacity: 1,
                                    y: 0,
                                    scale: 1,
                                    transition: {
                                        ...springs.default,
                                        delay: index * 0.1, // Stagger effect
                                    },
                                },
                                exit: { 
                                    opacity: 0,
                                    y: -20,
                                    scale: 0.9,
                                },
                            }}
                            initial="hidden"
                            animate="visible"
                            exit="exit"
                            style={{
                                width: '100%', // Ensure full width
                                display: 'flex', // Maintain flex properties
                                alignItems: align, // Match parent alignment
                                justifyContent: justify, // Match parent justification
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
            layout
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={springs.default}
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
