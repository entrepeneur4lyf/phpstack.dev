import React from 'react';
import { DatesProvider as MantineDatesProvider } from '@mantine/dates';

function DatesProvider({ wire, mingleData, children }) {
    const {
        settings,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDatesProvider
            settings={settings}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineDatesProvider>
    );
}

export default DatesProvider;
