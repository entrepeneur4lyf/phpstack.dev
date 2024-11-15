import React from 'react';
import { Tooltip as MantineTooltip } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs } from '../../utils/animations';

// Motion-enhanced tooltip
const MotionTooltip = motion(MantineTooltip);
const MotionFloating = motion(MantineTooltip.Floating);

function Tooltip({ wire, mingleData, children }) {
    const {
        label,
        color,
        position = 'top',
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
        <MotionTooltip
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
            transitionProps={{ duration: 0 }} // Disable Mantine's transitions
            openDelay={openDelay}
            closeDelay={closeDelay}
            refProp={refProp}
            classNames={classNames}
            styles={{
                ...styles,
                tooltip: {
                    ...styles?.tooltip,
                    transition: 'none',
                },
            }}
            {...overlayAnimations.getPositionAnimation(position, 'tooltip')}
        >
            {children}
        </MotionTooltip>
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
        position = 'top',
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
        <AnimatePresence mode="wait">
            <MotionFloating
                label={label}
                color={color}
                offset={offset}
                position={position}
                withArrow={withArrow}
                arrowSize={arrowSize}
                arrowRadius={arrowRadius}
                arrowPosition={arrowPosition}
                arrowOffset={arrowOffset}
                transitionProps={{ duration: 0 }}
                classNames={classNames}
                styles={{
                    ...styles,
                    tooltip: {
                        ...styles?.tooltip,
                        transition: 'none',
                    },
                }}
                {...overlayAnimations.getPositionAnimation(position, 'tooltip')}
            >
                {children}
            </MotionFloating>
        </AnimatePresence>
    );
};

export default Tooltip;
