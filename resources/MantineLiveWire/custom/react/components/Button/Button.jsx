import React from 'react';
import { Button as MantineButton } from '@mantine/core';

function Button({ wire, mingleData, children }) {
    const {
        variant,
        color,
        size,
        radius,
        loading,
        disabled,
        leftSection,
        rightSection,
    } = mingleData;

    return (
        <MantineButton
            variant={variant}
            color={color}
            size={size}
            radius={radius}
            loading={loading}
            disabled={disabled}
            leftSection={leftSection}
            rightSection={rightSection}
        >
            {children}
        </MantineButton>
    );
}

export default Button;
