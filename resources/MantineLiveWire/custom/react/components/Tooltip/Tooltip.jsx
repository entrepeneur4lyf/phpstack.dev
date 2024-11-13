import React from 'react';
import { Tooltip as MantineTooltip } from '@mantine/core';

function Tooltip({ wire, mingleData, children }) {
    const {
        label,
        color,
        position,
        offset,
        withArrow,
        arrowSize,
        arrowRadius,
        arrowPosition,
        arrowOffset,
        opened,
        events,
        multiline,
        width,
        inline,
        transitionProps,
        openDelay,
        closeDelay,
        refProp,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTooltip
            label={label}
            color={color}
            position={position}
            offset={offset}
            withArrow={withArrow}
            arrowSize={arrowSize}
            arrowRadius={arrowRadius}
            arrowPosition={arrowPosition}
            arrowOffset={arrowOffset}
            opened={opened}
            events={events}
            multiline={multiline}
            width={width}
            inline={inline}
            transitionProps={transitionProps}
            openDelay={openDelay}
            closeDelay={closeDelay}
            refProp={refProp}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTooltip>
    );
}

Tooltip.Group = function TooltipGroup({ wire, mingleData, children }) {
    const { openDelay, closeDelay } = mingleData;

    return (
        <MantineTooltip.Group
            openDelay={openDelay}
            closeDelay={closeDelay}
        >
            {children}
        </MantineTooltip.Group>
    );
};

Tooltip.Floating = function TooltipFloating({ wire, mingleData, children }) {
    const {
        label,
        color,
        offset,
        position,
        withArrow,
        arrowSize,
        arrowRadius,
        arrowPosition,
        arrowOffset,
        transitionProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTooltip.Floating
            label={label}
            color={color}
            offset={offset}
            position={position}
            withArrow={withArrow}
            arrowSize={arrowSize}
            arrowRadius={arrowRadius}
            arrowPosition={arrowPosition}
            arrowOffset={arrowOffset}
            transitionProps={transitionProps}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTooltip.Floating>
    );
};

export default Tooltip;
