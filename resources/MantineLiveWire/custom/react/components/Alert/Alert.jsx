import React from 'react';
import { Alert as MantineAlert } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout, presets } from '../../utils/animations';

// Motion-enhanced alert
const MotionAlert = motion(MantineAlert);

function Alert({ wire, mingleData, children }) {
    const {
        title,
        icon,
        variant,
        color,
        radius,
        withCloseButton,
        closeButtonLabel,
        onClose,
        classNames,
        styles,
        // Additional animation props
        animate = true,
        pulse = false,
    } = mingleData;

    // Pulse animation for important alerts
    const pulseAnimation = pulse ? {
        animate: {
            scale: [1, 1.02, 1],
            transition: {
                repeat: Infinity,
                repeatType: "reverse",
                duration: presets.feedback.duration * 10, // Slower pulse
                ease: presets.feedback.ease,
            },
        },
    } : {};

    return (
        <AnimatePresence mode="wait">
            <MotionAlert
                title={title}
                icon={
                    icon && (
                        <motion.div
                            initial={{ rotate: -45, scale: 0.5, opacity: 0 }}
                            animate={{ rotate: 0, scale: 1, opacity: 1 }}
                            transition={springs.feedback}
                        >
                            {icon}
                        </motion.div>
                    )
                }
                variant={variant}
                color={color}
                radius={radius}
                withCloseButton={withCloseButton}
                closeButtonLabel={closeButtonLabel}
                onClose={onClose ? () => wire.emit('close') : undefined}
                classNames={classNames}
                styles={styles}
                // Motion animations
                initial={{ 
                    opacity: 0,
                    y: -20,
                    scale: 0.95,
                }}
                animate={{ 
                    opacity: 1,
                    y: 0,
                    scale: 1,
                }}
                exit={{ 
                    opacity: 0,
                    y: 20,
                    scale: 0.95,
                }}
                transition={{
                    ...springs.feedback,
                    opacity: {
                        duration: presets.feedback.duration,
                        ease: presets.feedback.ease
                    }
                }}
                {...pulseAnimation}
                layout
            >
                {withCloseButton && (
                    <motion.div
                        style={{ position: 'absolute', top: 8, right: 8 }}
                        {...interactive.button}
                        transition={springs.input} // Use input preset for button
                    >
                        <MantineAlert.CloseButton
                            onClick={onClose ? () => wire.emit('close') : undefined}
                        />
                    </motion.div>
                )}
                <motion.div
                    initial={{ opacity: 0, y: 10 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: -10 }}
                    transition={{ 
                        ...springs.feedback,
                        delay: presets.feedback.duration * 0.5,
                        opacity: {
                            duration: presets.feedback.duration,
                            ease: presets.feedback.ease
                        }
                    }}
                >
                    {title && (
                        <motion.div
                            layout
                            initial={{ opacity: 0, x: -20 }}
                            animate={{ opacity: 1, x: 0 }}
                            transition={{ 
                                ...springs.feedback,
                                delay: presets.feedback.duration * 0.75,
                                opacity: {
                                    duration: presets.feedback.duration,
                                    ease: presets.feedback.ease
                                }
                            }}
                        >
                            <MantineAlert.Title>{title}</MantineAlert.Title>
                        </motion.div>
                    )}
                    <motion.div
                        layout
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        transition={{ 
                            duration: presets.feedback.duration,
                            delay: presets.feedback.duration,
                            ease: presets.feedback.ease
                        }}
                    >
                        {children}
                    </motion.div>
                </motion.div>
            </MotionAlert>
        </AnimatePresence>
    );
}

export default Alert;
