import React from 'react';
import { Notification as MantineNotification } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout, presets, overlayAnimations } from '../../utils/animations';

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

    // Loading animation
    const loadingAnimation = loading ? {
        animate: {
            opacity: [1, 0.7, 1],
            transition: {
                repeat: Infinity,
                duration: presets.notification.duration * 7.5,
                ease: presets.notification.ease,
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
                            transition={springs.notification}
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
                // Motion animations using notification preset
                {...overlayAnimations.getPositionAnimation(position, 'notification')}
                {...loadingAnimation}
                layout
            >
                {withCloseButton && (
                    <motion.div
                        style={{ position: 'absolute', top: 8, right: 8 }}
                        {...interactive.button}
                        transition={springs.input}
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
                    transition={{ 
                        duration: presets.notification.duration,
                        ease: presets.notification.ease
                    }}
                >
                    {title && (
                        <motion.div
                            layout
                            initial={{ opacity: 0, x: -20 }}
                            animate={{ opacity: 1, x: 0 }}
                            transition={{ 
                                ...springs.notification,
                                delay: presets.notification.duration * 0.5,
                                opacity: {
                                    duration: presets.notification.duration,
                                    ease: presets.notification.ease
                                }
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
                            duration: presets.notification.duration,
                            delay: presets.notification.duration * 0.75,
                            ease: presets.notification.ease
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
