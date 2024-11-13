import React from 'react';
import { SimpleGrid as MantineSimpleGrid } from '@mantine/core';

function SimpleGrid({ wire, mingleData, children }) {
    const {
        cols,
        spacing,
        verticalSpacing,
        type,
    } = mingleData;

    return (
        <MantineSimpleGrid
            cols={cols}
            spacing={spacing}
            verticalSpacing={verticalSpacing}
            type={type}
        >
            {children}
        </MantineSimpleGrid>
    );
}

export default SimpleGrid;
