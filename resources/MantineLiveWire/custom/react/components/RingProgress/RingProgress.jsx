import React from 'react';
import { RingProgress as MantineRingProgress } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionRingProgress = motion(MantineRingProgress);
const MotionCircle = motion.circle;
const MotionText = motion.text;

function RingProgress({ wire, mingleData, children }) {
    const {
        sections,
        label,
        size = 120,
        thickness = 12,
        roundCaps = true,
        rootColor,
        classNames,
        styles,
        // Animation props
        animate = true,
        interactive: isInteractive = true,
    } = mingleData;

    // Process sections with animations
    const processedSections = sections?.map(section => ({
        ...section,
        onMouseEnter: () => {
            if (section.onMouseEnter) {
                wire.emit('sectionMouseEnter', section.value);
            }
        },
        onMouseLeave: () => {
            if (section.onMouseLeave) {
                wire.emit('sectionMouseLeave', section.value);
            }
        },
        render: ({ section: s, cx, cy, r }) => (
            <motion.g key={s.color}>
                <MotionCircle
                    cx={cx}
                    cy={cy}
                    r={r}
                    fill="none"
                    stroke={s.color}
                    strokeWidth={thickness}
                    strokeLinecap={roundCaps ? 'round' : 'butt'}
                    initial={animate ? { 
                        pathLength: 0,
                        opacity: 0,
                    } : undefined}
                    animate={{ 
                        pathLength: s.value / 100,
                        opacity: 1,
                    }}
                    transition={{
                        pathLength: {
                            duration: presets.feedback.duration,
                            ease: presets.feedback.ease,
                        },
                        opacity: {
                            duration: presets.feedback.duration * 0.5,
                        },
                    }}
                    {...(isInteractive && {
                        whileHover: { 
                            scale: 1.05,
                            transition: {
                                ...springs.feedback,
                                duration: presets.feedback.duration * 0.3,
                            }
                        },
                        whileTap: { scale: 0.95 }
                    })}
                />
            </motion.g>
        ),
    }));

    return (
        <AnimatePresence mode="wait">
            <MotionRingProgress
                sections={processedSections}
                label={typeof label === 'string' ? (
                    <motion.div
                        initial={{ opacity: 0, scale: 0.9 }}
                        animate={{ opacity: 1, scale: 1 }}
                        exit={{ opacity: 0, scale: 0.9 }}
                        transition={springs.feedback}
                    >
                        {label}
                    </motion.div>
                ) : label}
                size={size}
                thickness={thickness}
                roundCaps={roundCaps}
                rootColor={rootColor}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        position: 'relative',
                    },
                }}
                initial={{ opacity: 0, scale: 0.9 }}
                animate={{ opacity: 1, scale: 1 }}
                exit={{ opacity: 0, scale: 0.9 }}
                transition={springs.feedback}
            >
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
            </MotionRingProgress>
        </AnimatePresence>
    );
}

// Add variants for common use cases
RingProgress.Label = function LabelRingProgress(props) {
    return (
        <RingProgress
            {...props}
            mingleData={{
                ...props.mingleData,
                label: typeof props.mingleData?.label === 'number' ? 
                    `${props.mingleData.label}%` : 
                    props.mingleData?.label,
            }}
        />
    );
};

RingProgress.Interactive = function InteractiveRingProgress(props) {
    return (
        <RingProgress
            {...props}
            mingleData={{
                ...props.mingleData,
                interactive: true,
                thickness: props.mingleData?.thickness || 16,
            }}
        />
    );
};

RingProgress.Slim = function SlimRingProgress(props) {
    return (
        <RingProgress
            {...props}
            mingleData={{
                ...props.mingleData,
                thickness: props.mingleData?.thickness || 8,
                size: props.mingleData?.size || 80,
            }}
        />
    );
};

export default RingProgress;
