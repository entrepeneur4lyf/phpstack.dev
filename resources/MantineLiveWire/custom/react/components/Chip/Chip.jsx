import React from 'react';
import { Chip as MantineChip } from '@mantine/core';

function Chip({ wire, mingleData, children }) {
    const {
        color,
        variant,
        size,
        radius,
        checked,
        defaultChecked,
        disabled,
        value,
        icon,
        wrapperProps,
    } = mingleData;

    return (
        <MantineChip
            color={color}
            variant={variant}
            size={size}
            radius={radius}
            checked={checked}
            defaultChecked={defaultChecked}
            disabled={disabled}
            value={value}
            icon={icon}
            wrapperProps={wrapperProps}
            onChange={(checked) => wire.emit('change', checked)}
        >
            {children}
        </MantineChip>
    );
}

export default Chip;
