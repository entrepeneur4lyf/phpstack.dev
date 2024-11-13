import React from 'react';
import { Notification as MantineNotification } from '@mantine/core';

function Notification({ wire, mingleData, children }) {
    const {
        title,
        loading,
        withCloseButton,
        withBorder,
        icon,
        color,
        radius,
        onClose,
        closeButtonProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineNotification
            title={title}
            loading={loading}
            withCloseButton={withCloseButton}
            withBorder={withBorder}
            icon={icon}
            color={color}
            radius={radius}
            onClose={onClose ? () => wire.emit('close') : undefined}
            closeButtonProps={closeButtonProps}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineNotification>
    );
}

export default Notification;
