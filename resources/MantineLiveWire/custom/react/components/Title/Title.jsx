import React from 'react';
import { Title as MantineTitle } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionTitle = motion(MantineTitle);
const MotionSpan = motion.span;

function Title({ wire, mingleData, children }) {
    const {
        order = 1,
        size,
        textWrap,
        lineClamp,
        classNames,
        styles,
        // Animation props
        animate = true,
        effect = 'fade', // fade, slideUp, slideDown, slideLeft, slideRight, perspective, scale, words
        direction = 'normal',
        gradient,
    } = mingleData;

    // Effect-based animations
    const getEffectAnimations = () => {
        const getSlideDirection = () => {
            switch (effect) {
                case 'slideUp':
                    return { y: direction === 'normal' ? 50 : -50 };
                case 'slideDown':
                    return { y: direction === 'normal' ? -50 : 50 };
                case 'slideLeft':
                    return { x: direction === 'normal' ? 100 : -100 };
                case 'slideRight':
                    return { x: direction === 'normal' ? -100 : 100 };
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
                        rotateX: direction === 'normal' ? 90 : -90,
                        y: direction === 'normal' ? 100 : -100
                    },
                    animate: { 
                        opacity: 1,
                        rotateX: 0,
                        y: 0
                    },
                    exit: { 
                        opacity: 0,
                        rotateX: direction === 'normal' ? -90 : 90,
                        y: direction === 'normal' ? -100 : 100
                    }
                };
            case 'scale':
                return {
                    initial: { 
                        opacity: 0,
                        scale: direction === 'normal' ? 0.5 : 1.5
                    },
                    animate: { 
                        opacity: 1,
                        scale: 1
                    },
                    exit: { 
                        opacity: 0,
                        scale: direction === 'normal' ? 1.5 : 0.5
                    }
                };
            case 'words':
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 },
                    transition: {
                        staggerChildren: 0.05,
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

    // Split text for word animation if needed
    const renderContent = () => {
        if (effect === 'words' && typeof children === 'string') {
            return children.split(' ').map((word, index) => (
                <MotionSpan
                    key={index}
                    style={{ 
                        display: 'inline-block',
                        transformOrigin: 'center',
                        marginRight: '0.25em',
                    }}
                    initial={{ 
                        opacity: 0,
                        y: 50,
                        rotateX: 90,
                        scale: 0.8
                    }}
                    animate={{ 
                        opacity: 1,
                        y: 0,
                        rotateX: 0,
                        scale: 1
                    }}
                    exit={{ 
                        opacity: 0,
                        y: -50,
                        rotateX: -90,
                        scale: 0.8
                    }}
                    transition={{
                        ...springs.input,
                        delay: index * 0.05,
                    }}
                >
                    {word}
                </MotionSpan>
            ));
        }
        return children;
    };

    return (
        <AnimatePresence mode="wait">
            <MotionTitle
                order={order}
                size={size}
                textWrap={textWrap}
                lineClamp={lineClamp}
                classNames={{
                    ...classNames,
                    root: `${classNames?.root || ''} ${animate ? 'animated-title' : ''}`,
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
                        perspective: effect === 'perspective' ? '1200px' : undefined,
                    },
                }}
                {...(animate && {
                    ...getEffectAnimations(),
                    transition: {
                        ...springs.input,
                        duration: presets.input.duration * 1.2,
                        rotateX: { duration: presets.input.duration * 1.5 },
                    },
                })}
            >
                {renderContent()}
            </MotionTitle>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Title.Hero = function HeroTitle(props) {
    return (
        <Title
            {...props}
            mingleData={{
                ...props.mingleData,
                order: 1,
                size: props.mingleData?.size || '3rem',
                effect: 'words',
                gradient: props.mingleData?.gradient || {
                    from: 'blue',
                    to: 'cyan',
                },
            }}
        />
    );
};

Title.Section = function SectionTitle(props) {
    return (
        <Title
            {...props}
            mingleData={{
                ...props.mingleData,
                order: 2,
                effect: 'perspective',
            }}
        />
    );
};

Title.Sub = function SubTitle(props) {
    return (
        <Title
            {...props}
            mingleData={{
                ...props.mingleData,
                order: 3,
                effect: 'slideRight',
            }}
        />
    );
};

export default Title;
