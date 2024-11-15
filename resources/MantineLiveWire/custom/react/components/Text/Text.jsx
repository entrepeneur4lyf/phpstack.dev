import React from 'react';
import { Text as MantineText } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionText = motion(MantineText);
const MotionSpan = motion.span;

function Text({ wire, mingleData, children }) {
    const {
        size,
        fw,
        fs,
        td,
        tt,
        c,
        ta,
        variant,
        gradient,
        truncate,
        lineClamp,
        inherit,
        span,
        component,
        classNames,
        styles,
        // Animation props
        animate = true,
        effect = 'fade', // fade, slideUp, slideDown, slideLeft, slideRight, perspective, characters
        direction = 'normal', // normal, reverse
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        const getSlideDirection = () => {
            switch (effect) {
                case 'slideUp':
                    return { y: direction === 'normal' ? 20 : -20 };
                case 'slideDown':
                    return { y: direction === 'normal' ? -20 : 20 };
                case 'slideLeft':
                    return { x: direction === 'normal' ? 50 : -50 };
                case 'slideRight':
                    return { x: direction === 'normal' ? -50 : 50 };
                default:
                    return {};
            }
        };

        switch (effect) {
            case 'slideUp':
            case 'slideDown':
            case 'slideLeft':
            case 'slideRight':
                return {
                    initial: { opacity: 0, ...getSlideDirection() },
                    animate: { opacity: 1, x: 0, y: 0 },
                    exit: { opacity: 0, ...getSlideDirection() }
                };
            case 'perspective':
                return {
                    initial: { 
                        opacity: 0,
                        rotateX: direction === 'normal' ? 45 : -45,
                        y: direction === 'normal' ? 50 : -50
                    },
                    animate: { 
                        opacity: 1,
                        rotateX: 0,
                        y: 0
                    },
                    exit: { 
                        opacity: 0,
                        rotateX: direction === 'normal' ? -45 : 45,
                        y: direction === 'normal' ? -50 : 50
                    }
                };
            case 'characters':
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 },
                    transition: {
                        staggerChildren: 0.03,
                    }
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

    // Split text for character animation if needed
    const renderContent = () => {
        if (effect === 'characters' && typeof children === 'string') {
            return children.split('').map((char, index) => (
                <MotionSpan
                    key={index}
                    style={{ 
                        display: 'inline-block',
                        transformOrigin: 'center bottom'
                    }}
                    initial={{ opacity: 0, y: 20, rotateX: 45 }}
                    animate={{ opacity: 1, y: 0, rotateX: 0 }}
                    exit={{ opacity: 0, y: -20, rotateX: -45 }}
                    transition={{
                        ...springs.input,
                        delay: index * 0.03,
                    }}
                >
                    {char}
                </MotionSpan>
            ));
        }
        return children;
    };

    return (
        <AnimatePresence mode="wait">
            <MotionText
                size={size}
                fw={fw}
                fs={fs}
                td={td}
                tt={tt}
                c={c}
                ta={ta}
                variant={variant}
                gradient={gradient}
                truncate={truncate}
                lineClamp={lineClamp}
                inherit={inherit}
                span={span}
                component={component}
                classNames={{
                    ...classNames,
                    root: `${classNames?.root || ''} ${animate ? 'animated-text' : ''}`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        background: gradient ? 
                            `linear-gradient(to right, ${gradient.from}, ${gradient.to})` : 
                            undefined,
                        WebkitBackgroundClip: gradient ? 'text' : undefined,
                        WebkitTextFillColor: gradient ? 'transparent' : undefined,
                        perspective: effect === 'perspective' ? '1000px' : undefined,
                    },
                }}
                {...(animate && {
                    ...getEffectAnimations(),
                    transition: {
                        ...springs.input,
                        rotateX: { duration: presets.input.duration * 1.2 },
                    },
                })}
            >
                {renderContent()}
            </MotionText>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Text.Gradient = function GradientText(props) {
    return (
        <Text
            {...props}
            mingleData={{
                ...props.mingleData,
                gradient: props.mingleData?.gradient || { 
                    from: 'blue',
                    to: 'cyan',
                },
            }}
        />
    );
};

Text.Animated = function AnimatedText(props) {
    return (
        <Text
            {...props}
            mingleData={{
                ...props.mingleData,
                effect: 'characters',
                animate: true,
            }}
        />
    );
};

Text.Heading = function HeadingText(props) {
    return (
        <Text
            {...props}
            mingleData={{
                ...props.mingleData,
                size: props.mingleData?.size || 'xl',
                fw: props.mingleData?.fw || 700,
                effect: 'perspective',
            }}
        />
    );
};

Text.Caption = function CaptionText(props) {
    return (
        <Text
            {...props}
            mingleData={{
                ...props.mingleData,
                size: props.mingleData?.size || 'sm',
                c: props.mingleData?.c || 'dimmed',
                effect: 'slideRight',
            }}
        />
    );
};

export default Text;
