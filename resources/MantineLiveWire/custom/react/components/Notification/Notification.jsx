import React from 'react';
import { Notification as MantineNotification } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout } from '../../utils/animations';

// Motion-enhanced notification
const MotionNotification = motion(MantineNotification);

function Notification({ wire, mingleData, children }) {
    const {
        title,
        loading,
        withCloseButton,
        withBorder,
        icon,
        color,
        radius,
        onClose,
        closeButtonProps,
        classNames,
        styles,
        // Additional animation props
        position = 'right',
    } = mingleData;

    // Get position-based animations
    const getPositionAnimation = () => {
        const distance = 50;
        switch (position) {
            case 'left':
                return {
                    initial: { opacity: 0, x: -distance },
                    animate: { opacity: 1, x: 0 },
                    exit: { opacity: 0, x: -distance },
                };
            case 'right':
                return {
                    initial: { opacity: 0, x: distance },
                    animate: { opacity: 1, x: 0 },
                    exit: { opacity: 0, x: distance },
                };
            case 'top':
                return {
                    initial: { opacity: 0, y: -distance },
                    animate: { opacity: 1, y: 0 },
                    exit: { opacity: 0, y: -distance },
                };
            case 'bottom':
                return {
                    initial: { opacity: 0, y: distance },
                    animate: { opacity: 1, y: 0 },
                    exit: { opacity: 0, y: distance },
                };
            default:
                return {
                    initial: { opacity: 0, scale: 0.9 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.9 },
                };
        }
    };

    // Loading animation
    const loadingAnimation = loading ? {
        animate: {
            opacity: [1, 0.7, 1],
            transition: {
                repeat: Infinity,
                duration: 1.5,
                ease: "easeInOut",
            },
        },
    } : {};

    return (
        <AnimatePresence mode="wait">
            <MotionNotification
                title={title}
                loading={loading}
                withCloseButton={withCloseButton}
                withBorder={withBorder}
                icon={
                    icon && (
                        <motion.div
                            initial={{ rotate: -45, scale: 0.5, opacity: 0 }}
                            animate={{ 
                                rotate: 0,
                                scale: 1,
                                opacity: 1,
                                ...loadingAnimation.animate,
                            }}
                            transition={springs.snappy}
                        >
                            {icon}
                        </motion.div>
                    )
                }
                color={color}
                radius={radius}
                onClose={onClose ? () => wire.emit('close') : undefined}
                closeButtonProps={closeButtonProps}
                classNames={classNames}
                styles={styles}
                // Motion animations
                {...getPositionAnimation()}
                transition={{
                    ...springs.default,
                    opacity: { duration: 0.2 },
                }}
                {...loadingAnimation}
                layout
            >
                {withCloseButton && (
                    <motion.div
                        style={{ position: 'absolute', top: 8, right: 8 }}
                        {...interactive.button}
                    >
                        <MantineNotification.CloseButton
                            {...closeButtonProps}
                            onClick={onClose ? () => wire.emit('close') : undefined}
                        />
                    </motion.div>
                )}
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {title && (
                        <motion.div
                            layout
                            initial={{ opacity: 0, x: -20 }}
                            animate={{ opacity: 1, x: 0 }}
                            transition={{ 
                                ...springs.default,
                                delay: 0.1,
                            }}
                        >
                            <MantineNotification.Title>{title}</MantineNotification.Title>
                        </motion.div>
                    )}
                    <motion.div
                        layout
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        transition={{ 
                            duration: 0.2,
                            delay: 0.15,
                        }}
                    >
                        {children}
                    </motion.div>
                </motion.div>
            </MotionNotification>
        </AnimatePresence>
    );
}

export default Notification;
