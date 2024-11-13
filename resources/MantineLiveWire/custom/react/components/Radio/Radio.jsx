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

Radio.Group = function RadioGroup({ wire, mingleData, children }) {
    const {
        name,
        label,
        description,
        error,
        withAsterisk,
        value,
        defaultValue,
        size,
        color,
        variant,
        labelPosition,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineRadio.Group
            name={name}
            label={label}
            description={description}
            error={error}
            withAsterisk={withAsterisk}
            value={value}
            defaultValue={defaultValue}
            size={size}
            color={color}
            variant={variant}
            labelPosition={labelPosition}
            aria-label={ariaLabel}
            onChange={(value) => wire.emit('change', value)}
        >
            {children}
        </MantineRadio.Group>
    );
};

Radio.Card = function RadioCard({ wire, mingleData, children }) {
    const {
        radius,
        checked,
        value,
        defaultValue,
        name,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantineRadio.Card
            radius={radius}
            checked={checked}
            value={value}
            defaultValue={defaultValue}
            name={name}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
            onClick={() => wire.emit('click', checked)}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
        >
            {children}
        </MantineRadio.Card>
    );
};

Radio.Indicator = function RadioIndicator({ wire, mingleData }) {
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
};

export default Radio;
