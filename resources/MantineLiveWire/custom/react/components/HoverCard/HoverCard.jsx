import React from 'react';
import { HoverCard as MantineHoverCard } from '@mantine/core';

function HoverCard({ wire, mingleData, children }) {
    const {
        width,
        shadow,
        openDelay,
        closeDelay,
        withArrow,
        position,
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
            styles={styles}
        >
            {children}
        </MantineHoverCard>
    );
}

HoverCard.Target = function HoverCardTarget({ wire, mingleData, children }) {
    return <MantineHoverCard.Target>{children}</MantineHoverCard.Target>;
};

HoverCard.Dropdown = function HoverCardDropdown({ wire, mingleData, children }) {
    return <MantineHoverCard.Dropdown>{children}</MantineHoverCard.Dropdown>;
};

export default HoverCard;
