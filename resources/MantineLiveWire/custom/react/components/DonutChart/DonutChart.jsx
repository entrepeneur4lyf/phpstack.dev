import React from 'react';
import { DonutChart as MantineDonutChart } from '@mantine/charts';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, scroll, presets, interactive } from '../../utils/animations';

// Motion-enhanced chart
const MotionDonutChart = motion(MantineDonutChart);

function DonutChart({ wire, mingleData }) {
    const {
        data,
        size,
        thickness,
        paddingAngle,
        withTooltip,
        tooltipDataSource,
        withLabels,
        withLabelsLine,
        chartLabel,
        startAngle,
        endAngle,
        strokeWidth,
        strokeColor,
        h,
        w,
        classNames,
        styles,
    } = mingleData;

    const chartRef = React.useRef(null);

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: chartRef,
        offset: ["start end", "end start"]
    });

    // Process data to add staggered animations
    const processedData = React.useMemo(() => {
        return data.map((item, index) => ({
            ...item,
            // Add animation delay based on index
            animationDelay: index * (presets.chart.duration * 0.25)
        }));
    }, [data]);

    // Enhanced segment props with animations
    const enhancedSegmentProps = {
        component: motion.path,
        componentProps: {
            // Segment-specific animations
            initial: { 
                opacity: 0,
                pathLength: 0,
                rotate: -90
            },
            animate: { 
                opacity: 1,
                pathLength: 1,
                rotate: 0
            },
            transition: (item) => ({
                ...springs.chart,
                delay: item.animationDelay,
                duration: presets.chart.duration,
                ease: presets.chart.ease
            }),
            // Interactive hover effects
            whileHover: { 
                scale: 1.05,
                transition: {
                    ...springs.chart,
                    duration: presets.chart.duration * 0.5
                }
            }
        }
    };

    // Enhanced label animations
    const enhancedLabelProps = {
        component: motion.text,
        componentProps: {
            initial: { opacity: 0, y: 10 },
            animate: { opacity: 1, y: 0 },
            transition: {
                ...springs.chart,
                delay: presets.chart.duration * 0.5
            }
        }
    };

    // Enhanced label line animations
    const enhancedLabelLineProps = {
        component: motion.line,
        componentProps: {
            initial: { opacity: 0, pathLength: 0 },
            animate: { opacity: 1, pathLength: 1 },
            transition: {
                ...springs.chart,
                delay: presets.chart.duration * 0.5
            }
        }
    };

    // Enhanced chart label
    const enhancedChartLabel = chartLabel && {
        ...chartLabel,
        component: motion.text,
        componentProps: {
            initial: { opacity: 0, scale: 0.8 },
            animate: { opacity: 1, scale: 1 },
            transition: springs.chart
        }
    };

    return (
        <motion.div
            ref={chartRef}
            style={{
                ...scroll.scaleAndFade(scrollYProgress),
                transition: `all ${presets.chart.duration}s ${presets.chart.ease}`
            }}
        >
            <AnimatePresence mode="wait">
                <MotionDonutChart
                    data={processedData}
                    size={size}
                    thickness={thickness}
                    paddingAngle={paddingAngle}
                    withTooltip={withTooltip}
                    tooltipDataSource={tooltipDataSource}
                    tooltipProps={{
                        transitionDuration: presets.chart.duration * 1000
                    }}
                    withLabels={withLabels}
                    withLabelsLine={withLabelsLine}
                    chartLabel={enhancedChartLabel}
                    startAngle={startAngle}
                    endAngle={endAngle}
                    strokeWidth={strokeWidth}
                    strokeColor={strokeColor}
                    h={h}
                    w={w}
                    classNames={classNames}
                    styles={{
                        ...styles,
                        segment: {
                            ...styles?.segment,
                            transition: `all ${presets.chart.duration}s ${presets.chart.ease}`
                        }
                    }}
                    // Add segment animations
                    segmentProps={enhancedSegmentProps}
                    // Add label animations
                    labelProps={enhancedLabelProps}
                    // Add label line animations
                    labelLineProps={enhancedLabelLineProps}
                    // Motion animations for container
                    initial={{ opacity: 0, scale: 0.95, rotate: -90 }}
                    animate={{ opacity: 1, scale: 1, rotate: 0 }}
                    exit={{ opacity: 0, scale: 0.95, rotate: 90 }}
                    transition={springs.chart}
                />
            </AnimatePresence>
        </motion.div>
    );
}

// Add static methods for different animation styles
DonutChart.Spin = function SpinDonutChart(props) {
    return (
        <DonutChart
            {...props}
            mingleData={{
                ...props.mingleData,
                startAngle: -90,
                endAngle: 270
            }}
        />
    );
};

DonutChart.Split = function SplitDonutChart(props) {
    return (
        <DonutChart
            {...props}
            mingleData={{
                ...props.mingleData,
                paddingAngle: 4,
                thickness: 20
            }}
        />
    );
};

export default DonutChart;
