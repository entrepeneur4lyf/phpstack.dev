import React from 'react';
import { Checkbox as MantineCheckbox } from '@mantine/core';

function Checkbox({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        color,
        variant,
        radius,
        size,
        disabled,
        indeterminate,
        labelPosition,
        iconColor,
        checked,
        defaultChecked,
        wrapperProps,
    } = mingleData;

    return (
        <MantineCheckbox
            label={label}
            description={description}
            error={error}
            color={color}
            variant={variant}
            radius={radius}
            size={size}
            disabled={disabled}
            indeterminate={indeterminate}
            labelPosition={labelPosition}
            iconColor={iconColor}
            checked={checked}
            defaultChecked={defaultChecked}
            wrapperProps={wrapperProps}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
        >
            {children}
        </MantineCheckbox>
    );
}

export default Checkbox;
