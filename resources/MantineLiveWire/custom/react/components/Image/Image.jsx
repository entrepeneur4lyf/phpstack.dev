import React from 'react';
import { Image as MantineImage, AspectRatio } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionImage = motion(MantineImage);
const MotionAspectRatio = motion(AspectRatio);

function Image({ wire, mingleData, children }) {
    const {
        src,
        alt,
        height,
        width,
        radius,
        fit,
        fallbackSrc,
        component,
        classNames,
        styles,
        // Animation props
        effect = 'fade',
        animate = true,
        interactive: isInteractive = false,
        // Optional aspect ratio
        ratio,
    } = mingleData;

    const [isLoading, setIsLoading] = React.useState(true);
    const [error, setError] = React.useState(false);
    const [currentSrc, setCurrentSrc] = React.useState(src);

    // Handle image load/error
    const handleLoad = () => {
        setIsLoading(false);
        setError(false);
    };

    const handleError = () => {
        setError(true);
        setIsLoading(false);
        if (fallbackSrc) {
            setCurrentSrc(fallbackSrc);
        }
    };

    // Effect-based animations
    const getEffectAnimations = () => {
        switch (effect) {
            case 'scale':
                return {
                    initial: { opacity: 0, scale: 0.8 },
                    animate: { opacity: 1, scale: 1 },
                    exit: { opacity: 0, scale: 0.8 }
                };
            case 'slide':
                return {
                    initial: { opacity: 0, y: 20 },
                    animate: { opacity: 1, y: 0 },
                    exit: { opacity: 0, y: -20 }
                };
            case 'fade':
            default:
                return {
                    initial: { opacity: 0 },
                    animate: { opacity: 1 },
                    exit: { opacity: 0 }
                };
        }
    };

    // Interactive animations
    const getInteractiveProps = () => {
        if (!isInteractive) return {};

        return {
            whileHover: { 
                scale: 1.05,
                transition: {
                    ...springs.input,
                    duration: presets.input.duration * 0.5
                }
            },
            whileTap: { scale: 0.95 }
        };
    };

    const imageContent = (
        <MotionImage
            src={currentSrc}
            alt={alt}
            height={height}
            width={width}
            radius={radius}
            fit={fit}
            fallbackSrc={fallbackSrc}
            component={component}
            classNames={classNames}
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden'
                },
                image: {
                    ...styles?.image,
                    transition: animate ? 
                        `all ${presets.input.duration}s ${presets.input.ease}` : 
                        undefined
                }
            }}
            onLoad={handleLoad}
            onError={handleError}
            {...(animate && {
                layout: true,
                ...getEffectAnimations(),
                transition: {
                    ...springs.input,
                    layout: {
                        duration: presets.input.duration,
                        ease: presets.input.ease
                    }
                }
            })}
            {...getInteractiveProps()}
        >
            {/* Loading overlay */}
            {isLoading && (
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: presets.input.duration }}
                    style={{
                        position: 'absolute',
                        top: 0,
                        left: 0,
                        right: 0,
                        bottom: 0,
                        background: 'rgba(0, 0, 0, 0.1)',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center'
                    }}
                >
                    <motion.div
                        animate={{ 
                            rotate: 360,
                            transition: {
                                duration: 1,
                                repeat: Infinity,
                                ease: 'linear'
                            }
                        }}
                        style={{
                            width: 24,
                            height: 24,
                            border: '2px solid rgba(0, 0, 0, 0.1)',
                            borderTopColor: 'rgba(0, 0, 0, 0.5)',
                            borderRadius: '50%'
                        }}
                    />
                </motion.div>
            )}
            {children}
        </MotionImage>
    );

    return ratio ? (
        <MotionAspectRatio ratio={ratio}>
            {imageContent}
        </MotionAspectRatio>
    ) : (
        imageContent
    );
}

// Animation variants
Image.Fade = function FadeImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, effect: 'fade' }} />;
};

Image.Scale = function ScaleImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, effect: 'scale' }} />;
};

Image.Slide = function SlideImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, effect: 'slide' }} />;
};

// Interactive variant
Image.Interactive = function InteractiveImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, interactive: true }} />;
};

// Aspect ratio variants
Image.Square = function SquareImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, ratio: 1 }} />;
};

Image.Video = function VideoImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, ratio: 16/9 }} />;
};

Image.Portrait = function PortraitImage(props) {
    return <Image {...props} mingleData={{ ...props.mingleData, ratio: 3/4 }} />;
};

export default Image;
