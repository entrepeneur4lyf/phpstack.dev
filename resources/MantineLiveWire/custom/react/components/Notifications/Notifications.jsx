import React from 'react';
import { Notifications as MantineNotifications } from '@mantine/notifications';

function Notifications({ wire, mingleData }) {
    const {
        position,
        autoClose,
        limit,
        zIndex,
        containerWidth,
        notificationMaxHeight,
        transitionDuration,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineNotifications
            position={position}
            autoClose={autoClose}
            limit={limit}
            zIndex={zIndex}
            containerWidth={containerWidth}
            notificationMaxHeight={notificationMaxHeight}
            transitionDuration={transitionDuration}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default Notifications;
