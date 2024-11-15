import React from 'react';
import { Progress as MantineProgress } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout } from '../../utils/animations';

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

    // Loading animation for striped variant
    const stripeAnimation = striped && animated ? {
        animate: {
            backgroundPosition: ['0% 0%', '100% 0%'],
            transition: {
                duration: 2,
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
                transition={springs.default}
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

    // Loading animation for striped variant
    const stripeAnimation = striped && animated ? {
        animate: {
            backgroundPosition: ['0% 0%', '100% 0%'],
            transition: {
                duration: 2,
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
                ...springs.default,
                opacity: { duration: 0.2 },
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
                    duration: 0.2,
                    y: springs.snappy,
                }}
            >
                {children}
            </MotionLabel>
        </AnimatePresence>
    );
};

export default Progress;
