import React from 'react';
import { JsonInput as MantineJsonInput } from '@mantine/core';

function JsonInput({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        placeholder,
        validationError,
        formatOnBlur,
        autosize,
        minRows,
        variant,
        size,
        radius,
        disabled,
        value,
        defaultValue,
        required,
        withAsterisk,
    } = mingleData;

    return (
        <MantineJsonInput
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            validationError={validationError}
            formatOnBlur={formatOnBlur}
            autosize={autosize}
            minRows={minRows}
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            required={required}
            withAsterisk={withAsterisk}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default JsonInput;
