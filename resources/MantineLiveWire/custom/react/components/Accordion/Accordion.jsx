import React from 'react';
import { Accordion as MantineAccordion } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout } from '../../utils/animations';

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
                        transition={springs.snappy}
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
                    transition: 'none', // Remove Mantine's transitions
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
            whileHover={disabled ? {} : { x: 4 }} // Additional indent on hover
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
                        height: springs.default,
                        opacity: { duration: 0.2, delay: 0.1 },
                    }
                }}
                exit={{ 
                    height: 0,
                    opacity: 0,
                    transition: {
                        height: springs.default,
                        opacity: { duration: 0.1 },
                    }
                }}
                style={{ overflow: 'hidden' }}
            >
                <motion.div
                    initial={{ y: 10, opacity: 0 }}
                    animate={{ y: 0, opacity: 1 }}
                    exit={{ y: -10, opacity: 0 }}
                    transition={{ ...springs.default, delay: 0.1 }}
                >
                    {children}
                </motion.div>
            </MotionPanel>
        </AnimatePresence>
    );
};

export default Accordion;
