import React from 'react';
import { Paper as MantinePaper } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionPaper = motion(MantinePaper);

function Paper({ wire, mingleData, children }) {
    const {
        shadow = 'sm',
        radius = 'sm',
        withBorder = false,
        p = 'md',
        component,
        classNames,
        styles,
        // Animation props
        interactive: isInteractive = false,
        animate = true,
        effect = 'fade', // fade, scale, slide
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        switch (effect) {
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.95 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.95 }
                };
            case 'slide':
                return {
                    initial: { opacity: 0, y: 20 },
                    animate: { opacity: 1, y: 0 },
                    exit: { opacity: 0, y: -20 }
                };
            case 'fade':
            default:
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
        }
    };

    // Interactive animations
    const getInteractiveProps = () => {
        if (!isInteractive) return {};

        return {
            whileHover: { 
                scale: 1.02,
                boxShadow: '0 8px 16px rgba(0, 0, 0, 0.1)',
                transition: {
                    ...springs.input,
                    duration: presets.input.duration * 0.5
                }
            },
            whileTap: { scale: 0.98 }
        };
    };

    return (
        <AnimatePresence mode="wait">
            <MotionPaper
                shadow={shadow}
                radius={radius}
                withBorder={withBorder}
                p={p}
                component={component}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        transition: animate ? 
                            `all ${presets.input.duration}s ${presets.input.ease}` : 
                            undefined,
                    }
                }}
                {...(animate && {
                    layout: true,
                    ...getEffectAnimations(),
                    transition: {
                        ...springs.input,
                        layout: {
                            duration: presets.input.duration,
                            ease: presets.input.ease
                        }
                    }
                })}
                {...getInteractiveProps()}
            >
                {/* Content with fade animation */}
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{
                        duration: presets.input.duration,
                        ease: presets.input.ease,
                    }}
                >
                    {children}
                </motion.div>
            </MotionPaper>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Paper.Interactive = function InteractivePaper(props) {
    return (
        <Paper
            {...props}
            mingleData={{
                ...props.mingleData,
                interactive: true,
                shadow: props.mingleData?.shadow || 'md',
            }}
        />
    );
};

Paper.Card = function CardPaper(props) {
    return (
        <Paper
            {...props}
            mingleData={{
                ...props.mingleData,
                shadow: 'sm',
                radius: 'md',
                withBorder: true,
                p: 'lg',
            }}
        />
    );
};

Paper.Scale = function ScalePaper(props) {
    return (
        <Paper
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'scale',
            }}
        />
    );
};

Paper.Slide = function SlidePaper(props) {
    return (
        <Paper
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'slide',
            }}
        />
    );
};

export default Paper;
