import React from 'react';
import { TypographyStylesProvider as MantineTypographyStylesProvider } from '@mantine/core';

function TypographyStylesProvider({ wire, mingleData, children }) {
    const {
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTypographyStylesProvider
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTypographyStylesProvider>
    );
}

export default TypographyStylesProvider;
