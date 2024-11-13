import React from 'react';
import { CloseButton as MantineCloseButton } from '@mantine/core';

function CloseButton({ wire, mingleData, children }) {
    const {
        variant,
        size,
        radius,
        icon,
        iconSize,
        disabled,
        onClick,
        'aria-label': ariaLabel,
        component,
        href,
        target,
        rel,
    } = mingleData;

    return (
        <MantineCloseButton
            variant={variant}
            size={size}
            radius={radius}
            icon={icon}
            iconSize={iconSize}
            disabled={disabled}
            onClick={onClick ? () => wire.emit('click') : undefined}
            aria-label={ariaLabel}
            component={component}
            href={href}
            target={target}
            rel={rel}
        >
            {children}
        </MantineCloseButton>
    );
}

export default CloseButton;
