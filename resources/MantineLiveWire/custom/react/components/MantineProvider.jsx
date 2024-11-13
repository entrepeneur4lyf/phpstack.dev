import React from 'react';
import { MantineProvider as BaseMantineProvider } from '@mantine/core';

function MantineProvider({ theme = {}, children }) {
    return (
        <BaseMantineProvider theme={theme}>
            {children}
        </BaseMantineProvider>
    );
}

export default MantineProvider;
