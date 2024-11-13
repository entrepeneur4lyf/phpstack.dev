import React from 'react';
import { Modal as MantineModal } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, interactive, layout } from '../../utils/animations';

// Motion-enhanced components
const MotionOverlay = motion(MantineModal.Overlay);
const MotionContent = motion(MantineModal.Content);
const MotionHeader = motion(MantineModal.Header);
const MotionBody = motion(MantineModal.Body);

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

    // Root-specific props
    const rootProps = {
        opened,
        onClose: onClose ? () => wire.emit('close') : undefined,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        returnFocus,
        removeScrollProps,
        transitionProps: { duration: 0 }, // Disable Mantine's transitions
    };

    // Content-specific props
    const contentProps = {
        centered,
        size,
        radius,
        fullScreen,
        xOffset,
        yOffset,
        scrollAreaComponent,
        classNames,
        styles,
    };

    return (
        <AnimatePresence mode="wait">
            {opened && (
                <MantineModal.Root {...rootProps}>
                    <MotionOverlay
                        {...overlayProps}
                        {...overlayAnimations.fade}
                    />
                    <MotionContent
                        {...contentProps}
                        {...overlayAnimations.scale}
                    >
                        <MotionHeader
                            {...layout.default}
                        >
                            {title && (
                                <motion.div
                                    {...layout.listItem}
                                >
                                    <MantineModal.Title>{title}</MantineModal.Title>
                                </motion.div>
                            )}
                            {withCloseButton && (
                                <motion.div
                                    {...interactive.button}
                                >
                                    <MantineModal.CloseButton {...closeButtonProps} />
                                </motion.div>
                            )}
                        </MotionHeader>
                        <MotionBody
                            {...layout.content}
                        >
                            {children}
                        </MotionBody>
                    </MotionContent>
                </MantineModal.Root>
            )}
        </AnimatePresence>
    );
}

// Compound components with Motion enhancements
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

    const rootProps = {
        opened,
        onClose: onClose ? () => wire.emit('close') : undefined,
        trapFocus,
        closeOnEscape,
        closeOnClickOutside,
        returnFocus,
        removeScrollProps,
        transitionProps: { duration: 0 },
    };

    return (
        <AnimatePresence mode="wait">
            {opened && (
                <MantineModal.Root {...rootProps}>
                    {children}
                </MantineModal.Root>
            )}
        </AnimatePresence>
    );
};

Modal.Overlay = function ModalOverlay({ wire, mingleData }) {
    return (
        <MotionOverlay
            {...mingleData}
            {...overlayAnimations.fade}
        />
    );
};

Modal.Content = function ModalContent({ wire, mingleData, children }) {
    return (
        <MotionContent
            {...mingleData}
            {...overlayAnimations.scale}
        >
            {children}
        </MotionContent>
    );
};

Modal.Header = function ModalHeader({ wire, mingleData, children }) {
    return (
        <MotionHeader
            {...mingleData}
            {...layout.default}
        >
            {children}
        </MotionHeader>
    );
};

Modal.Title = function ModalTitle({ wire, mingleData, children }) {
    return (
        <motion.div
            {...layout.listItem}
        >
            <MantineModal.Title {...mingleData}>{children}</MantineModal.Title>
        </motion.div>
    );
};

Modal.CloseButton = function ModalCloseButton({ wire, mingleData }) {
    return (
        <motion.div
            {...interactive.button}
        >
            <MantineModal.CloseButton {...mingleData} />
        </motion.div>
    );
};

Modal.Body = function ModalBody({ wire, mingleData, children }) {
    return (
        <MotionBody
            {...mingleData}
            {...layout.content}
        >
            {children}
        </MotionBody>
    );
};

export default Modal;
