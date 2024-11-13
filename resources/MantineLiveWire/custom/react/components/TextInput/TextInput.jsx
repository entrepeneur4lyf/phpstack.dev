import React from 'react';
import { TextInput as MantineTextInput } from '@mantine/core';

function TextInput({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        variant,
        size,
        radius,
        withAsterisk,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        disabled,
        value,
        defaultValue,
        placeholder,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantineTextInput
            label={label}
            description={description}
            error={error}
            variant={variant}
            size={size}
            radius={radius}
            withAsterisk={withAsterisk}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
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

export default TextInput;
