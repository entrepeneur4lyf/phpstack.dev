import React from 'react';
import { Grid as MantineGrid } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, stagger, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionGrid = motion(MantineGrid);
const MotionCol = motion(MantineGrid.Col);

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
            transition={springs.expand}
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
                {...gridItemAnimation}
                transition={{
                    ...springs.expand,
                    layout: {
                        duration: presets.expand.duration,
                        ease: presets.expand.ease
                    }
                }}
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
            </MotionCol>
        </AnimatePresence>
    );
};

// Add a new component for animated grid items
Grid.Item = function GridItem({ children, ...props }) {
    return (
        <motion.div
            {...gridItemAnimation}
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
