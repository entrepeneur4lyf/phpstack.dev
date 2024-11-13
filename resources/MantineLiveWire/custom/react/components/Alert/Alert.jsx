import React from 'react';
import { Alert as MantineAlert } from '@mantine/core';

function Alert({ wire, mingleData, children }) {
    const {
        title,
        icon,
        variant,
        color,
        radius,
        withCloseButton,
        closeButtonLabel,
        onClose,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAlert
            title={title}
            icon={icon}
            variant={variant}
            color={color}
            radius={radius}
            withCloseButton={withCloseButton}
            closeButtonLabel={closeButtonLabel}
            onClose={onClose ? () => wire.emit('close') : undefined}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineAlert>
    );
}

export default Alert;
