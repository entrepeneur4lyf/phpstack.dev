import React from 'react';
import { Alert as MantineAlert } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout } from '../../utils/animations';

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
                duration: 2,
                ease: "easeInOut",
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
                            transition={springs.snappy}
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
                    transition: {
                        duration: 0.2,
                    },
                }}
                transition={springs.default}
                {...pulseAnimation}
                layout
            >
                {withCloseButton && (
                    <motion.div
                        style={{ position: 'absolute', top: 8, right: 8 }}
                        {...interactive.button}
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
                        ...springs.default,
                        delay: 0.1,
                    }}
                >
                    {title && (
                        <motion.div
                            layout
                            initial={{ opacity: 0, x: -20 }}
                            animate={{ opacity: 1, x: 0 }}
                            transition={{ 
                                ...springs.default,
                                delay: 0.15,
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
                            duration: 0.2,
                            delay: 0.2,
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
