import React from 'react';
import { Grid as MantineGrid } from '@mantine/core';

function Grid({ wire, mingleData, children }) {
    const {
        gutter,
        columns,
        grow,
        justify,
        align,
    } = mingleData;

    return (
        <MantineGrid
            gutter={gutter}
            columns={columns}
            grow={grow}
            justify={justify}
            align={align}
        >
            {children}
        </MantineGrid>
    );
}

export default Grid;
