import React from 'react';
import { Drawer as MantineDrawer } from '@mantine/core';

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
            transitionProps={transitionProps}
            removeScrollProps={removeScrollProps}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineDrawer>
    );
}

// Compound components
Drawer.Root = function DrawerRoot({ wire, mingleData, children }) {
    return (
        <MantineDrawer.Root
            {...mingleData}
            onClose={mingleData.onClose ? () => wire.emit('close') : undefined}
        >
            {children}
        </MantineDrawer.Root>
    );
};

Drawer.Overlay = function DrawerOverlay({ wire, mingleData, children }) {
    return (
        <MantineDrawer.Overlay {...mingleData}>
            {children}
        </MantineDrawer.Overlay>
    );
};

Drawer.Content = function DrawerContent({ wire, mingleData, children }) {
    return (
        <MantineDrawer.Content {...mingleData}>
            {children}
        </MantineDrawer.Content>
    );
};

Drawer.Header = function DrawerHeader({ children }) {
    return <MantineDrawer.Header>{children}</MantineDrawer.Header>;
};

Drawer.Title = function DrawerTitle({ children }) {
    return <MantineDrawer.Title>{children}</MantineDrawer.Title>;
};

Drawer.CloseButton = function DrawerCloseButton({ wire, mingleData }) {
    return <MantineDrawer.CloseButton {...mingleData} />;
};

Drawer.Body = function DrawerBody({ children }) {
    return <MantineDrawer.Body>{children}</MantineDrawer.Body>;
};

export default Drawer;
