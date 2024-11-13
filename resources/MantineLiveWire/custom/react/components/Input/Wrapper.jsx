import React from 'react';
import { Input as MantineInput } from '@mantine/core';

function Wrapper({ wire, mingleData, children }) {
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
}

export default Wrapper;
