import React from 'react';
import { FloatingIndicator as MantineFloatingIndicator } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../utils/animations';

// Motion-enhanced indicator
const MotionFloatingIndicator = motion(MantineFloatingIndicator);

function FloatingIndicator({ wire, mingleData, children }) {
    const {
        target,
        parent,
        transitionDuration,
        transitionTimingFunction,
        classNames,
        styles,
        // Additional animation props
        effect = 'slide', // slide, fade, scale
        animate = true,
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        switch (effect) {
            case 'fade':
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.8 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.8 }
                };
            case 'slide':
            default:
                return {
                    initial: { opacity: 0, y: 10 },
                    animate: { opacity: 1, y: 0 },
                    exit: { opacity: 0, y: -10 }
                };
        }
    };

    return (
        <AnimatePresence mode="wait">
            <MotionFloatingIndicator
                target={target}
                parent={parent}
                transitionDuration={0} // Disable Mantine's transitions
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        // Ensure smooth transitions
                        transition: animate ? 
                            `all ${presets.input.duration}s ${presets.input.ease}` : 
                            undefined
                    }
                }}
                {...(animate && {
                    // Layout animation for position changes
                    layout: true,
                    layoutId: target, // Use target as layout ID for smooth transitions
                    // Effect animations
                    ...getEffectAnimations(),
                    // Spring-based transitions
                    transition: {
                        ...springs.input,
                        layout: {
                            duration: presets.input.duration,
                            ease: presets.input.ease
                        }
                    }
                })}
            >
                <motion.div
                    layout
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{
                        duration: presets.input.duration,
                        ease: presets.input.ease
                    }}
                >
                    {children}
                </motion.div>
            </MotionFloatingIndicator>
        </AnimatePresence>
    );
}

// Add static methods for different animation styles
FloatingIndicator.Fade = function FadeIndicator(props) {
    return (
        <FloatingIndicator
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'fade'
            }}
        />
    );
};

FloatingIndicator.Scale = function ScaleIndicator(props) {
    return (
        <FloatingIndicator
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'scale'
            }}
        />
    );
};

FloatingIndicator.Slide = function SlideIndicator(props) {
    return (
        <FloatingIndicator
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'slide'
            }}
        />
    );
};

// Add utility method for smooth target updates
FloatingIndicator.smoothUpdateTarget = (wire, newTarget) => {
    wire.set('target', newTarget, {
        transition: {
            ...springs.input,
            duration: presets.input.duration,
            ease: presets.input.ease
        }
    });
};

export default FloatingIndicator;
