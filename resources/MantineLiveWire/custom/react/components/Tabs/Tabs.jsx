import React from 'react';
import { Tabs as MantineTabs } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionTabs = motion(MantineTabs);
const MotionList = motion(MantineTabs.List);
const MotionTab = motion(MantineTabs.Tab);
const MotionPanel = motion(MantineTabs.Panel);

function Tabs({ wire, mingleData, children }) {
    const {
        value,
        defaultValue,
        onChange,
        orientation = 'horizontal',
        color,
        variant = 'default',
        radius,
        placement,
        grow,
        inverted,
        activateTabWithKeyboard = true,
        allowTabDeactivation,
        keepMounted,
        classNames,
        styles,
        // Animation props
        animate = true,
    } = mingleData;

    return (
        <MotionTabs
            value={value}
            defaultValue={defaultValue}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            orientation={orientation}
            color={color}
            variant={variant}
            radius={radius}
            placement={placement}
            grow={grow}
            inverted={inverted}
            activateTabWithKeyboard={activateTabWithKeyboard}
            allowTabDeactivation={allowTabDeactivation}
            keepMounted={keepMounted}
            classNames={{
                ...classNames,
                root: `${classNames?.root || ''} ${animate ? 'animated-tabs' : ''}`,
            }}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    position: 'relative',
                    overflow: 'hidden',
                },
            }}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.input}
        >
            {children}
        </MotionTabs>
    );
}

Tabs.List = function TabsList({ wire, mingleData, children }) {
    const {
        grow,
        justify,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MotionList
            grow={grow}
            justify={justify}
            aria-label={ariaLabel}
            layout
            transition={springs.input}
        >
            {children}
            <motion.div
                className="tabs-indicator"
                layoutId="tabs-indicator"
                transition={springs.input}
                style={{
                    position: 'absolute',
                    bottom: 0,
                    height: 2,
                    backgroundColor: 'currentColor',
                }}
            />
        </MotionList>
    );
};

Tabs.Tab = function Tab({ wire, mingleData, children }) {
    const {
        value,
        leftSection,
        rightSection,
        color,
        disabled,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MotionTab
            value={value}
            leftSection={leftSection && (
                <motion.div
                    initial={{ scale: 0.8, opacity: 0 }}
                    animate={{ scale: 1, opacity: 1 }}
                    transition={springs.input}
                >
                    {leftSection}
                </motion.div>
            )}
            rightSection={rightSection && (
                <motion.div
                    initial={{ scale: 0.8, opacity: 0 }}
                    animate={{ scale: 1, opacity: 1 }}
                    transition={springs.input}
                >
                    {rightSection}
                </motion.div>
            )}
            color={color}
            disabled={disabled}
            aria-label={ariaLabel}
            {...(!disabled && {
                ...interactive.button,
                transition: springs.input,
            })}
        >
            <motion.div
                initial={{ opacity: 0, y: -5 }}
                animate={{ opacity: 1, y: 0 }}
                transition={springs.input}
            >
                {children}
            </motion.div>
        </MotionTab>
    );
};

Tabs.Panel = function Panel({ wire, mingleData, children }) {
    const { value } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionPanel
                value={value}
                initial={{ opacity: 0, x: 10 }}
                animate={{ opacity: 1, x: 0 }}
                exit={{ opacity: 0, x: -10 }}
                transition={springs.input}
            >
                {children}
            </MotionPanel>
        </AnimatePresence>
    );
};

// Add variants for common use cases
Tabs.Pills = function PillsTabs(props) {
    return (
        <Tabs
            {...props}
            mingleData={{
                ...props.mingleData,
                variant: 'pills',
                radius: 'xl',
            }}
        />
    );
};

Tabs.Outline = function OutlineTabs(props) {
    return (
        <Tabs
            {...props}
            mingleData={{
                ...props.mingleData,
                variant: 'outline',
                radius: 'md',
            }}
        />
    );
};

Tabs.Cards = function CardsTabs(props) {
    return (
        <Tabs
            {...props}
            mingleData={{
                ...props.mingleData,
                variant: 'default',
                radius: 'md',
                inverted: true,
            }}
        />
    );
};

export default Tabs;
