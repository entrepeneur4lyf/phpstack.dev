import React from 'react';
import { Popover as MantinePopover } from '@mantine/core';

function Popover({ wire, mingleData, children }) {
    const {
        opened,
        onChange,
        width,
        position,
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
            styles={styles}
        >
            {children}
        </MantinePopover>
    );
}

Popover.Target = function PopoverTarget({ wire, mingleData, children }) {
    return <MantinePopover.Target>{children}</MantinePopover.Target>;
};

Popover.Dropdown = function PopoverDropdown({ wire, mingleData, children }) {
    return <MantinePopover.Dropdown>{children}</MantinePopover.Dropdown>;
};

export default Popover;
