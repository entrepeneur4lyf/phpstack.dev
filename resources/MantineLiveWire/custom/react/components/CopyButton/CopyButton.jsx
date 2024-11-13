import React from 'react';
import { CopyButton as MantineCopyButton } from '@mantine/core';

function CopyButton({ wire, mingleData, children }) {
    const {
        value,
        timeout,
        onCopy,
    } = mingleData;

    return (
        <MantineCopyButton
            value={value}
            timeout={timeout}
            onCopy={() => onCopy && wire.emit('copy', value)}
        >
            {({ copied, copy }) => {
                // Convert the children function string into an actual function
                // that returns the JSX based on copied state
                const childrenFn = new Function('copied', 'copy', `return ${children}`);
                return childrenFn(copied, copy);
            }}
        </MantineCopyButton>
    );
}

export default CopyButton;
