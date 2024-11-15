import React from 'react';
import { Slider as MantineSlider, RangeSlider as MantineRangeSlider } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive } from '../../utils/animations';

// Motion-enhanced components
const MotionSlider = motion(MantineSlider);
const MotionRangeSlider = motion(MantineRangeSlider);

function Slider({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        color,
        size,
        radius,
        marks,
        label,
        labelAlwaysOn,
        labelTransitionProps,
        min,
        max,
        step,
        minRange,
        thumbSize,
        thumbChildren,
        scale,
        inverted,
        disabled,
        thumbLabel,
        onChangeEnd,
    } = mingleData;

    // Enhanced marks with animations
    const enhancedMarks = marks?.map((mark, index) => ({
        ...mark,
        component: motion.div,
        componentProps: {
            initial: { opacity: 0, scale: 0.8 },
            animate: { opacity: 1, scale: 1 },
            transition: {
                ...springs.snappy,
                delay: index * 0.05, // Stagger effect
            },
            whileHover: !disabled && { scale: 1.2 },
        },
    }));

    // Custom label component with animations
    const AnimatedLabel = ({ value }) => (
        <AnimatePresence mode="wait">
            <motion.div
                key={value}
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: 10 }}
                transition={springs.snappy}
            >
                {typeof label === 'function' ? label(value) : value}
            </motion.div>
        </AnimatePresence>
    );

    return (
        <MotionSlider
            value={value}
            defaultValue={defaultValue}
            color={color}
            size={size}
            radius={radius}
            marks={enhancedMarks}
            label={AnimatedLabel}
            labelAlwaysOn={labelAlwaysOn}
            labelTransitionProps={{ duration: 0 }} // Disable Mantine's transitions
            min={min}
            max={max}
            step={step}
            minRange={minRange}
            thumbSize={thumbSize}
            thumbChildren={
                thumbChildren && (
                    <motion.div
                        initial={{ scale: 0 }}
                        animate={{ scale: 1 }}
                        transition={springs.snappy}
                    >
                        {thumbChildren}
                    </motion.div>
                )
            }
            scale={scale}
            inverted={inverted}
            disabled={disabled}
            thumbLabel={thumbLabel}
            onChangeEnd={(value) => {
                wire.emit('changeEnd', value);
                if (onChangeEnd) onChangeEnd(value);
            }}
            onChange={(value) => wire.emit('change', value)}
            styles={(theme) => ({
                thumb: {
                    transition: 'none', // Remove Mantine's transitions
                    transform: disabled ? 'none' : 'scale(1.1)',
                    '&:hover': {
                        transform: disabled ? 'none' : 'scale(1.2)',
                    },
                },
                track: {
                    transition: 'none', // Remove Mantine's transitions
                },
                bar: {
                    transition: 'none', // Remove Mantine's transitions
                },
            })}
            // Motion animations
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.2 }}
            {...(!disabled && {
                whileHover: { scale: 1.02 },
                whileTap: { scale: 0.98 },
            })}
        />
    );
}

Slider.Range = function SliderRange({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        color,
        size,
        radius,
        marks,
        label,
        labelAlwaysOn,
        labelTransitionProps,
        min,
        max,
        step,
        minRange,
        thumbSize,
        thumbChildren,
        scale,
        inverted,
        disabled,
        thumbFromLabel,
        thumbToLabel,
        onChangeEnd,
    } = mingleData;

    // Enhanced marks with animations
    const enhancedMarks = marks?.map((mark, index) => ({
        ...mark,
        component: motion.div,
        componentProps: {
            initial: { opacity: 0, scale: 0.8 },
            animate: { opacity: 1, scale: 1 },
            transition: {
                ...springs.snappy,
                delay: index * 0.05,
            },
            whileHover: !disabled && { scale: 1.2 },
        },
    }));

    // Custom label component with animations
    const AnimatedLabel = ({ value }) => (
        <AnimatePresence mode="wait">
            <motion.div
                key={Array.isArray(value) ? value.join('-') : value}
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: 10 }}
                transition={springs.snappy}
            >
                {typeof label === 'function' ? label(value) : value}
            </motion.div>
        </AnimatePresence>
    );

    return (
        <MotionRangeSlider
            value={value}
            defaultValue={defaultValue}
            color={color}
            size={size}
            radius={radius}
            marks={enhancedMarks}
            label={AnimatedLabel}
            labelAlwaysOn={labelAlwaysOn}
            labelTransitionProps={{ duration: 0 }}
            min={min}
            max={max}
            step={step}
            minRange={minRange}
            thumbSize={thumbSize}
            thumbChildren={
                thumbChildren && (
                    <motion.div
                        initial={{ scale: 0 }}
                        animate={{ scale: 1 }}
                        transition={springs.snappy}
                    >
                        {thumbChildren}
                    </motion.div>
                )
            }
            scale={scale}
            inverted={inverted}
            disabled={disabled}
            thumbFromLabel={thumbFromLabel}
            thumbToLabel={thumbToLabel}
            onChangeEnd={(value) => {
                wire.emit('changeEnd', value);
                if (onChangeEnd) onChangeEnd(value);
            }}
            onChange={(value) => wire.emit('change', value)}
            styles={(theme) => ({
                thumb: {
                    transition: 'none',
                    transform: disabled ? 'none' : 'scale(1.1)',
                    '&:hover': {
                        transform: disabled ? 'none' : 'scale(1.2)',
                    },
                },
                track: {
                    transition: 'none',
                },
                bar: {
                    transition: 'none',
                },
            })}
            // Motion animations
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.2 }}
            {...(!disabled && {
                whileHover: { scale: 1.02 },
                whileTap: { scale: 0.98 },
            })}
        />
    );
};

export default Slider;
