import React from 'react';
import { Progress as MantineProgress } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionRoot = motion(MantineProgress.Root);
const MotionSection = motion(MantineProgress.Section);
const MotionLabel = motion(MantineProgress.Label);

function Progress({ wire, mingleData, children }) {
    const {
        value,
        color,
        radius,
        size,
        striped,
        animated,
        transitionDuration,
        'aria-label': ariaLabel,
        classNames,
        styles,
    } = mingleData;

    // Loading animation for striped variant with feedback timing
    const stripeAnimation = striped && animated ? {
        animate: {
            backgroundPosition: ['0% 0%', '100% 0%'],
            transition: {
                duration: presets.feedback.duration * 10, // Slower for continuous motion
                ease: "linear",
                repeat: Infinity,
            },
        },
    } : {};

    return (
        <MantineProgress
            value={value}
            color={color}
            radius={radius}
            size={size}
            striped={striped}
            animated={false} // We'll handle animations with Motion
            transitionDuration={0} // Disable Mantine's transitions
            aria-label={ariaLabel}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden',
                },
                section: {
                    ...styles?.section,
                    transition: 'none',
                },
            }}
        >
            <motion.div
                initial={{ width: 0 }}
                animate={{ width: `${value}%` }}
                transition={springs.feedback}
                {...stripeAnimation}
            >
                {children}
            </motion.div>
        </MantineProgress>
    );
}

Progress.Root = function ProgressRoot({ wire, mingleData, children }) {
    const {
        size,
        radius,
        transitionDuration,
        classNames,
        styles,
    } = mingleData;

    return (
        <MotionRoot
            size={size}
            radius={radius}
            transitionDuration={0}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden',
                },
            }}
            {...layout.default}
            transition={springs.feedback}
        >
            {children}
        </MotionRoot>
    );
};

Progress.Section = function ProgressSection({ wire, mingleData, children }) {
    const {
        value,
        color,
        striped,
        animated,
        'aria-label': ariaLabel,
    } = mingleData;

    // Loading animation for striped variant with feedback timing
    const stripeAnimation = striped && animated ? {
        animate: {
            backgroundPosition: ['0% 0%', '100% 0%'],
            transition: {
                duration: presets.feedback.duration * 10,
                ease: "linear",
                repeat: Infinity,
            },
        },
    } : {};

    return (
        <MotionSection
            value={value}
            color={color}
            striped={striped}
            animated={false}
            aria-label={ariaLabel}
            initial={{ width: 0, opacity: 0 }}
            animate={{ 
                width: `${value}%`,
                opacity: 1,
            }}
            exit={{ width: 0, opacity: 0 }}
            transition={{
                ...springs.feedback,
                opacity: { 
                    duration: presets.feedback.duration,
                    ease: presets.feedback.ease
                },
            }}
            {...stripeAnimation}
        >
            {children}
        </MotionSection>
    );
};

Progress.Label = function ProgressLabel({ children }) {
    return (
        <AnimatePresence mode="wait">
            <MotionLabel
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: 10 }}
                transition={{
                    duration: presets.feedback.duration,
                    ease: presets.feedback.ease,
                    y: springs.feedback,
                }}
            >
                {children}
            </MotionLabel>
        </AnimatePresence>
    );
};

export default Progress;
