import React from 'react';
import { PinInput as MantinePinInput } from '@mantine/core';

function PinInput({ wire, mingleData }) {
    const {
        size,
        length,
        mask,
        placeholder,
        disabled,
        error,
        type,
        inputType,
        inputMode,
        oneTimeCode,
        value,
        defaultValue,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantinePinInput
            size={size}
            length={length}
            mask={mask}
            placeholder={placeholder}
            disabled={disabled}
            error={error}
            type={type}
            inputType={inputType}
            inputMode={inputMode}
            oneTimeCode={oneTimeCode}
            value={value}
            defaultValue={defaultValue}
            aria-label={ariaLabel}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default PinInput;
