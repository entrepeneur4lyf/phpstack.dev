import React from 'react';
import { Pill as MantinePill } from '@mantine/core';

function Pill({ wire, mingleData, children }) {
    const {
        withRemoveButton,
        onRemove,
        size,
        removeButtonProps,
    } = mingleData;

    return (
        <MantinePill
            withRemoveButton={withRemoveButton}
            onRemove={onRemove ? () => wire.emit('remove') : undefined}
            size={size}
            removeButtonProps={removeButtonProps}
        >
            {children}
        </MantinePill>
    );
}

Pill.Group = function PillGroup({ children }) {
    return <MantinePill.Group>{children}</MantinePill.Group>;
};

export default Pill;
