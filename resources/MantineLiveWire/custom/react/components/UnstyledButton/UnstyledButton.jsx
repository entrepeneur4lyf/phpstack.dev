import React from 'react';
import { UnstyledButton as MantineUnstyledButton } from '@mantine/core';

function UnstyledButton({ wire, mingleData, children }) {
    const {
        component,
        onClick,
        href,
        target,
        rel,
        type,
        disabled,
        tabIndex,
        role,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineUnstyledButton
            component={component}
            onClick={onClick ? () => wire.emit('click') : undefined}
            href={href}
            target={target}
            rel={rel}
            type={type}
            disabled={disabled}
            tabIndex={tabIndex}
            role={role}
            aria-label={ariaLabel}
        >
            {children}
        </MantineUnstyledButton>
    );
}

export default UnstyledButton;
