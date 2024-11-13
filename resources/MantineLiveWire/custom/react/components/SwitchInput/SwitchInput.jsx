import React from 'react';
import { Switch } from '@mantine/core';

function SwitchInput({ wire, mingleData }) {
    const {
        checked,
        defaultChecked,
        label,
        description,
        error,
        labelPosition,
        color,
        size,
        radius,
        disabled,
        onLabel,
        offLabel,
        thumbIcon,
        wrapperProps,
        value,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <Switch
            checked={checked}
            defaultChecked={defaultChecked}
            label={label}
            description={description}
            error={error}
            labelPosition={labelPosition}
            color={color}
            size={size}
            radius={radius}
            disabled={disabled}
            onLabel={onLabel}
            offLabel={offLabel}
            thumbIcon={thumbIcon}
            wrapperProps={wrapperProps}
            value={value}
            aria-label={ariaLabel}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
        />
    );
}

export default SwitchInput;
