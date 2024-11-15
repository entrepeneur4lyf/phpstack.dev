import React from 'react';
import { Loader as MantineLoader } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionLoader = motion(MantineLoader);
const MotionOverlay = motion.div;

// Continuous animation variants
const spinAnimation = {
    animate: {
        rotate: 360,
        transition: {
            duration: presets.feedback.duration * 2,
            ease: "linear",
            repeat: Infinity,
        },
    },
};

const pulseAnimation = {
    animate: {
        scale: [1, 1.1, 1],
        opacity: [1, 0.8, 1],
        transition: {
            duration: presets.feedback.duration * 2,
            ease: "linear",
            repeat: Infinity,
        },
    },
};

const dotsAnimation = {
    animate: {
        scale: [1, 0.8, 1],
        transition: {
            duration: presets.feedback.duration,
            ease: "easeInOut",
            repeat: Infinity,
            repeatType: "reverse",
        },
    },
};

function Loader({ wire, mingleData, children }) {
    const {
        type = 'oval',
        color,
        size,
        loaders,
        classNames,
        styles,
        // Additional props
        withOverlay = false,
        overlayBlur = 2,
        variant = 'spin', // spin, pulse, dots
    } = mingleData;

    // Select animation based on variant
    const getAnimation = () => {
        switch (variant) {
            case 'pulse':
                return pulseAnimation;
            case 'dots':
                return dotsAnimation;
            case 'spin':
            default:
                return spinAnimation;
        }
    };

    const loader = (
        <MotionLoader
            type={type}
            color={color}
            size={size}
            loaders={loaders}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                },
            }}
            initial={{ opacity: 0, scale: 0.8 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={{ opacity: 0, scale: 0.8 }}
            transition={springs.feedback}
            {...getAnimation()}
        >
            {children}
        </MotionLoader>
    );

    if (withOverlay) {
        return (
            <AnimatePresence>
                <MotionOverlay
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{
                        duration: presets.feedback.duration,
                        ease: presets.feedback.ease,
                    }}
                    style={{
                        position: 'fixed',
                        top: 0,
                        left: 0,
                        right: 0,
                        bottom: 0,
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        background: 'rgba(0, 0, 0, 0.5)',
                        backdropFilter: `blur(${overlayBlur}px)`,
                        zIndex: 9999,
                    }}
                >
                    {loader}
                </MotionOverlay>
            </AnimatePresence>
        );
    }

    return loader;
}

// Add variants for common use cases
Loader.Dots = function LoaderDots(props) {
    return (
        <Loader
            {...props}
            mingleData={{
                ...props.mingleData,
                type: 'dots',
                variant: 'dots',
            }}
        />
    );
};

Loader.Pulse = function LoaderPulse(props) {
    return (
        <Loader
            {...props}
            mingleData={{
                ...props.mingleData,
                type: 'oval',
                variant: 'pulse',
            }}
        />
    );
};

Loader.Overlay = function LoaderOverlay(props) {
    return (
        <Loader
            {...props}
            mingleData={{
                ...props.mingleData,
                withOverlay: true,
                size: props.mingleData?.size || 'xl',
            }}
        />
    );
};

export default Loader;
