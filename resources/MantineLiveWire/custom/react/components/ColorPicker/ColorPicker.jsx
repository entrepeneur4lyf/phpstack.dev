import React from 'react';
import { ColorPicker as MantineColorPicker } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout } from '../../utils/animations';

// Motion-enhanced picker
const MotionPicker = motion(MantineColorPicker);

function ColorPicker({ wire, mingleData }) {
    const {
        format,
        swatches,
        swatchesPerRow,
        size,
        value,
        defaultValue,
        withPicker,
        fullWidth,
        onlyPicker,
        saturationLabel,
        hueLabel,
        alphaLabel,
    } = mingleData;

    // Custom styles for animation support
    const customStyles = {
        swatch: {
            transition: 'none', // Remove Mantine's transitions
            '&[data-selected]': {
                transform: 'none', // Remove Mantine's transform
            },
        },
        swatches: {
            gap: '8px', // Ensure consistent spacing for animations
        },
        preview: {
            transition: 'none', // Remove Mantine's transitions
        },
        slider: {
            transition: 'none', // Remove Mantine's transitions
        },
        sliderOverlay: {
            transition: 'none', // Remove Mantine's transitions
        },
    };

    // Wrap swatches with motion for animations
    const enhancedSwatches = swatches?.map((swatch, index) => ({
        color: swatch,
        component: motion.div,
        componentProps: {
            layout: true,
            initial: { opacity: 0, scale: 0.8 },
            animate: { opacity: 1, scale: 1 },
            exit: { opacity: 0, scale: 0.8 },
            transition: {
                ...springs.snappy,
                delay: index * 0.05, // Stagger effect
            },
            whileHover: { scale: 1.1 },
            whileTap: { scale: 0.95 },
        },
    }));

    return (
        <AnimatePresence mode="wait">
            <MotionPicker
                format={format}
                swatches={enhancedSwatches}
                swatchesPerRow={swatchesPerRow}
                size={size}
                value={value}
                defaultValue={defaultValue}
                withPicker={withPicker}
                fullWidth={fullWidth}
                onlyPicker={onlyPicker}
                saturationLabel={saturationLabel}
                hueLabel={hueLabel}
                alphaLabel={alphaLabel}
                onChange={(value) => wire.emit('change', value)}
                onChangeEnd={(value) => wire.emit('changeEnd', value)}
                styles={(theme) => ({
                    ...customStyles,
                    // Animate the color preview
                    preview: {
                        ...customStyles.preview,
                        '&::before': {
                            content: '""',
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: value,
                            transition: 'background 0.2s ease',
                        },
                    },
                })}
                // Motion animations for the entire picker
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -10 }}
                transition={springs.default}
            >
                {withPicker && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        transition={{ duration: 0.2 }}
                    >
                        {/* Picker content */}
                        <motion.div
                            className="saturation-slider"
                            whileHover={{ scale: 1.02 }}
                            transition={springs.snappy}
                        />
                        <motion.div
                            className="hue-slider"
                            whileHover={{ scale: 1.02 }}
                            transition={springs.snappy}
                        />
                        {format === 'rgba' && (
                            <motion.div
                                className="alpha-slider"
                                whileHover={{ scale: 1.02 }}
                                transition={springs.snappy}
                            />
                        )}
                    </motion.div>
                )}
            </MotionPicker>
        </AnimatePresence>
    );
}

export default ColorPicker;
