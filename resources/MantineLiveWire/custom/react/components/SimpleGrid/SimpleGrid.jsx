import React from 'react';
import { SimpleGrid as MantineSimpleGrid } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, stagger, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionSimpleGrid = motion(MantineSimpleGrid);

// Shared animation configurations
const gridItemAnimation = {
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

const contentAnimation = {
    layout: true,
    initial: { opacity: 0 },
    animate: { opacity: 1 },
    exit: { opacity: 0 },
    transition: {
        duration: presets.expand.duration,
        ease: presets.expand.ease
    }
};

function SimpleGrid({ wire, mingleData, children }) {
    const {
        cols,
        spacing,
        verticalSpacing,
        type,
    } = mingleData;

    return (
        <MotionSimpleGrid
            cols={cols}
            spacing={spacing}
            verticalSpacing={verticalSpacing}
            type={type}
            {...layout.default}
            transition={springs.expand}
        >
            <motion.div
                {...stagger.container}
                style={{
                    display: 'grid',
                    gap: typeof spacing === 'number' ? spacing : 0,
                }}
            >
                {React.Children.map(children, (child, index) => (
                    <motion.div
                        key={index}
                        {...stagger.item}
                        transition={{
                            ...springs.expand,
                            delay: index * presets.expand.duration * 0.25
                        }}
                        style={{ display: 'flex' }}
                    >
                        {child}
                    </motion.div>
                ))}
            </motion.div>
        </MotionSimpleGrid>
    );
}

// Add a component for animated grid items
SimpleGrid.Item = function SimpleGridItem({ children, ...props }) {
    return (
        <AnimatePresence mode="wait">
            <motion.div
                {...gridItemAnimation}
                style={{
                    height: '100%',
                    width: '100%',
                }}
                {...props}
            >
                <motion.div
                    {...contentAnimation}
                    style={{
                        height: '100%',
                        width: '100%',
                    }}
                >
                    {children}
                </motion.div>
            </motion.div>
        </AnimatePresence>
    );
};

export default SimpleGrid;
