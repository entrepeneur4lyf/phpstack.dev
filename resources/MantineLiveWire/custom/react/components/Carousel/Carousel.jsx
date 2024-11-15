import React from 'react';
import { Carousel as MantineCarousel, useAnimationOffsetEffect } from '@mantine/carousel';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionCarousel = motion(MantineCarousel);
const MotionSlide = motion(MantineCarousel.Slide);
const MotionControl = motion.button;
const MotionIndicator = motion.button;

function Carousel({ wire, mingleData }) {
    const {
        slideSize,
        slideGap,
        orientation,
        slidesToScroll,
        align,
        breakpoints,
        dragFree,
        draggable,
        loop,
        withControls,
        withIndicators,
        controlsOffset,
        controlSize,
        nextControlIcon,
        previousControlIcon,
        height,
        includeGapInSize,
        containScroll,
        plugins,
        initialSlide,
        getEmblaApi,
        classNames,
        styles,
        // Additional animation props
        effect = 'slide', // slide, fade, scale
    } = mingleData;

    // Add animation offset effect if getEmblaApi is provided
    useAnimationOffsetEffect(getEmblaApi, 200);

    // Enhanced control components with animations
    const NextControl = React.forwardRef((props, ref) => (
        <MotionControl
            ref={ref}
            {...props}
            {...interactive.button}
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: 20 }}
            transition={springs.input}
        >
            {nextControlIcon}
        </MotionControl>
    ));

    const PreviousControl = React.forwardRef((props, ref) => (
        <MotionControl
            ref={ref}
            {...props}
            {...interactive.button}
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: -20 }}
            transition={springs.input}
        >
            {previousControlIcon}
        </MotionControl>
    ));

    // Enhanced indicator component with animations
    const Indicator = React.forwardRef(({ active, ...props }, ref) => (
        <MotionIndicator
            ref={ref}
            {...props}
            {...interactive.button}
            animate={active ? {
                scale: 1.2,
                opacity: 1
            } : {
                scale: 1,
                opacity: 0.6
            }}
            transition={springs.input}
        />
    ));

    return (
        <MotionCarousel
            slideSize={slideSize}
            slideGap={slideGap}
            orientation={orientation}
            slidesToScroll={slidesToScroll}
            align={align}
            breakpoints={breakpoints}
            dragFree={dragFree}
            draggable={draggable}
            loop={loop}
            withControls={withControls}
            withIndicators={withIndicators}
            controlsOffset={controlsOffset}
            controlSize={controlSize}
            nextControlIcon={<NextControl />}
            previousControlIcon={<PreviousControl />}
            height={height}
            includeGapInSize={includeGapInSize}
            containScroll={containScroll}
            plugins={plugins}
            initialSlide={initialSlide}
            getEmblaApi={getEmblaApi}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden'
                },
                container: {
                    ...styles?.container,
                    transition: `transform ${presets.expand.duration}s ${presets.expand.ease}`
                },
                controls: {
                    ...styles?.controls,
                    transition: `opacity ${presets.expand.duration}s ${presets.expand.ease}`
                },
                indicators: {
                    ...styles?.indicators,
                    transition: `opacity ${presets.expand.duration}s ${presets.expand.ease}`
                }
            }}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.expand}
        >
            {mingleData.children}
        </MotionCarousel>
    );
}

Carousel.Slide = function CarouselSlide({ wire, mingleData, children }) {
    const { 
        size, 
        gap,
        effect = 'slide' // inherit from parent or use default
    } = mingleData;

    // Effect-based animations
    const slideAnimations = {
        slide: {
            initial: { opacity: 0, x: 50 },
            animate: { opacity: 1, x: 0 },
            exit: { opacity: 0, x: -50 }
        },
        fade: {
            initial: { opacity: 0 },
            animate: { opacity: 1 },
            exit: { opacity: 0 }
        },
        scale: {
            initial: { opacity: 0, scale: 0.8 },
            animate: { opacity: 1, scale: 1 },
            exit: { opacity: 0, scale: 0.8 }
        }
    };
    
    return (
        <MotionSlide
            size={size}
            gap={gap}
            {...slideAnimations[effect]}
            transition={{
                ...springs.expand,
                opacity: {
                    duration: presets.expand.duration,
                    ease: presets.expand.ease
                }
            }}
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
        </MotionSlide>
    );
};

// Add static methods for different transition effects
Carousel.Fade = function FadeCarousel(props) {
    return <Carousel {...props} mingleData={{ ...props.mingleData, effect: 'fade' }} />;
};

Carousel.Scale = function ScaleCarousel(props) {
    return <Carousel {...props} mingleData={{ ...props.mingleData, effect: 'scale' }} />;
};

export default Carousel;
