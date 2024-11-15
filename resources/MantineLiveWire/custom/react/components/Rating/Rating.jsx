import React from 'react';
import { Rating as MantineRating } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, stagger, presets } from '../../utils/animations';

// Motion-enhanced rating
const MotionRating = motion(MantineRating);

// Shared animation configurations
const getSymbolAnimations = (index, readOnly) => ({
    initial: { scale: 0, opacity: 0 },
    animate: { 
        scale: 1,
        opacity: 1,
    },
    transition: {
        ...springs.input,
        delay: index * presets.input.duration * 0.25,
    },
    ...(!readOnly && {
        whileHover: { scale: 1.2 },
        whileTap: { scale: 0.9 },
        transition: springs.input
    })
});

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

    // Animated symbol components with input preset
    const AnimatedEmptySymbol = emptySymbol && ((props) => (
        <motion.div
            {...getSymbolAnimations(props.index, readOnly)}
            animate={{ 
                ...getSymbolAnimations(props.index, readOnly).animate,
                opacity: 0.6,
            }}
        >
            {emptySymbol}
        </motion.div>
    ));

    const AnimatedFullSymbol = fullSymbol && ((props) => (
        <motion.div
            {...getSymbolAnimations(props.index, readOnly)}
            animate={{ 
                ...getSymbolAnimations(props.index, readOnly).animate,
                opacity: 1,
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
                    gap: '4px',
                },
                symbol: {
                    transition: 'none',
                    '&[data-filled]': {
                        transition: 'none',
                    },
                },
            })}
            // Motion animations with input preset
            {...stagger.container}
            initial={{ opacity: 0, y: 10 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{
                ...springs.input,
                staggerChildren: presets.input.duration * 0.25
            }}
        >
            <motion.div
                initial={false}
                animate={{
                    scale: value ? [1.1, 1] : 1,
                }}
                transition={springs.input}
            >
                {Array.from({ length: count }).map((_, index) => (
                    <motion.div
                        key={index}
                        {...stagger.item}
                        transition={{
                            ...springs.input,
                            delay: index * presets.input.duration * 0.25
                        }}
                        {...(!readOnly && {
                            whileHover: { scale: 1.2 },
                            whileTap: { scale: 0.9 },
                            transition: springs.input
                        })}
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
