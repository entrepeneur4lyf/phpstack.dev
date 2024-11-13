import React from 'react';
import { Radio as MantineRadio } from '@mantine/core';

function Indicator({ wire, mingleData }) {
    const {
        checked,
        disabled,
        size,
        color,
        variant,
        icon,
        iconColor,
    } = mingleData;

    return (
        <MantineRadio.Indicator
            checked={checked}
            disabled={disabled}
            size={size}
            color={color}
            variant={variant}
            icon={icon}
            iconColor={iconColor}
        />
    );
}

export default Indicator;
