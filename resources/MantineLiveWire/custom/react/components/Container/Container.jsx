import React, { useRef } from 'react';
import { Container as MantineContainer } from '@mantine/core';
import { motion, useScroll } from 'motion/react';
import { layout, scroll, springs } from '../../utils/animations';

// Motion-enhanced container
const MotionContainer = motion(MantineContainer);

function Container({ wire, mingleData, children }) {
    const {
        size,
        padding,
        fluid,
        // Animation props
        animate = true,
        scrollAnimation = false,
    } = mingleData;

    const containerRef = useRef(null);
    
    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: containerRef,
        offset: ["start end", "end start"]
    });

    // Base animation props
    const motionProps = animate ? {
        ...layout.default,
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
        transition: springs.default,
    } : {};

    // Add scroll animation props if enabled
    const scrollProps = scrollAnimation ? {
        style: scroll.scaleAndFade(scrollYProgress),
    } : {};

    return (
        <MotionContainer
            ref={containerRef}
            size={size}
            padding={padding}
            fluid={fluid}
            {...motionProps}
            {...scrollProps}
        >
            <motion.div
                {...layout.content}
            >
                {children}
            </motion.div>
        </MotionContainer>
    );
}

export default Container;
