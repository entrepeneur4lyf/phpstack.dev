import React from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../../utils/animations';
import Image from '../Image';

const MotionOverlay = motion.div;

function ImageLightbox({ wire, mingleData, children }) {
    const {
        // Base image props
        ...imageProps
    } = mingleData;

    const [isOpen, setIsOpen] = React.useState(false);
    const [scale, setScale] = React.useState(1);

    const handleZoom = (e) => {
        e.stopPropagation();
        const delta = e.deltaY * -0.01;
        setScale(prev => Math.min(Math.max(0.5, prev + delta), 3));
    };

    const handleClose = () => {
        setIsOpen(false);
        setScale(1);
    };

    return (
        <>
            <Image
                wire={wire}
                mingleData={{
                    ...imageProps,
                    interactive: true,
                    whileHover: { cursor: 'zoom-in' }
                }}
                onClick={() => setIsOpen(true)}
            >
                {children}
            </Image>

            <AnimatePresence>
                {isOpen && (
                    <MotionOverlay
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        transition={{ duration: presets.input.duration }}
                        onClick={handleClose}
                        style={{
                            position: 'fixed',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: 'rgba(0, 0, 0, 0.9)',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            zIndex: 9999,
                            cursor: 'zoom-out'
                        }}
                    >
                        <motion.div
                            onClick={(e) => e.stopPropagation()}
                            onWheel={handleZoom}
                            style={{
                                maxWidth: '90vw',
                                maxHeight: '90vh'
                            }}
                        >
                            <Image
                                wire={wire}
                                mingleData={{
                                    ...imageProps,
                                    fit: 'contain',
                                    layoutId: imageProps.src
                                }}
                                style={{
                                    width: '100%',
                                    height: '100%',
                                    cursor: 'grab'
                                }}
                                animate={{ scale }}
                                transition={springs.input}
                            />
                        </motion.div>
                    </MotionOverlay>
                )}
            </AnimatePresence>
        </>
    );
}

export default ImageLightbox;
