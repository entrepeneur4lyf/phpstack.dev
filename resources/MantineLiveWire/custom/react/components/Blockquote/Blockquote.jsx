import React from 'react';
import { Blockquote as MantineBlockquote } from '@mantine/core';

function Blockquote({ wire, mingleData, children }) {
    const {
        cite,
        icon,
        iconSize,
        color,
        radius,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBlockquote
            cite={cite}
            icon={icon}
            iconSize={iconSize}
            color={color}
            radius={radius}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineBlockquote>
    );
}

export default Blockquote;
