import React from 'react';
import { NativeSelect as MantineNativeSelect } from '@mantine/core';

function NativeSelect({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        placeholder,
        data,
        variant,
        size,
        radius,
        disabled,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        value,
        defaultValue,
        required,
        withAsterisk,
    } = mingleData;

    return (
        <MantineNativeSelect
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            data={data}
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            value={value}
            defaultValue={defaultValue}
            required={required}
            withAsterisk={withAsterisk}
            onChange={(event) => wire.emit('change', event.currentTarget.value)}
        >
            {children}
        </MantineNativeSelect>
    );
}

export default NativeSelect;
