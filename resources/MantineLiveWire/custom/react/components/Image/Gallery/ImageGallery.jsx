import React from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets } from '../../../utils/animations';
import Image from '../Image';

const MotionOverlay = motion.div;

function ImageGallery({ wire, mingleData, children }) {
    const {
        // Base image props
        ...imageProps
    } = mingleData;

    const {
        images = [], // Array of image srcs
        withThumbnails = true,
    } = mingleData;

    const [isOpen, setIsOpen] = React.useState(false);
    const [currentIndex, setCurrentIndex] = React.useState(0);
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

    const nextImage = (e) => {
        e.stopPropagation();
        setCurrentIndex((prev) => (prev + 1) % images.length);
        setScale(1);
    };

    const prevImage = (e) => {
        e.stopPropagation();
        setCurrentIndex((prev) => (prev - 1 + images.length) % images.length);
        setScale(1);
    };

    // Handle keyboard navigation
    React.useEffect(() => {
        const handleKeyPress = (e) => {
            if (!isOpen) return;
            
            switch (e.key) {
                case 'Escape':
                    handleClose();
                    break;
                case 'ArrowRight':
                    nextImage(e);
                    break;
                case 'ArrowLeft':
                    prevImage(e);
                    break;
                default:
                    break;
            }
        };

        window.addEventListener('keydown', handleKeyPress);
        return () => window.removeEventListener('keydown', handleKeyPress);
    }, [isOpen]);

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
                                maxHeight: withThumbnails ? '80vh' : '90vh'
                            }}
                        >
                            <Image
                                wire={wire}
                                mingleData={{
                                    ...imageProps,
                                    src: images[currentIndex],
                                    fit: 'contain',
                                    layoutId: images[currentIndex]
                                }}
                                style={{
                                    width: '100%',
                                    height: '100%',
                                    cursor: 'grab'
                                }}
                                animate={{ scale }}
                                transition={springs.input}
                            />

                            {/* Navigation buttons */}
                            {images.length > 1 && (
                                <>
                                    <motion.button
                                        onClick={prevImage}
                                        whileHover={{ scale: 1.1 }}
                                        whileTap={{ scale: 0.9 }}
                                        transition={springs.input}
                                        style={{
                                            position: 'absolute',
                                            left: -60,
                                            top: '50%',
                                            transform: 'translateY(-50%)',
                                            background: 'rgba(255, 255, 255, 0.1)',
                                            border: 'none',
                                            borderRadius: '50%',
                                            width: 40,
                                            height: 40,
                                            cursor: 'pointer',
                                            color: 'white'
                                        }}
                                    >
                                        ←
                                    </motion.button>
                                    <motion.button
                                        onClick={nextImage}
                                        whileHover={{ scale: 1.1 }}
                                        whileTap={{ scale: 0.9 }}
                                        transition={springs.input}
                                        style={{
                                            position: 'absolute',
                                            right: -60,
                                            top: '50%',
                                            transform: 'translateY(-50%)',
                                            background: 'rgba(255, 255, 255, 0.1)',
                                            border: 'none',
                                            borderRadius: '50%',
                                            width: 40,
                                            height: 40,
                                            cursor: 'pointer',
                                            color: 'white'
                                        }}
                                    >
                                        →
                                    </motion.button>
                                </>
                            )}

                            {/* Thumbnails */}
                            {withThumbnails && (
                                <motion.div
                                    initial={{ opacity: 0, y: 20 }}
                                    animate={{ opacity: 1, y: 0 }}
                                    exit={{ opacity: 0, y: 20 }}
                                    transition={springs.input}
                                    style={{
                                        position: 'absolute',
                                        bottom: 20,
                                        left: '50%',
                                        transform: 'translateX(-50%)',
                                        display: 'flex',
                                        gap: 10,
                                        padding: '10px 20px',
                                        background: 'rgba(0, 0, 0, 0.5)',
                                        borderRadius: 8,
                                        overflow: 'auto',
                                        maxWidth: '90%'
                                    }}
                                >
                                    {images.map((src, index) => (
                                        <motion.div
                                            key={src}
                                            whileHover={{ scale: 1.1 }}
                                            whileTap={{ scale: 0.9 }}
                                            transition={springs.input}
                                            onClick={() => {
                                                setCurrentIndex(index);
                                                setScale(1);
                                            }}
                                            style={{
                                                width: 60,
                                                height: 60,
                                                borderRadius: 4,
                                                overflow: 'hidden',
                                                border: index === currentIndex ? '2px solid white' : 'none',
                                                cursor: 'pointer'
                                            }}
                                        >
                                            <img
                                                src={src}
                                                alt={`Thumbnail ${index + 1}`}
                                                style={{
                                                    width: '100%',
                                                    height: '100%',
                                                    objectFit: 'cover'
                                                }}
                                            />
                                        </motion.div>
                                    ))}
                                </motion.div>
                            )}
                        </motion.div>
                    </MotionOverlay>
                )}
            </AnimatePresence>
        </>
    );
}

export default ImageGallery;
