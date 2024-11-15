import React from 'react';
import { Popover as MantinePopover } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, layout } from '../../utils/animations';

// Motion-enhanced components
const MotionDropdown = motion(MantinePopover.Dropdown);

function Popover({ wire, mingleData, children }) {
    const {
        opened,
        onChange,
        width,
        position = 'bottom',
        offset,
        withArrow,
        arrowSize,
        arrowRadius,
        arrowPosition,
        arrowOffset,
        middlewares,
        disabled,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        clickOutsideEvents,
        shadow,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantinePopover
            opened={opened}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            width={width}
            position={position}
            offset={offset}
            withArrow={withArrow}
            arrowSize={arrowSize}
            arrowRadius={arrowRadius}
            arrowPosition={arrowPosition}
            arrowOffset={arrowOffset}
            middlewares={middlewares}
            disabled={disabled}
            trapFocus={trapFocus}
            closeOnEscape={closeOnEscape}
            closeOnClickOutside={closeOnClickOutside}
            clickOutsideEvents={clickOutsideEvents}
            shadow={shadow}
            classNames={classNames}
            styles={{
                ...styles,
                dropdown: {
                    ...styles?.dropdown,
                    // Remove Mantine's transitions
                    transition: 'none',
                },
            }}
            transitionProps={{ duration: 0 }} // Disable Mantine's transitions
        >
            {children}
        </MantinePopover>
    );
}

Popover.Target = function PopoverTarget({ wire, mingleData, children }) {
    return <MantinePopover.Target>{children}</MantinePopover.Target>;
};

Popover.Dropdown = function PopoverDropdown({ wire, mingleData, children }) {
    const { position = 'bottom' } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionDropdown
                {...mingleData}
                {...overlayAnimations.getPositionAnimation(position, 'popover')}
            >
                <motion.div
                    {...layout.content}
                >
                    {children}
                </motion.div>
            </MotionDropdown>
        </AnimatePresence>
    );
};

export default Popover;
