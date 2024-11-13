import React from 'react';
import { Textarea as MantineTextarea } from '@mantine/core';

function Textarea({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        variant,
        size,
        radius,
        withAsterisk,
        autosize,
        minRows,
        maxRows,
        resize,
        disabled,
        value,
        defaultValue,
        placeholder,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantineTextarea
            label={label}
            description={description}
            error={error}
            variant={variant}
            size={size}
            radius={radius}
            withAsterisk={withAsterisk}
            autosize={autosize}
            minRows={minRows}
            maxRows={maxRows}
            resize={resize}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            placeholder={placeholder}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
            onChange={(event) => wire.emit('change', event.currentTarget.value)}
        />
    );
}

export default Textarea;
