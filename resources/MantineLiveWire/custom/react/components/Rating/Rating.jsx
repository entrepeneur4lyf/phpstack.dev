import React from 'react';
import { Rating as MantineRating } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, stagger } from '../../utils/animations';

// Motion-enhanced rating
const MotionRating = motion(MantineRating);

function Rating({ wire, mingleData }) {
    const {
        color,
        size,
        count,
        highlightSelectedOnly,
        value,
        defaultValue,
        readOnly,
        fractions,
        emptySymbol,
        fullSymbol,
    } = mingleData;

    // Animated symbol components
    const AnimatedEmptySymbol = emptySymbol && ((props) => (
        <motion.div
            initial={{ scale: 0, opacity: 0 }}
            animate={{ 
                scale: 1,
                opacity: 0.6,
                rotate: [0, 10, 0],
            }}
            transition={{
                ...springs.snappy,
                delay: props.index * 0.05, // Stagger effect
            }}
            whileHover={!readOnly && { 
                scale: 1.2,
                opacity: 0.8,
            }}
        >
            {emptySymbol}
        </motion.div>
    ));

    const AnimatedFullSymbol = fullSymbol && ((props) => (
        <motion.div
            initial={{ scale: 0, opacity: 0 }}
            animate={{ 
                scale: 1,
                opacity: 1,
                rotate: [0, -10, 0],
            }}
            transition={{
                ...springs.snappy,
                delay: props.index * 0.05, // Stagger effect
            }}
            whileHover={!readOnly && { 
                scale: 1.2,
                rotate: [0, 10, 0],
            }}
        >
            {fullSymbol}
        </motion.div>
    ));

    return (
        <MotionRating
            color={color}
            size={size}
            count={count}
            highlightSelectedOnly={highlightSelectedOnly}
            value={value}
            defaultValue={defaultValue}
            readOnly={readOnly}
            fractions={fractions}
            emptySymbol={AnimatedEmptySymbol}
            fullSymbol={AnimatedFullSymbol}
            onChange={(value) => wire.emit('change', value)}
            styles={(theme) => ({
                symbolGroup: {
                    gap: '4px', // Consistent spacing for animations
                },
                symbol: {
                    transition: 'none', // Remove Mantine's transitions
                    '&[data-filled]': {
                        transition: 'none',
                    },
                },
            })}
            // Motion animations for the entire rating
            initial="hidden"
            animate="visible"
            variants={{
                hidden: { opacity: 0, y: 20 },
                visible: {
                    opacity: 1,
                    y: 0,
                    transition: {
                        ...springs.default,
                        staggerChildren: 0.05,
                    },
                },
            }}
        >
            <motion.div
                initial={false}
                animate={{
                    scale: value ? [1.1, 1] : 1,
                }}
                transition={springs.bouncy}
            >
                {/* Rating content */}
                {Array.from({ length: count }).map((_, index) => (
                    <motion.div
                        key={index}
                        variants={{
                            hidden: { opacity: 0, scale: 0, y: 20 },
                            visible: { 
                                opacity: 1,
                                scale: 1,
                                y: 0,
                                transition: {
                                    ...springs.snappy,
                                    delay: index * 0.05,
                                },
                            },
                        }}
                        whileHover={!readOnly && {
                            scale: 1.2,
                            transition: springs.snappy,
                        }}
                        whileTap={!readOnly && {
                            scale: 0.9,
                        }}
                        style={{
                            display: 'inline-flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                        }}
                    />
                ))}
            </motion.div>
        </MotionRating>
    );
}

export default Rating;
