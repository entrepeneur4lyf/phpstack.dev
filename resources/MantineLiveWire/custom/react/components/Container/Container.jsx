import React from 'react';
import { Container as MantineContainer } from '@mantine/core';

function Container({ wire, mingleData, children }) {
    const {
        size,
        padding,
        fluid,
    } = mingleData;

    return (
        <MantineContainer
            size={size}
            padding={padding}
            fluid={fluid}
        >
            {children}
        </MantineContainer>
    );
}

export default Container;
