import React from 'react';
import { BubbleChart as MantineBubbleChart } from '@mantine/charts';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, scroll, presets, interactive } from '../../utils/animations';

// Motion-enhanced chart
const MotionBubbleChart = motion(MantineBubbleChart);

function BubbleChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        range,
        label,
        color,
        h,
        w,
        withTooltip,
        tooltipProps,
        valueFormatter,
        gridColor,
        textColor,
        classNames,
        styles,
    } = mingleData;

    const chartRef = React.useRef(null);

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: chartRef,
        offset: ["start end", "end start"]
    });

    // Enhanced bubble props with animations
    const enhancedBubbleProps = {
        component: motion.circle,
        componentProps: {
            // Bubble-specific animations
            initial: { scale: 0, opacity: 0 },
            animate: { scale: 1, opacity: 1 },
            transition: {
                ...springs.chart,
                duration: presets.chart.duration,
                ease: presets.chart.ease
            },
            // Interactive hover effects
            whileHover: { 
                scale: 1.1,
                transition: {
                    ...springs.chart,
                    duration: presets.chart.duration * 0.5
                }
            },
            // Bounce on tap
            whileTap: { 
                scale: 0.95,
                transition: {
                    ...springs.chart,
                    duration: presets.chart.duration * 0.25
                }
            }
        }
    };

    // Process data to add staggered animations
    const processedData = React.useMemo(() => {
        return data.map((item, index) => ({
            ...item,
            // Add animation delay based on index
            animationDelay: index * (presets.chart.duration * 0.25)
        }));
    }, [data]);

    return (
        <motion.div
            ref={chartRef}
            style={{
                ...scroll.scaleAndFade(scrollYProgress),
                transition: `all ${presets.chart.duration}s ${presets.chart.ease}`
            }}
        >
            <AnimatePresence mode="wait">
                <MotionBubbleChart
                    data={processedData}
                    dataKey={dataKey}
                    range={range}
                    label={label}
                    color={color}
                    h={h}
                    w={w}
                    withTooltip={withTooltip}
                    tooltipProps={{
                        ...tooltipProps,
                        transitionDuration: presets.chart.duration * 1000
                    }}
                    valueFormatter={valueFormatter}
                    gridColor={gridColor}
                    textColor={textColor}
                    classNames={classNames}
                    styles={{
                        ...styles,
                        bubble: {
                            ...styles?.bubble,
                            transition: `all ${presets.chart.duration}s ${presets.chart.ease}`
                        }
                    }}
                    // Chart container animations
                    initial={{ opacity: 0, scale: 0.95 }}
                    animate={{ opacity: 1, scale: 1 }}
                    exit={{ opacity: 0, scale: 0.95 }}
                    transition={springs.chart}
                    // Add bubble props
                    bubbleProps={{
                        ...enhancedBubbleProps,
                        // Apply staggered animation delay
                        componentProps: {
                            ...enhancedBubbleProps.componentProps,
                            transition: (item) => ({
                                ...springs.chart,
                                delay: item.animationDelay,
                                duration: presets.chart.duration,
                                ease: presets.chart.ease
                            })
                        }
                    }}
                />
            </AnimatePresence>
        </motion.div>
    );
}

export default BubbleChart;
