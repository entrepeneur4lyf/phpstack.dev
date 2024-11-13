import React from 'react';
import { Modal as MantineModal } from '@mantine/core';

function Modal({ wire, mingleData, children }) {
    const {
        opened,
        onClose,
        title,
        centered,
        withCloseButton,
        closeButtonProps,
        overlayProps,
        size,
        fullScreen,
        transitionProps,
        xOffset,
        yOffset,
        radius,
        scrollAreaComponent,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        returnFocus,
        removeScrollProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineModal
            opened={opened}
            onClose={onClose ? () => wire.emit('close') : undefined}
            title={title}
            centered={centered}
            withCloseButton={withCloseButton}
            closeButtonProps={closeButtonProps}
            overlayProps={overlayProps}
            size={size}
            fullScreen={fullScreen}
            transitionProps={transitionProps}
            xOffset={xOffset}
            yOffset={yOffset}
            radius={radius}
            scrollAreaComponent={scrollAreaComponent}
            trapFocus={trapFocus}
            closeOnEscape={closeOnEscape}
            closeOnClickOutside={closeOnClickOutside}
            returnFocus={returnFocus}
            removeScrollProps={removeScrollProps}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineModal>
    );
}

Modal.Root = function ModalRoot({ wire, mingleData, children }) {
    const {
        opened,
        onClose,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        returnFocus,
        removeScrollProps,
    } = mingleData;

    return (
        <MantineModal.Root
            opened={opened}
            onClose={onClose ? () => wire.emit('close') : undefined}
            trapFocus={trapFocus}
            closeOnEscape={closeOnEscape}
            closeOnClickOutside={closeOnClickOutside}
            returnFocus={returnFocus}
            removeScrollProps={removeScrollProps}
        >
            {children}
        </MantineModal.Root>
    );
};

Modal.Overlay = function ModalOverlay({ wire, mingleData }) {
    return <MantineModal.Overlay {...mingleData} />;
};

Modal.Content = function ModalContent({ wire, mingleData, children }) {
    return (
        <MantineModal.Content {...mingleData}>
            {children}
        </MantineModal.Content>
    );
};

Modal.Header = function ModalHeader({ wire, mingleData, children }) {
    return (
        <MantineModal.Header>
            {children}
        </MantineModal.Header>
    );
};

Modal.Title = function ModalTitle({ wire, mingleData, children }) {
    return (
        <MantineModal.Title>
            {children}
        </MantineModal.Title>
    );
};

Modal.CloseButton = function ModalCloseButton({ wire, mingleData }) {
    return <MantineModal.CloseButton {...mingleData} />;
};

Modal.Body = function ModalBody({ wire, mingleData, children }) {
    return (
        <MantineModal.Body>
            {children}
        </MantineModal.Body>
    );
};

export default Modal;
