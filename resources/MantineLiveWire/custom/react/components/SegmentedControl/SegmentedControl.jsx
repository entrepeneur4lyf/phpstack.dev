import React from 'react';
import { SegmentedControl as MantineSegmentedControl } from '@mantine/core';

function SegmentedControl({ wire, mingleData }) {
    const {
        data,
        orientation,
        fullWidth,
        withItemsBorders,
        size,
        radius,
        color,
        transitionDuration,
        transitionTimingFunction,
        readOnly,
        disabled,
        value,
        defaultValue,
    } = mingleData;

    return (
        <MantineSegmentedControl
            data={data}
            orientation={orientation}
            fullWidth={fullWidth}
            withItemsBorders={withItemsBorders}
            size={size}
            radius={radius}
            color={color}
            transitionDuration={transitionDuration}
            transitionTimingFunction={transitionTimingFunction}
            readOnly={readOnly}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default SegmentedControl;
