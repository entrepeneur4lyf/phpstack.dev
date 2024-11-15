import React from 'react';
import { Skeleton as MantineSkeleton } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionSkeleton = motion(MantineSkeleton);

// Shimmer animation for loading state
const shimmerAnimation = {
    animate: {
        backgroundPosition: ['100%', '-100%'],
        transition: {
            repeat: Infinity,
            duration: presets.feedback.duration * 2,
            ease: "linear",
        },
    },
};

function Skeleton({ wire, mingleData, children }) {
    const {
        visible,
        height,
        width,
        radius,
        circle,
        enableShimmer = true, // Renamed from animate to avoid confusion
        classNames,
        styles,
    } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionSkeleton
                visible={visible}
                height={height}
                width={width}
                radius={circle ? '50%' : radius}
                circle={circle}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'hidden',
                        position: 'relative',
                    },
                }}
                {...layout.default}
                initial={{ 
                    opacity: 0,
                    scale: circle ? 0.9 : 1,
                }}
                animate={{ 
                    opacity: 1,
                    scale: 1,
                }}
                exit={{ 
                    opacity: 0,
                    scale: circle ? 0.9 : 1,
                }}
                transition={springs.feedback}
            >
                {/* Shimmer effect overlay */}
                {enableShimmer && (
                    <motion.div
                        style={{
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: `linear-gradient(
                                90deg,
                                transparent 0%,
                                rgba(255, 255, 255, 0.15) 50%,
                                transparent 100%
                            )`,
                            backgroundSize: '200% 100%',
                            pointerEvents: 'none',
                        }}
                        {...shimmerAnimation}
                    />
                )}

                {/* Content with fade animation */}
                {children && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        transition={{
                            duration: presets.feedback.duration,
                            ease: presets.feedback.ease,
                        }}
                    >
                        {children}
                    </motion.div>
                )}
            </MotionSkeleton>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Skeleton.Text = function SkeletonText(props) {
    return (
        <Skeleton
            {...props}
            mingleData={{
                ...props.mingleData,
                height: props.mingleData?.height || 20,
                radius: props.mingleData?.radius || 4,
            }}
        />
    );
};

Skeleton.Avatar = function SkeletonAvatar(props) {
    return (
        <Skeleton
            {...props}
            mingleData={{
                ...props.mingleData,
                circle: true,
                height: props.mingleData?.height || 40,
                width: props.mingleData?.width || 40,
            }}
        />
    );
};

Skeleton.Button = function SkeletonButton(props) {
    return (
        <Skeleton
            {...props}
            mingleData={{
                ...props.mingleData,
                height: props.mingleData?.height || 36,
                radius: props.mingleData?.radius || 6,
            }}
        />
    );
};

export default Skeleton;
