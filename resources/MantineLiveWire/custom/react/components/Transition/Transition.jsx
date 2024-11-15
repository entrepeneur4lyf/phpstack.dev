import React from 'react';
import { Transition as MantineTransition } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets, overlayAnimations } from '../../utils/animations';

// Motion-enhanced wrapper
const MotionWrapper = motion.div;

function Transition({ wire, mingleData, children }) {
    const {
        mounted,
        transition = 'fade',
        duration = presets.input.duration * 1000, // Convert to ms
        timingFunction,
        enterDelay = 0,
        exitDelay = 0,
        keepMounted,
        onEnter,
        onExit,
        onEntered,
        onExited,
        classNames,
        styles,
        // Additional animation props
        position = 'center', // for position-based animations
    } = mingleData;

    // Get animation variants based on transition type
    const getTransitionVariants = () => {
        switch (transition) {
            case 'fade':
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.85 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.85 }
                };
            case 'scale-y':
                return {
                    initial: { opacity: 0, scaleY: 0 },
                    animate: { opacity: 1, scaleY: 1 },
                    exit: { opacity: 0, scaleY: 0 }
                };
            case 'scale-x':
                return {
                    initial: { opacity: 0, scaleX: 0 },
                    animate: { opacity: 1, scaleX: 1 },
                    exit: { opacity: 0, scaleX: 0 }
                };
            case 'skew-up':
                return {
                    initial: { opacity: 0, y: 20, skewY: 5 },
                    animate: { opacity: 1, y: 0, skewY: 0 },
                    exit: { opacity: 0, y: -20, skewY: -5 }
                };
            case 'skew-down':
                return {
                    initial: { opacity: 0, y: -20, skewY: -5 },
                    animate: { opacity: 1, y: 0, skewY: 0 },
                    exit: { opacity: 0, y: 20, skewY: 5 }
                };
            case 'rotate-left':
                return {
                    initial: { opacity: 0, rotate: 45, x: -50 },
                    animate: { opacity: 1, rotate: 0, x: 0 },
                    exit: { opacity: 0, rotate: -45, x: 50 }
                };
            case 'rotate-right':
                return {
                    initial: { opacity: 0, rotate: -45, x: 50 },
                    animate: { opacity: 1, rotate: 0, x: 0 },
                    exit: { opacity: 0, rotate: 45, x: -50 }
                };
            case 'slide-up':
            case 'slide-down':
            case 'slide-left':
            case 'slide-right':
                return overlayAnimations.getPositionAnimation(position);
            case 'pop':
                return {
                    initial: { opacity: 0, scale: 0.5, rotate: -15 },
                    animate: { opacity: 1, scale: 1, rotate: 0 },
                    exit: { opacity: 0, scale: 0.5, rotate: 15 }
                };
            default:
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
        }
    };

    return (
        <AnimatePresence
            mode="wait"
            onExitComplete={onExited}
        >
            {mounted && (
                <MotionWrapper
                    {...getTransitionVariants()}
                    transition={{
                        ...springs.input,
                        delay: enterDelay / 1000, // Convert to seconds
                        exit: {
                            ...springs.input,
                            delay: exitDelay / 1000,
                        }
                    }}
                    style={{
                        transformOrigin: 'center',
                        ...styles?.root,
                    }}
                    className={classNames?.root}
                    onAnimationStart={() => mounted ? onEnter?.() : onExit?.()}
                    onAnimationComplete={() => mounted ? onEntered?.() : null}
                >
                    {children}
                </MotionWrapper>
            )}
        </AnimatePresence>
    );
}

// Add variants for common use cases
Transition.Fade = function FadeTransition(props) {
    return (
        <Transition
            {...props}
            mingleData={{
                ...props.mingleData,
                transition: 'fade',
            }}
        />
    );
};

Transition.Scale = function ScaleTransition(props) {
    return (
        <Transition
            {...props}
            mingleData={{
                ...props.mingleData,
                transition: 'scale',
            }}
        />
    );
};

Transition.Pop = function PopTransition(props) {
    return (
        <Transition
            {...props}
            mingleData={{
                ...props.mingleData,
                transition: 'pop',
            }}
        />
    );
};

Transition.Slide = function SlideTransition(props) {
    return (
        <Transition
            {...props}
            mingleData={{
                ...props.mingleData,
                transition: `slide-${props.mingleData?.position || 'up'}`,
            }}
        />
    );
};

export default Transition;
