import React from 'react';
import { PasswordInput as MantinePasswordInput } from '@mantine/core';

function PasswordInput({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        placeholder,
        visible,
        visibilityToggleIcon,
        visibilityToggleButtonProps,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
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
        <MantinePasswordInput
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            visible={visible}
            visibilityToggleIcon={visibilityToggleIcon}
            visibilityToggleButtonProps={visibilityToggleButtonProps}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            required={required}
            withAsterisk={withAsterisk}
            onChange={(event) => wire.emit('change', event.currentTarget.value)}
            onVisibilityChange={(visible) => wire.emit('visibilityChange', visible)}
        />
    );
}

export default PasswordInput;
