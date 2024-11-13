import React from 'react';
import { Grid as MantineGrid } from '@mantine/core';

function Col({ wire, mingleData, children }) {
    const {
        span,
        xs,
        sm,
        md,
        lg,
        xl,
        offset,
        order,
        grow,
    } = mingleData;

    return (
        <MantineGrid.Col
            span={span}
            xs={xs}
            sm={sm}
            md={md}
            lg={lg}
            xl={xl}
            offset={offset}
            order={order}
            grow={grow}
        >
            {children}
        </MantineGrid.Col>
    );
}

export default Col;
