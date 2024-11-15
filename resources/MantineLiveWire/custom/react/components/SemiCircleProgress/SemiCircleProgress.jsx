import React from 'react';
import { SemiCircleProgress as MantineSemiCircleProgress } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionSemiCircleProgress = motion(MantineSemiCircleProgress);
const MotionLabel = motion.div;

function SemiCircleProgress({ wire, mingleData, children }) {
    const {
        value,
        size,
        thickness,
        label,
        labelPosition,
        fillDirection,
        orientation,
        filledSegmentColor,
        emptySegmentColor,
        transitionDuration,
        classNames,
        styles,
        // Animation props
        striped = false,
        animated = false,
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
        <MotionSemiCircleProgress
            value={value}
            size={size}
            thickness={thickness}
            labelPosition={labelPosition}
            fillDirection={fillDirection}
            orientation={orientation}
            filledSegmentColor={filledSegmentColor}
            emptySegmentColor={emptySegmentColor}
            transitionDuration={0} // Disable Mantine's transitions
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden',
                },
                section: {
                    ...styles?.section,
                    transition: 'none', // Disable Mantine's transitions
                },
            }}
            {...layout.default} // Enable layout animations
            initial={{ scale: 0.9, opacity: 0 }}
            animate={{ 
                scale: 1, 
                opacity: 1,
                "--value": value, // Animate custom property for progress
            }}
            transition={{
                scale: springs.feedback,
                opacity: { 
                    duration: presets.feedback.duration,
                    ease: presets.feedback.ease
                },
                "--value": springs.feedback,
            }}
            {...stripeAnimation}
        >
            {/* Animated label */}
            <AnimatePresence mode="wait">
                {label && (
                    <MotionLabel
                        key={value} // Force re-render on value change
                        initial={{ opacity: 0, y: -10 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{ opacity: 0, y: 10 }}
                        transition={{
                            duration: presets.feedback.duration,
                            ease: presets.feedback.ease,
                            y: springs.feedback,
                        }}
                        style={{
                            position: 'absolute',
                            left: '50%',
                            top: labelPosition === 'top' ? '-25px' : 'auto',
                            bottom: labelPosition === 'bottom' ? '-25px' : 'auto',
                            transform: 'translateX(-50%)',
                            fontSize: '1rem',
                            fontWeight: 500,
                        }}
                    >
                        {typeof label === 'function' ? label(value) : label}
                    </MotionLabel>
                )}
            </AnimatePresence>

            {children}
        </MotionSemiCircleProgress>
    );
}

export default SemiCircleProgress;
