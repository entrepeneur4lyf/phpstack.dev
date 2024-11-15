import React from 'react';
import { Collapse as MantineCollapse } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced collapse
const MotionCollapse = motion(MantineCollapse);

function Collapse({ wire, mingleData, children }) {
    const {
        in: opened,
        transitionDuration,
        transitionTimingFunction,
        onTransitionEnd,
        classNames,
        styles,
    } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionCollapse
                in={opened}
                transitionDuration={0} // Disable Mantine's transitions
                onTransitionEnd={onTransitionEnd}
                classNames={classNames}
                styles={{
                    ...styles,
                    content: {
                        ...styles?.content,
                        transition: 'none',
                    },
                }}
                initial={{ height: 0, opacity: 0 }}
                animate={{ 
                    height: opened ? 'auto' : 0,
                    opacity: opened ? 1 : 0,
                    transition: {
                        height: springs.expand,
                        opacity: { 
                            duration: presets.expand.duration,
                            delay: opened ? 0.1 : 0,
                            ease: presets.expand.ease
                        },
                    }
                }}
                exit={{ 
                    height: 0,
                    opacity: 0,
                    transition: {
                        height: springs.expand,
                        opacity: { 
                            duration: presets.expand.duration * 0.5,
                            ease: presets.expand.ease
                        },
                    }
                }}
                style={{ overflow: 'hidden' }}
            >
                <motion.div
                    {...layout.content}
                    initial={{ y: 10, opacity: 0 }}
                    animate={{ y: 0, opacity: 1 }}
                    exit={{ y: -10, opacity: 0 }}
                    transition={{ 
                        ...springs.expand,
                        delay: opened ? 0.15 : 0,
                        opacity: {
                            duration: presets.expand.duration,
                            ease: presets.expand.ease
                        }
                    }}
                >
                    {children}
                </motion.div>
            </MotionCollapse>
        </AnimatePresence>
    );
}

export default Collapse;
