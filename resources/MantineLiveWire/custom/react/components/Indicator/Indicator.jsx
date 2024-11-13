import React from 'react';
import { Indicator as MantineIndicator } from '@mantine/core';

function Indicator({ wire, mingleData, children }) {
    const {
        position,
        offset,
        size,
        radius,
        color,
        disabled,
        processing,
        withBorder,
        inline,
        label,
        zIndex,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineIndicator
            position={position}
            offset={offset}
            size={size}
            radius={radius}
            color={color}
            disabled={disabled}
            processing={processing}
            withBorder={withBorder}
            inline={inline}
            label={label}
            zIndex={zIndex}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineIndicator>
    );
}

export default Indicator;
