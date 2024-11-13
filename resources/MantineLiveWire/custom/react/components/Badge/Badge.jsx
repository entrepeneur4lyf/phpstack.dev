import React from 'react';
import { Badge as MantineBadge } from '@mantine/core';

function Badge({ wire, mingleData, children }) {
    const {
        color,
        variant,
        size,
        radius,
        gradient,
        leftSection,
        rightSection,
        circle,
        fullWidth,
        autoContrast,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBadge
            color={color}
            variant={variant}
            size={size}
            radius={radius}
            gradient={gradient}
            leftSection={leftSection}
            rightSection={rightSection}
            circle={circle}
            fullWidth={fullWidth}
            autoContrast={autoContrast}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineBadge>
    );
}

export default Badge;
