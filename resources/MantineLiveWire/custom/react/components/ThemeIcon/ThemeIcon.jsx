import React from 'react';
import { ThemeIcon as MantineThemeIcon } from '@mantine/core';

function ThemeIcon({ wire, mingleData, children }) {
    const {
        size,
        radius,
        variant,
        gradient,
        color,
        autoContrast,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineThemeIcon
            size={size}
            radius={radius}
            variant={variant}
            gradient={gradient}
            color={color}
            autoContrast={autoContrast}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineThemeIcon>
    );
}

export default ThemeIcon;
