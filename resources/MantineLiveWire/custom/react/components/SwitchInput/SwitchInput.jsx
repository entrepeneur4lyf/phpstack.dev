import React from 'react';
import { Switch } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced switch
const MotionSwitch = motion(Switch);

// Shared animation configurations
const AnimatedLabel = ({ children }) => (
    <AnimatePresence mode="wait">
        <motion.div
            key={children}
            initial={{ opacity: 0, x: -10 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: 10 }}
            transition={{
                ...springs.input,
                duration: presets.input.duration,
                ease: presets.input.ease
            }}
        >
            {children}
        </motion.div>
    </AnimatePresence>
);

const AnimatedText = ({ children }) => (
    <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        transition={{ 
            duration: presets.input.duration,
            ease: presets.input.ease
        }}
    >
        {children}
    </motion.div>
);

function SwitchInput({ wire, mingleData }) {
    const {
        checked,
        defaultChecked,
        label,
        description,
        error,
        labelPosition,
        color,
        size,
        radius,
        disabled,
        onLabel,
        offLabel,
        thumbIcon,
        wrapperProps,
        value,
        'aria-label': ariaLabel,
    } = mingleData;

    // Custom thumb icon with input preset animations
    const AnimatedThumbIcon = thumbIcon && (
        <motion.div
            initial={{ scale: 0, rotate: -45 }}
            animate={{ 
                scale: 1,
                rotate: 0,
            }}
            transition={springs.input}
        >
            {thumbIcon}
        </motion.div>
    );

    return (
        <MotionSwitch
            checked={checked}
            defaultChecked={defaultChecked}
            label={label && <AnimatedLabel>{label}</AnimatedLabel>}
            description={description && <AnimatedLabel>{description}</AnimatedLabel>}
            error={error && <AnimatedLabel>{error}</AnimatedLabel>}
            labelPosition={labelPosition}
            color={color}
            size={size}
            radius={radius}
            disabled={disabled}
            onLabel={onLabel && <AnimatedText>{onLabel}</AnimatedText>}
            offLabel={offLabel && <AnimatedText>{offLabel}</AnimatedText>}
            thumbIcon={AnimatedThumbIcon}
            wrapperProps={{
                ...wrapperProps,
                style: {
                    ...wrapperProps?.style,
                    position: 'relative',
                    zIndex: 1,
                },
            }}
            value={value}
            aria-label={ariaLabel}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
            styles={(theme) => ({
                input: {
                    transition: 'none',
                },
                track: {
                    transition: 'none',
                },
                thumb: {
                    transition: 'none',
                },
            })}
            // Motion animations with input preset
            initial={false}
            animate={{
                '--switch-bg': checked ? 
                    theme => theme.colors[color || 'blue'][6] : 
                    theme => theme.colors.gray[2],
            }}
            transition={{ 
                duration: presets.input.duration,
                ease: presets.input.ease
            }}
            {...(!disabled && {
                ...interactive.button,
                transition: springs.input
            })}
        >
            <motion.div
                className="switch-thumb"
                initial={false}
                animate={{
                    x: checked ? '100%' : '0%',
                    scale: checked ? 1.1 : 1,
                }}
                transition={{
                    ...springs.input,
                    scale: {
                        duration: presets.input.duration,
                        ease: presets.input.ease
                    }
                }}
                {...(!disabled && {
                    whileHover: { scale: 1.15 },
                    whileTap: { scale: 0.95 },
                    transition: springs.input
                })}
            />
        </MotionSwitch>
    );
}

export default SwitchInput;
