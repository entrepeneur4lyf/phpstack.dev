import React from 'react';
import { Notifications as MantineNotifications } from '@mantine/notifications';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionNotifications = motion(MantineNotifications);

function Notifications({ wire, mingleData }) {
    const {
        position = 'top-right',
        autoClose = 4000,
        limit = 5,
        zIndex = 9999,
        containerWidth = 440,
        notificationMaxHeight = 200,
        transitionDuration = presets.notification.duration * 1000, // Convert to ms
        classNames,
        styles,
    } = mingleData;

    // Get position-based animation
    const getPositionAnimation = () => {
        const [vertical, horizontal] = position.split('-');
        const xOffset = horizontal === 'right' ? 20 : -20;
        const yOffset = vertical === 'top' ? -20 : 20;

        return {
            initial: { opacity: 0, x: xOffset, y: yOffset },
            animate: { opacity: 1, x: 0, y: 0 },
            exit: { opacity: 0, x: xOffset, y: yOffset },
        };
    };

    return (
        <AnimatePresence mode="wait">
            <MotionNotifications
                position={position}
                autoClose={autoClose}
                limit={limit}
                zIndex={zIndex}
                containerWidth={containerWidth}
                notificationMaxHeight={notificationMaxHeight}
                transitionDuration={transitionDuration}
                classNames={{
                    ...classNames,
                    notification: `${classNames?.notification || ''} notification-animated`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        position: 'fixed',
                    },
                    notification: {
                        ...styles?.notification,
                        transition: `all ${presets.notification.duration}s ${presets.notification.ease}`,
                    },
                }}
                {...getPositionAnimation()}
                transition={{
                    ...springs.notification,
                    staggerChildren: 0.1,
                }}
            />
        </AnimatePresence>
    );
}

// Add position variants
Notifications.TopRight = function TopRightNotifications(props) {
    return (
        <Notifications
            {...props}
            mingleData={{
                ...props.mingleData,
                position: 'top-right',
            }}
        />
    );
};

Notifications.TopLeft = function TopLeftNotifications(props) {
    return (
        <Notifications
            {...props}
            mingleData={{
                ...props.mingleData,
                position: 'top-left',
            }}
        />
    );
};

Notifications.BottomRight = function BottomRightNotifications(props) {
    return (
        <Notifications
            {...props}
            mingleData={{
                ...props.mingleData,
                position: 'bottom-right',
            }}
        />
    );
};

Notifications.BottomLeft = function BottomLeftNotifications(props) {
    return (
        <Notifications
            {...props}
            mingleData={{
                ...props.mingleData,
                position: 'bottom-left',
            }}
        />
    );
};

export default Notifications;
