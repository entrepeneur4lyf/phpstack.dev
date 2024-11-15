import React from 'react';
import { Drawer as MantineDrawer } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, interactive, layout } from '../../utils/animations';

// Motion-enhanced components
const MotionOverlay = motion(MantineDrawer.Overlay);
const MotionContent = motion(MantineDrawer.Content);
const MotionHeader = motion(MantineDrawer.Header);
const MotionBody = motion(MantineDrawer.Body);

function Drawer({ wire, mingleData, children }) {
    const {
        opened,
        onClose,
        title,
        position,
        size,
        offset,
        radius,
        overlayProps,
        withCloseButton,
        closeButtonProps,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        returnFocus,
        scrollAreaComponent,
        transitionProps,
        removeScrollProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDrawer
            opened={opened}
            onClose={onClose ? () => wire.emit('close') : undefined}
            title={title}
            position={position}
            size={size}
            offset={offset}
            radius={radius}
            overlayProps={overlayProps}
            withCloseButton={withCloseButton}
            closeButtonProps={closeButtonProps}
            trapFocus={trapFocus}
            closeOnEscape={closeOnEscape}
            closeOnClickOutside={closeOnClickOutside}
            returnFocus={returnFocus}
            scrollAreaComponent={scrollAreaComponent}
            transitionProps={{ duration: 0 }} // Disable Mantine's transitions
            removeScrollProps={removeScrollProps}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    zIndex: 1000,
                },
            }}
        >
            {children}
        </MantineDrawer>
    );
}

// Compound components
Drawer.Root = function DrawerRoot({ wire, mingleData, children }) {
    return (
        <AnimatePresence mode="wait">
            {mingleData.opened && (
                <MantineDrawer.Root
                    {...mingleData}
                    onClose={mingleData.onClose ? () => wire.emit('close') : undefined}
                    transitionProps={{ duration: 0 }}
                >
                    {children}
                </MantineDrawer.Root>
            )}
        </AnimatePresence>
    );
};

Drawer.Overlay = function DrawerOverlay({ wire, mingleData, children }) {
    return (
        <MotionOverlay
            {...mingleData}
            {...overlayAnimations.fade}
            transition={springs.default}
        >
            {children}
        </MotionOverlay>
    );
};

Drawer.Content = function DrawerContent({ wire, mingleData, children }) {
    const { position } = mingleData;
    return (
        <MotionContent
            {...mingleData}
            {...overlayAnimations.getPositionAnimation(position, 'drawer')}
        >
            {children}
        </MotionContent>
    );
};

Drawer.Header = function DrawerHeader({ children }) {
    return (
        <MotionHeader
            {...layout.default}
        >
            {children}
        </MotionHeader>
    );
};

Drawer.Title = function DrawerTitle({ children }) {
    return (
        <motion.div
            {...layout.listItem}
        >
            <MantineDrawer.Title>{children}</MantineDrawer.Title>
        </motion.div>
    );
};

Drawer.CloseButton = function DrawerCloseButton({ wire, mingleData }) {
    return (
        <motion.div
            {...interactive.button}
        >
            <MantineDrawer.CloseButton {...mingleData} />
        </motion.div>
    );
};

Drawer.Body = function DrawerBody({ children }) {
    return (
        <MotionBody
            {...layout.content}
        >
            {children}
        </MotionBody>
    );
};

export default Drawer;
