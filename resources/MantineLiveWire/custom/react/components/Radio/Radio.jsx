import React from 'react';
import { Radio as MantineRadio } from '@mantine/core';

function Radio({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        labelPosition,
        size,
        color,
        variant,
        checked,
        icon,
        iconColor,
        disabled,
        value,
        defaultValue,
        wrapperProps,
        name,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineRadio
            label={label}
            description={description}
            error={error}
            labelPosition={labelPosition}
            size={size}
            color={color}
            variant={variant}
            checked={checked}
            icon={icon}
            iconColor={iconColor}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            wrapperProps={wrapperProps}
            name={name}
            aria-label={ariaLabel}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
        >
            {children}
        </MantineRadio>
    );
}

export default Radio;
