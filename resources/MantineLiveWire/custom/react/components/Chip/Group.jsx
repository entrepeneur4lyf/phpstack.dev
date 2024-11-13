import React from 'react';
import { Chip as MantineChip } from '@mantine/core';

function ChipGroup({ wire, mingleData, children }) {
    const {
        multiple,
        value,
        defaultValue,
    } = mingleData;

    return (
        <MantineChip.Group
            multiple={multiple}
            value={value}
            defaultValue={defaultValue}
            onChange={(value) => wire.emit('change', value)}
        >
            {children}
        </MantineChip.Group>
    );
}

export default ChipGroup;
