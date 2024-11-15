import React from 'react';
import { Slider as MantineSlider, RangeSlider as MantineRangeSlider } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets, stagger } from '../../utils/animations';

// Motion-enhanced components
const MotionSlider = motion(MantineSlider);
const MotionRangeSlider = motion(MantineRangeSlider);

// Shared animation configurations
const getEnhancedMarks = (marks, disabled) => marks?.map((mark, index) => ({
    ...mark,
    component: motion.div,
    componentProps: {
        ...stagger.item,
        transition: {
            ...springs.input,
            delay: index * presets.input.duration * 0.25,
        },
        whileHover: !disabled && { scale: 1.2 },
    },
}));

const AnimatedLabel = ({ value, label }) => (
    <AnimatePresence mode="wait">
        <motion.div
            key={Array.isArray(value) ? value.join('-') : value}
            initial={{ opacity: 0, y: -10 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: 10 }}
            transition={springs.input}
        >
            {typeof label === 'function' ? label(value) : value}
        </motion.div>
    </AnimatePresence>
);

const sharedStyles = (disabled) => ({
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
});

const sharedMotionProps = (disabled) => ({
    initial: { opacity: 0 },
    animate: { opacity: 1 },
    transition: { 
        duration: presets.input.duration,
        ease: presets.input.ease
    },
    ...(!disabled && {
        whileHover: { scale: 1.02 },
        whileTap: { scale: 0.98 },
    }),
});

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

    return (
        <MotionSlider
            value={value}
            defaultValue={defaultValue}
            color={color}
            size={size}
            radius={radius}
            marks={getEnhancedMarks(marks, disabled)}
            label={(value) => <AnimatedLabel value={value} label={label} />}
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
                        transition={springs.input}
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
            styles={(theme) => sharedStyles(disabled)}
            {...sharedMotionProps(disabled)}
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

    return (
        <MotionRangeSlider
            value={value}
            defaultValue={defaultValue}
            color={color}
            size={size}
            radius={radius}
            marks={getEnhancedMarks(marks, disabled)}
            label={(value) => <AnimatedLabel value={value} label={label} />}
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
                        transition={springs.input}
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
            styles={(theme) => sharedStyles(disabled)}
            {...sharedMotionProps(disabled)}
        />
    );
};

export default Slider;
