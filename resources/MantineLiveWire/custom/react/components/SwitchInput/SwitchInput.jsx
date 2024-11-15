import React from 'react';
import { Switch } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive } from '../../utils/animations';

// Motion-enhanced switch
const MotionSwitch = motion(Switch);

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

    // Custom label component with animations
    const AnimatedLabel = ({ children }) => (
        <AnimatePresence mode="wait">
            <motion.div
                key={children}
                initial={{ opacity: 0, x: -10 }}
                animate={{ opacity: 1, x: 0 }}
                exit={{ opacity: 0, x: 10 }}
                transition={springs.snappy}
            >
                {children}
            </motion.div>
        </AnimatePresence>
    );

    // Custom thumb icon with animations
    const AnimatedThumbIcon = thumbIcon && (
        <motion.div
            initial={{ scale: 0, rotate: -45 }}
            animate={{ 
                scale: 1,
                rotate: 0,
            }}
            transition={springs.snappy}
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
            onLabel={onLabel && (
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {onLabel}
                </motion.div>
            )}
            offLabel={offLabel && (
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {offLabel}
                </motion.div>
            )}
            thumbIcon={AnimatedThumbIcon}
            wrapperProps={{
                ...wrapperProps,
                style: {
                    ...wrapperProps?.style,
                    // Ensure proper stacking for animations
                    position: 'relative',
                    zIndex: 1,
                },
            }}
            value={value}
            aria-label={ariaLabel}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
            styles={(theme) => ({
                input: {
                    transition: 'none', // Remove Mantine's transitions
                },
                track: {
                    transition: 'none', // Remove Mantine's transitions
                },
                thumb: {
                    transition: 'none', // Remove Mantine's transitions
                },
            })}
            // Motion animations
            initial={false} // Prevent initial animation
            animate={{
                // Smooth color transition through CSS
                '--switch-bg': checked ? theme => theme.colors[color || 'blue'][6] : theme => theme.colors.gray[2],
            }}
            transition={{ duration: 0.2 }}
            {...(!disabled && {
                whileHover: { scale: 1.02 },
                whileTap: { scale: 0.98 },
            })}
        >
            <motion.div
                className="switch-thumb"
                initial={false}
                animate={{
                    x: checked ? '100%' : '0%',
                    scale: checked ? 1.1 : 1,
                }}
                transition={springs.snappy}
                {...(!disabled && {
                    whileHover: { scale: 1.15 },
                    whileTap: { scale: 0.95 },
                })}
            />
        </MotionSwitch>
    );
}

export default SwitchInput;
