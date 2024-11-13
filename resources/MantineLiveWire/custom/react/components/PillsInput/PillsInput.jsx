import React from 'react';
import { PillsInput as MantinePillsInput } from '@mantine/core';

function PillsInput({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        variant,
        size,
        radius,
        withAsterisk,
        onClick,
        onFocus,
        onBlur,
        placeholder,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantinePillsInput
            label={label}
            description={description}
            error={error}
            variant={variant}
            size={size}
            radius={radius}
            withAsterisk={withAsterisk}
            onClick={onClick ? () => wire.emit('click') : undefined}
            onFocus={onFocus ? () => wire.emit('focus') : undefined}
            onBlur={onBlur ? () => wire.emit('blur') : undefined}
            placeholder={placeholder}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
        >
            {children}
        </MantinePillsInput>
    );
}

PillsInput.Field = function PillsInputField({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        placeholder,
        onChange,
        onKeyDown,
        onFocus,
        onBlur,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantinePillsInput.Field
            value={value}
            defaultValue={defaultValue}
            placeholder={placeholder}
            onChange={onChange ? (event) => wire.emit('change', event.currentTarget.value) : undefined}
            onKeyDown={onKeyDown ? (event) => wire.emit('keyDown', event.key) : undefined}
            onFocus={onFocus ? () => wire.emit('focus') : undefined}
            onBlur={onBlur ? () => wire.emit('blur') : undefined}
            aria-label={ariaLabel}
        />
    );
};

export default PillsInput;
