import React from 'react';
import { LoadingOverlay as MantineLoadingOverlay } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, overlayAnimations } from '../../utils/animations';

// Motion-enhanced overlay
const MotionOverlay = motion(MantineLoadingOverlay);

function LoadingOverlay({ wire, mingleData, children }) {
    const {
        visible,
        loaderProps,
        overlayProps,
        zIndex,
        transitionProps,
        classNames,
        styles,
        // Additional animation props
        pulse = true,
    } = mingleData;

    // Pulse animation for loader
    const pulseAnimation = pulse ? {
        animate: {
            scale: [1, 1.1, 1],
            opacity: [0.7, 1, 0.7],
            transition: {
                repeat: Infinity,
                duration: 2,
                ease: "easeInOut",
            },
        },
    } : {};

    return (
        <AnimatePresence mode="wait">
            {visible && (
                <MotionOverlay
                    visible={visible}
                    loaderProps={{
                        ...loaderProps,
                        // Add Motion-enhanced loader
                        children: loaderProps?.children && (
                            <motion.div
                                initial={{ scale: 0.8, opacity: 0 }}
                                animate={{ 
                                    scale: 1,
                                    opacity: 1,
                                    ...pulseAnimation.animate,
                                }}
                                exit={{ scale: 0.8, opacity: 0 }}
                                transition={springs.default}
                            >
                                {loaderProps.children}
                            </motion.div>
                        ),
                    }}
                    overlayProps={{
                        ...overlayProps,
                        // Add blur transition
                        style: {
                            ...overlayProps?.style,
                            backdropFilter: 'blur(2px)',
                        },
                    }}
                    zIndex={zIndex}
                    transitionProps={{ duration: 0 }} // Disable Mantine's transitions
                    classNames={classNames}
                    styles={{
                        ...styles,
                        overlay: {
                            ...styles?.overlay,
                            transition: 'none',
                        },
                        loader: {
                            ...styles?.loader,
                            transition: 'none',
                        },
                    }}
                    // Motion animations
                    initial={{ 
                        opacity: 0,
                        backdropFilter: 'blur(0px)',
                    }}
                    animate={{ 
                        opacity: 1,
                        backdropFilter: 'blur(2px)',
                    }}
                    exit={{ 
                        opacity: 0,
                        backdropFilter: 'blur(0px)',
                    }}
                    transition={{
                        opacity: { duration: 0.2 },
                        backdropFilter: { duration: 0.3 },
                    }}
                >
                    <motion.div
                        initial={{ filter: 'blur(0px)' }}
                        animate={{ filter: 'blur(1px)' }}
                        exit={{ filter: 'blur(0px)' }}
                        transition={{ duration: 0.3 }}
                    >
                        {children}
                    </motion.div>
                </MotionOverlay>
            )}
        </AnimatePresence>
    );
}

export default LoadingOverlay;
