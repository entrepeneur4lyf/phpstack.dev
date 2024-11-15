import React from 'react';
import { Box as MantineBox } from '@mantine/core';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, layout, scroll, presets } from '../../utils/animations';

// Motion-enhanced box
const MotionBox = motion(MantineBox);

function Box({ wire, mingleData, children }) {
    const {
        component,
        bg,
        m,
        mx,
        my,
        mt,
        mb,
        ml,
        mr,
        p,
        px,
        py,
        pt,
        pb,
        pl,
        pr,
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

    const boxRef = React.useRef(null);

    // Scroll-linked animations if enabled
    const { scrollYProgress } = useScroll({
        target: boxRef,
        offset: ["start end", "end start"]
    });

    // Base animation props with expand preset
    const motionProps = animate ? {
        ...layout.default,
        initial: customInitial || { opacity: 0 },
        animate: customAnimate || { opacity: 1 },
        exit: customExit || { opacity: 0 },
        transition: customTransition || {
            ...springs.expand,
            opacity: {
                duration: presets.expand.duration,
                ease: presets.expand.ease
            }
        },
        ...(customWhileHover && { whileHover: customWhileHover }),
        ...(customWhileTap && { whileTap: customWhileTap }),
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
            <MotionBox
                ref={boxRef}
                component={component}
                bg={bg}
                m={m}
                mx={mx}
                my={my}
                mt={mt}
                mb={mb}
                ml={ml}
                mr={mr}
                p={p}
                px={px}
                py={py}
                pt={pt}
                pb={pb}
                pl={pl}
                pr={pr}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        // Ensure smooth transitions for spacing changes
                        transition: animate ? 
                            `all ${presets.expand.duration}s ${presets.expand.ease}` : 
                            undefined
                    }
                }}
                {...motionProps}
                {...scrollProps}
            >
                {children}
            </MotionBox>
        </AnimatePresence>
    );
}

// Add static methods for common animations
Box.FadeIn = function FadeInBox(props) {
    return (
        <Box
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                initial: { opacity: 0 },
                animate: { opacity: 1 },
                exit: { opacity: 0 },
                transition: springs.expand
            }}
        />
    );
};

Box.SlideIn = function SlideInBox(props) {
    const { direction = 'right', ...rest } = props.mingleData;
    const offset = 20;
    
    const slideAnimation = {
        right: { x: offset },
        left: { x: -offset },
        top: { y: -offset },
        bottom: { y: offset }
    };

    return (
        <Box
            {...rest}
            mingleData={{
                ...props.mingleData,
                animate: true,
                initial: { opacity: 0, ...slideAnimation[direction] },
                animate: { opacity: 1, [direction === 'left' || direction === 'right' ? 'x' : 'y']: 0 },
                exit: { opacity: 0, ...slideAnimation[direction] },
                transition: springs.expand
            }}
        />
    );
};

Box.Scale = function ScaleBox(props) {
    return (
        <Box
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                initial: { opacity: 0, scale: 0.9 },
                animate: { opacity: 1, scale: 1 },
                exit: { opacity: 0, scale: 0.9 },
                transition: springs.expand
            }}
        />
    );
};

export default Box;
