import React from 'react';
import { Overlay as MantineOverlay } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets, overlayAnimations } from '../../utils/animations';

// Motion-enhanced components
const MotionOverlay = motion(MantineOverlay);
const MotionContent = motion.div;

function Overlay({ wire, mingleData, children }) {
    const {
        color,
        backgroundOpacity = 0.6,
        gradient,
        blur,
        center,
        fixed = true,
        zIndex = 200,
        component,
        classNames,
        styles,
        // Animation props
        withFade = true,
        withBlur = true,
    } = mingleData;

    // Gradient animation setup
    const gradientAnimation = gradient ? {
        animate: {
            backgroundPosition: ['0% 0%', '100% 100%'],
            transition: {
                duration: presets.drawer.duration * 10,
                ease: "linear",
                repeat: Infinity,
                repeatType: "reverse"
            }
        }
    } : {};

    return (
        <AnimatePresence mode="wait">
            <MotionOverlay
                color={color}
                backgroundOpacity={withFade ? 0 : backgroundOpacity} // Start with 0 opacity for animation
                gradient={gradient}
                blur={withBlur ? 0 : blur} // Start with 0 blur for animation
                center={center}
                fixed={fixed}
                zIndex={zIndex}
                component={component}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        backdropFilter: withBlur ? `blur(0px)` : undefined,
                    },
                }}
                initial={{ 
                    opacity: 0,
                    backdropFilter: withBlur ? 'blur(0px)' : undefined,
                }}
                animate={{ 
                    opacity: 1,
                    backdropFilter: withBlur ? `blur(${blur}px)` : undefined,
                    backgroundOpacity: backgroundOpacity,
                }}
                exit={{ 
                    opacity: 0,
                    backdropFilter: withBlur ? 'blur(0px)' : undefined,
                }}
                transition={{
                    ...springs.drawer,
                    backdropFilter: {
                        duration: presets.drawer.duration,
                        ease: presets.drawer.ease,
                    },
                }}
                {...gradientAnimation}
            >
                {children && (
                    <MotionContent
                        initial={{ 
                            opacity: 0,
                            scale: center ? 0.9 : 1,
                            y: center ? 20 : 0
                        }}
                        animate={{ 
                            opacity: 1,
                            scale: 1,
                            y: 0
                        }}
                        exit={{ 
                            opacity: 0,
                            scale: center ? 0.9 : 1,
                            y: center ? -20 : 0
                        }}
                        transition={springs.drawer}
                        style={{
                            width: '100%',
                            height: '100%',
                            display: center ? 'flex' : 'block',
                            alignItems: center ? 'center' : 'flex-start',
                            justifyContent: center ? 'center' : 'flex-start',
                        }}
                    >
                        {children}
                    </MotionContent>
                )}
            </MotionOverlay>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Overlay.Blur = function BlurOverlay(props) {
    return (
        <Overlay
            {...props}
            mingleData={{
                ...props.mingleData,
                blur: props.mingleData?.blur || 8,
                withBlur: true,
            }}
        />
    );
};

Overlay.Gradient = function GradientOverlay(props) {
    return (
        <Overlay
            {...props}
            mingleData={{
                ...props.mingleData,
                gradient: props.mingleData?.gradient || 'linear-gradient(45deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%)',
                backgroundOpacity: 1,
            }}
        />
    );
};

Overlay.Loading = function LoadingOverlay(props) {
    return (
        <Overlay
            {...props}
            mingleData={{
                ...props.mingleData,
                center: true,
                blur: 3,
                withBlur: true,
                zIndex: 1000,
            }}
        />
    );
};

export default Overlay;
