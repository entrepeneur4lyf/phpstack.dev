import React from 'react';
import { Dialog as MantineDialog } from '@mantine/core';

function Dialog({ wire, mingleData, children }) {
    const {
        opened,
        position,
        size,
        radius,
        withCloseButton,
        onClose,
        withBorder,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDialog
            opened={opened}
            position={position}
            size={size}
            radius={radius}
            withCloseButton={withCloseButton}
            onClose={onClose ? () => wire.emit('close') : undefined}
            withBorder={withBorder}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineDialog>
    );
}

export default Dialog;
