import React from 'react';
import { Dialog as MantineDialog } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, interactive, layout } from '../../utils/animations';

// Motion-enhanced Dialog
const MotionDialog = motion(MantineDialog);

function Dialog({ wire, mingleData, children }) {
    const {
        opened,
        position = 'top',
        size,
        radius,
        withCloseButton,
        onClose,
        withBorder,
        classNames,
        styles,
    } = mingleData;

    // Get position-based animations
    const positionAnimations = overlayAnimations.getPositionAnimation(position);

    return (
        <AnimatePresence mode="wait">
            {opened && (
                <MotionDialog
                    opened={opened}
                    position={position}
                    size={size}
                    radius={radius}
                    withCloseButton={withCloseButton}
                    onClose={onClose ? () => wire.emit('close') : undefined}
                    withBorder={withBorder}
                    classNames={classNames}
                    styles={{
                        ...styles,
                        root: {
                            ...styles?.root,
                            zIndex: 1000,
                        },
                    }}
                    {...positionAnimations}
                    transition={springs.default}
                >
                    <motion.div
                        {...layout.content}
                    >
                        {withCloseButton && (
                            <motion.div
                                style={{ position: 'absolute', top: 8, right: 8 }}
                                {...interactive.button}
                            >
                                <MantineDialog.CloseButton onClick={onClose ? () => wire.emit('close') : undefined} />
                            </motion.div>
                        )}
                        <motion.div
                            {...layout.listItem}
                        >
                            {children}
                        </motion.div>
                    </motion.div>
                </MotionDialog>
            )}
        </AnimatePresence>
    );
}

export default Dialog;
