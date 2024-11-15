import React from 'react';
import { Grid as MantineGrid } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, stagger } from '../../utils/animations';

// Motion-enhanced components
const MotionGrid = motion(MantineGrid);
const MotionCol = motion(MantineGrid.Col);

function Grid({ wire, mingleData, children }) {
    const {
        gutter,
        columns,
        grow,
        justify,
        align,
    } = mingleData;

    return (
        <MotionGrid
            gutter={gutter}
            columns={columns}
            grow={grow}
            justify={justify}
            align={align}
            {...layout.default}
        >
            <motion.div
                {...stagger.container}
                style={{
                    display: 'flex',
                    flexWrap: 'wrap',
                    margin: `calc(${typeof gutter === 'number' ? gutter : 0}px / -2)`,
                }}
            >
                {React.Children.map(children, (child, index) => (
                    <motion.div
                        key={index}
                        {...stagger.item}
                        style={{ display: 'flex' }}
                    >
                        {child}
                    </motion.div>
                ))}
            </motion.div>
        </MotionGrid>
    );
}

Grid.Col = function GridCol({ wire, mingleData, children }) {
    const {
        span,
        xs,
        sm,
        md,
        lg,
        xl,
        offset,
        order,
        grow,
    } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionCol
                span={span}
                xs={xs}
                sm={sm}
                md={md}
                lg={lg}
                xl={xl}
                offset={offset}
                order={order}
                grow={grow}
                layout // Enable layout animations
                initial={{ 
                    opacity: 0,
                    scale: 0.9,
                    y: 20,
                }}
                animate={{ 
                    opacity: 1,
                    scale: 1,
                    y: 0,
                }}
                exit={{ 
                    opacity: 0,
                    scale: 0.9,
                    y: -20,
                }}
                transition={{
                    ...springs.default,
                    layout: { // Specific transition for layout changes
                        type: "spring",
                        bounce: 0.2,
                        duration: 0.6,
                    },
                }}
            >
                <motion.div
                    layout
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                    style={{
                        height: '100%', // Ensure full height for animations
                        width: '100%', // Ensure full width for animations
                    }}
                >
                    {children}
                </motion.div>
            </MotionCol>
        </AnimatePresence>
    );
};

// Add a new component for animated grid items
Grid.Item = function GridItem({ children, ...props }) {
    return (
        <motion.div
            layout
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={{ opacity: 0, scale: 0.9 }}
            transition={springs.default}
            style={{
                height: '100%',
                width: '100%',
            }}
            {...props}
        >
            {children}
        </motion.div>
    );
};

export default Grid;
