import React from 'react';
import { Card as MantineCard } from '@mantine/core';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, interactive, layout, scroll, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionCard = motion(MantineCard);
const MotionSection = motion(MantineCard.Section);

function Card({ wire, mingleData, children }) {
    const {
        padding,
        radius,
        withBorder,
        shadow,
        component,
        classNames,
        styles,
        // Additional animation props
        animate = true,
        scrollAnimation = false,
        layoutId,
        transition: customTransition,
        initial: customInitial,
        animate: customAnimate,
        exit: customExit,
        whileHover: customWhileHover,
        whileTap: customWhileTap,
    } = mingleData;

    const cardRef = React.useRef(null);

    // Scroll-linked animations if enabled
    const { scrollYProgress } = useScroll({
        target: cardRef,
        offset: ["start end", "end start"]
    });

    // Base animation props with expand preset
    const motionProps = animate ? {
        ...layout.default,
        initial: customInitial || { opacity: 0, y: 20 },
        animate: customAnimate || { opacity: 1, y: 0 },
        exit: customExit || { opacity: 0, y: -20 },
        transition: customTransition || {
            ...springs.expand,
            opacity: {
                duration: presets.expand.duration,
                ease: presets.expand.ease
            }
        },
        whileHover: customWhileHover || {
            y: -4,
            shadow: shadow ? `${shadow.split('-')[0]}-${Math.min(parseInt(shadow.split('-')[1] || 1) + 1, 5)}` : undefined,
            transition: springs.input
        },
        whileTap: customWhileTap || { scale: 0.98 },
        ...(layoutId && { layoutId })
    } : {};

    // Add scroll animation props if enabled
    const scrollProps = scrollAnimation ? {
        style: {
            ...scroll.scaleAndFade(scrollYProgress),
            transition: `all ${presets.expand.duration}s ${presets.expand.ease}`
        }
    } : {};

    return (
        <AnimatePresence mode="wait">
            <MotionCard
                ref={cardRef}
                padding={padding}
                radius={radius}
                withBorder={withBorder}
                shadow={shadow}
                component={component}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        transition: animate ? 
                            `all ${presets.expand.duration}s ${presets.expand.ease}` : 
                            undefined
                    }
                }}
                {...motionProps}
                {...scrollProps}
            >
                {children}
            </MotionCard>
        </AnimatePresence>
    );
}

Card.Section = function CardSection({ wire, mingleData, children }) {
    const {
        withBorder,
        inheritPadding,
        component,
        // Additional animation props
        animate = true,
        layoutId,
    } = mingleData;

    return (
        <MotionSection
            withBorder={withBorder}
            inheritPadding={inheritPadding}
            component={component}
            {...(animate && {
                layout: true,
                initial: { opacity: 0 },
                animate: { opacity: 1 },
                exit: { opacity: 0 },
                transition: springs.expand,
                ...(layoutId && { layoutId })
            })}
        >
            <motion.div
                layout
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={{
                    duration: presets.expand.duration,
                    ease: presets.expand.ease
                }}
            >
                {children}
            </motion.div>
        </MotionSection>
    );
};

// Add static methods for common card animations
Card.Hover = function HoverCard(props) {
    return (
        <Card
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                whileHover: { 
                    y: -8,
                    shadow: 'md',
                    transition: springs.input
                },
                whileTap: { scale: 0.98 }
            }}
        />
    );
};

Card.Flip = function FlipCard(props) {
    const { front, back, ...rest } = props;
    const [isFlipped, setIsFlipped] = React.useState(false);

    return (
        <motion.div
            style={{ perspective: 1000 }}
            onClick={() => setIsFlipped(!isFlipped)}
        >
            <AnimatePresence mode="wait">
                {!isFlipped ? (
                    <Card
                        key="front"
                        {...rest}
                        mingleData={{
                            ...props.mingleData,
                            animate: true,
                            initial: { rotateY: 90 },
                            animate: { rotateY: 0 },
                            exit: { rotateY: -90 },
                            transition: springs.expand
                        }}
                    >
                        {front}
                    </Card>
                ) : (
                    <Card
                        key="back"
                        {...rest}
                        mingleData={{
                            ...props.mingleData,
                            animate: true,
                            initial: { rotateY: -90 },
                            animate: { rotateY: 0 },
                            exit: { rotateY: 90 },
                            transition: springs.expand
                        }}
                    >
                        {back}
                    </Card>
                )}
            </AnimatePresence>
        </motion.div>
    );
};

Card.Stack = function StackCard(props) {
    return (
        <Card
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                whileHover: { 
                    y: -4,
                    shadow: 'lg',
                    transition: springs.input
                },
                style: {
                    ...props.mingleData?.style,
                    position: 'relative',
                    '&::before, &::after': {
                        content: '""',
                        position: 'absolute',
                        top: 4,
                        left: 8,
                        right: -8,
                        bottom: -4,
                        background: 'inherit',
                        border: 'inherit',
                        borderRadius: 'inherit',
                        zIndex: -1,
                        transition: `all ${presets.expand.duration}s ${presets.expand.ease}`
                    },
                    '&::after': {
                        top: 8,
                        left: 16,
                        right: -16,
                        bottom: -8
                    }
                }
            }}
        />
    );
};

export default Card;
