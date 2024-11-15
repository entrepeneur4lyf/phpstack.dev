import React from 'react';
import { Accordion as MantineAccordion } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionItem = motion(MantineAccordion.Item);
const MotionControl = motion(MantineAccordion.Control);
const MotionPanel = motion(MantineAccordion.Panel);
const MotionChevron = motion.div;

function Accordion({ wire, mingleData, children }) {
    const {
        value,
        defaultValue,
        onChange,
        multiple,
        variant,
        radius,
        chevronPosition,
        disableChevronRotation,
        chevron,
        order,
        transitionDuration,
        unstyled,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAccordion
            value={value}
            defaultValue={defaultValue}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            multiple={multiple}
            variant={variant}
            radius={radius}
            chevronPosition={chevronPosition}
            disableChevronRotation={true} // We'll handle chevron rotation with Motion
            chevron={
                !disableChevronRotation && (
                    <MotionChevron
                        initial={false}
                        animate={{ rotate: value ? 180 : 0 }}
                        transition={springs.input} // Use input preset for smooth rotation
                    >
                        {chevron}
                    </MotionChevron>
                )
            }
            order={order}
            transitionDuration={0} // Disable Mantine's transitions
            unstyled={unstyled}
            classNames={classNames}
            styles={{
                ...styles,
                content: {
                    ...styles?.content,
                    transition: 'none',
                },
            }}
        >
            {children}
        </MantineAccordion>
    );
}

Accordion.Item = function AccordionItem({ wire, mingleData, children }) {
    const { value } = mingleData;

    return (
        <MotionItem
            value={value}
            {...layout.default}
            transition={springs.expand} // Use expand preset for layout changes
        >
            {children}
        </MotionItem>
    );
};

Accordion.Control = function AccordionControl({ wire, mingleData, children }) {
    const { icon, disabled } = mingleData;

    return (
        <MotionControl
            icon={icon}
            disabled={disabled}
            {...(disabled ? {} : interactive.button)}
            whileHover={disabled ? {} : { x: 4 }}
            transition={springs.input} // Use input preset for interactions
        >
            {children}
        </MotionControl>
    );
};

Accordion.Panel = function AccordionPanel({ wire, mingleData, children }) {
    return (
        <AnimatePresence mode="wait">
            <MotionPanel
                {...layout.content}
                initial={{ height: 0, opacity: 0 }}
                animate={{ 
                    height: 'auto',
                    opacity: 1,
                    transition: {
                        height: springs.expand,
                        opacity: { 
                            duration: presets.expand.duration,
                            delay: 0.1,
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
                    initial={{ y: 10, opacity: 0 }}
                    animate={{ y: 0, opacity: 1 }}
                    exit={{ y: -10, opacity: 0 }}
                    transition={{ 
                        ...springs.expand,
                        delay: 0.1,
                        opacity: {
                            duration: presets.expand.duration,
                            ease: presets.expand.ease
                        }
                    }}
                >
                    {children}
                </motion.div>
            </MotionPanel>
        </AnimatePresence>
    );
};

export default Accordion;
