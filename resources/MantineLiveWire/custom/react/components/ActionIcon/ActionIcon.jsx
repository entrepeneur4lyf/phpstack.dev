import React from 'react';
import { ActionIcon as MantineActionIcon } from '@mantine/core';

function ActionIcon({ wire, mingleData, children }) {
    const {
        variant,
        color,
        gradient,
        size,
        radius,
        disabled,
        loading,
        loaderProps,
        autoContrast,
        component,
        'aria-label': ariaLabel,
        onClick,
        href,
        target,
        rel,
    } = mingleData;

    return (
        <MantineActionIcon
            variant={variant}
            color={color}
            gradient={gradient}
            size={size}
            radius={radius}
            disabled={disabled}
            loading={loading}
            loaderProps={loaderProps}
            autoContrast={autoContrast}
            component={component}
            aria-label={ariaLabel}
            onClick={onClick ? () => wire.emit('click') : undefined}
            href={href}
            target={target}
            rel={rel}
        >
            {children}
        </MantineActionIcon>
    );
}

ActionIcon.Group = function ActionIconGroup({ mingleData, children }) {
    const { orientation, borderWidth } = mingleData;

    return (
        <MantineActionIcon.Group
            orientation={orientation}
            borderWidth={borderWidth}
        >
            {children}
        </MantineActionIcon.Group>
    );
};

export default ActionIcon;
