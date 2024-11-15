import React from 'react';
import { Spoiler as MantineSpoiler } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionSpoiler = motion(MantineSpoiler);
const MotionControl = motion.div;
const MotionContent = motion.div;

function Spoiler({ wire, mingleData, children }) {
    const {
        maxHeight = 100,
        showLabel = 'Show more',
        hideLabel = 'Hide',
        expanded = false,
        onExpandedChange,
        transitionDuration = presets.expand.duration * 1000, // Convert to ms
        controlRef,
        classNames,
        styles,
        // Animation props
        animate = true,
    } = mingleData;

    // Control button animation
    const controlAnimation = {
        initial: { opacity: 0, y: 5 },
        animate: { 
            opacity: 1,
            y: 0,
            transition: {
                duration: presets.expand.duration * 0.5,
                ease: presets.expand.ease,
            }
        },
        exit: { 
            opacity: 0,
            y: -5,
            transition: {
                duration: presets.expand.duration * 0.3,
                ease: presets.expand.ease,
            }
        }
    };

    // Content animation
    const contentAnimation = {
        initial: { opacity: 0 },
        animate: { 
            opacity: 1,
            transition: {
                duration: presets.expand.duration * 0.5,
                ease: presets.expand.ease,
                delay: presets.expand.duration * 0.2,
            }
        },
        exit: { 
            opacity: 0,
            transition: {
                duration: presets.expand.duration * 0.3,
                ease: presets.expand.ease,
            }
        }
    };

    return (
        <MotionSpoiler
            maxHeight={maxHeight}
            showLabel={showLabel}
            hideLabel={hideLabel}
            expanded={expanded}
            onExpandedChange={onExpandedChange ? (value) => wire.emit('expandedChange', value) : undefined}
            transitionDuration={0} // We'll handle transitions with Motion
            controlRef={controlRef}
            classNames={{
                ...classNames,
                root: `${classNames?.root || ''} ${animate ? 'animated-spoiler' : ''}`,
            }}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden',
                },
                content: {
                    ...styles?.content,
                    transition: 'none', // Disable Mantine's transitions
                },
                control: {
                    ...styles?.control,
                    transition: 'none',
                },
            }}
            control={({ expanded: isExpanded, ...controlProps }) => (
                <AnimatePresence mode="wait">
                    <MotionControl
                        {...controlProps}
                        {...controlAnimation}
                        {...interactive.button}
                        transition={springs.expand}
                        style={{
                            cursor: 'pointer',
                            userSelect: 'none',
                        }}
                    >
                        {isExpanded ? hideLabel : showLabel}
                    </MotionControl>
                </AnimatePresence>
            )}
        >
            <MotionContent
                layout
                initial={false}
                animate={{
                    height: expanded ? 'auto' : maxHeight,
                    transition: springs.expand,
                }}
            >
                <motion.div
                    {...contentAnimation}
                    style={{
                        height: '100%',
                        width: '100%',
                    }}
                >
                    {children}
                </motion.div>
            </MotionContent>
        </MotionSpoiler>
    );
}

// Add variants for common use cases
Spoiler.Text = function TextSpoiler(props) {
    return (
        <Spoiler
            {...props}
            mingleData={{
                ...props.mingleData,
                maxHeight: props.mingleData?.maxHeight || 50,
                showLabel: props.mingleData?.showLabel || 'Read more',
                hideLabel: props.mingleData?.hideLabel || 'Show less',
            }}
        />
    );
};

Spoiler.Content = function ContentSpoiler(props) {
    return (
        <Spoiler
            {...props}
            mingleData={{
                ...props.mingleData,
                maxHeight: props.mingleData?.maxHeight || 200,
                showLabel: props.mingleData?.showLabel || 'Show content',
                hideLabel: props.mingleData?.hideLabel || 'Hide content',
            }}
        />
    );
};

Spoiler.Preview = function PreviewSpoiler(props) {
    return (
        <Spoiler
            {...props}
            mingleData={{
                ...props.mingleData,
                maxHeight: props.mingleData?.maxHeight || 100,
                showLabel: props.mingleData?.showLabel || 'Preview more',
                hideLabel: props.mingleData?.hideLabel || 'Close preview',
            }}
        />
    );
};

export default Spoiler;
