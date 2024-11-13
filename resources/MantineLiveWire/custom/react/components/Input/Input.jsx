import React from 'react';
import { Input as MantineInput } from '@mantine/core';

function Input({ wire, mingleData, children }) {
    const {
        variant,
        size,
        radius,
        disabled,
        error,
        component,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        pointer,
        wrapperProps,
    } = mingleData;

    return (
        <MantineInput
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            error={error}
            component={component}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            pointer={pointer}
            wrapperProps={wrapperProps}
            onChange={(event) => wire.emit('change', event.currentTarget.value)}
        >
            {children}
        </MantineInput>
    );
}

export default Input;
