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

Chip.Group = function ChipGroup({ wire, mingleData, children }) {
    const {
        multiple,
        value,
        defaultValue,
    } = mingleData;

    return (
        <MantineChip.Group
            multiple={multiple}
            value={value}
            defaultValue={defaultValue}
            onChange={(value) => wire.emit('change', value)}
        >
            {children}
        </MantineChip.Group>
    );
};

export default Chip;
