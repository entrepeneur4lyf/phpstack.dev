import React from 'react';
import { Portal as MantinePortal, OptionalPortal as MantineOptionalPortal } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets, overlayAnimations } from '../../utils/animations';

// Motion-enhanced wrapper component
const MotionWrapper = motion.div;

function Portal({ wire, mingleData, children }) {
    const {
        target,
        withinPortal = true,
        classNames,
        styles,
        // Animation props
        animate = true,
        position = 'center', // center, top, right, bottom, left
        effect = 'fade', // fade, scale, slide
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        switch (effect) {
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.9 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.9 }
                };
            case 'slide':
                return overlayAnimations.getPositionAnimation(position, 'drawer');
            case 'fade':
            default:
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
        }
    };

    const content = (
        <AnimatePresence mode="wait">
            <MotionWrapper
                {...(animate && {
                    ...getEffectAnimations(),
                    transition: springs.drawer,
                })}
                style={{
                    width: '100%',
                    height: '100%',
                }}
            >
                {children}
            </MotionWrapper>
        </AnimatePresence>
    );

    return (
        <MantinePortal
            target={target}
            withinPortal={withinPortal}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    position: 'relative',
                },
            }}
        >
            {content}
        </MantinePortal>
    );
}

function OptionalPortal({ wire, mingleData, children }) {
    const {
        withinPortal = true,
        target,
        classNames,
        styles,
        // Animation props
        animate = true,
        position = 'center',
        effect = 'fade',
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        switch (effect) {
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.9 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.9 }
                };
            case 'slide':
                return overlayAnimations.getPositionAnimation(position, 'drawer');
            case 'fade':
            default:
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
        }
    };

    const content = (
        <AnimatePresence mode="wait">
            <MotionWrapper
                {...(animate && {
                    ...getEffectAnimations(),
                    transition: springs.drawer,
                })}
                style={{
                    width: '100%',
                    height: '100%',
                }}
            >
                {children}
            </MotionWrapper>
        </AnimatePresence>
    );

    return (
        <MantineOptionalPortal
            withinPortal={withinPortal}
            target={target}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    position: 'relative',
                },
            }}
        >
            {content}
        </MantineOptionalPortal>
    );
}

// Add variants for common use cases
Portal.Fade = function FadePortal(props) {
    return (
        <Portal
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'fade',
            }}
        />
    );
};

Portal.Scale = function ScalePortal(props) {
    return (
        <Portal
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'scale',
            }}
        />
    );
};

Portal.Slide = function SlidePortal(props) {
    return (
        <Portal
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'slide',
            }}
        />
    );
};

Portal.Optional = OptionalPortal;

export default Portal;
