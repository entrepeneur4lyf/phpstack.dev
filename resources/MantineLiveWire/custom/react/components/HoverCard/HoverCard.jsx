import React from 'react';
import { HoverCard as MantineHoverCard } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, layout } from '../../utils/animations';

// Motion-enhanced components
const MotionDropdown = motion(MantineHoverCard.Dropdown);

function HoverCard({ wire, mingleData, children }) {
    const {
        width,
        shadow,
        openDelay,
        closeDelay,
        withArrow,
        position = 'bottom',
        offset,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineHoverCard
            width={width}
            shadow={shadow}
            openDelay={openDelay}
            closeDelay={closeDelay}
            withArrow={withArrow}
            position={position}
            offset={offset}
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
        </MantineHoverCard>
    );
}

HoverCard.Target = function HoverCardTarget({ wire, mingleData, children }) {
    return <MantineHoverCard.Target>{children}</MantineHoverCard.Target>;
};

HoverCard.Dropdown = function HoverCardDropdown({ wire, mingleData, children }) {
    const { position = 'bottom' } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionDropdown
                {...mingleData}
                {...overlayAnimations.getPositionAnimation(position, 'hover')}
            >
                <motion.div
                    {...layout.content}
                    transition={springs.snappy}
                >
                    {children}
                </motion.div>
            </MotionDropdown>
        </AnimatePresence>
    );
};

export default HoverCard;
