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

Input.Wrapper = function InputWrapper({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        required,
        withAsterisk,
        labelElement,
        size,
        inputWrapperOrder,
        inputContainer,
        withErrorStyles,
    } = mingleData;

    return (
        <MantineInput.Wrapper
            label={label}
            description={description}
            error={error}
            required={required}
            withAsterisk={withAsterisk}
            labelElement={labelElement}
            size={size}
            inputWrapperOrder={inputWrapperOrder}
            inputContainer={inputContainer}
            withErrorStyles={withErrorStyles}
        >
            {children}
        </MantineInput.Wrapper>
    );
};

export default Input;
