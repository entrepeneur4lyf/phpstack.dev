import React from 'react';
import { BarChart as MantineBarChart } from '@mantine/charts';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, scroll, presets, interactive } from '../../utils/animations';

// Motion-enhanced chart
const MotionBarChart = motion(MantineBarChart);

function BarChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        type,
        h,
        w,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        withXAxis,
        withYAxis,
        xAxisProps,
        yAxisProps,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        barProps,
        minBarSize,
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        withBarValueLabel,
        barChartProps,
        classNames,
        styles,
    } = mingleData;

    const chartRef = React.useRef(null);

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: chartRef,
        offset: ["start end", "end start"]
    });

    // Enhanced bar props with hover animations
    const enhancedBarProps = {
        ...barProps,
        component: motion.rect,
        componentProps: {
            ...interactive.button,
            // Scale from bottom up
            initial: { scaleY: 0, originY: 1 },
            animate: { scaleY: 1, originY: 1 },
            transition: {
                ...springs.chart,
                duration: presets.chart.duration,
                ease: presets.chart.ease
            }
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
                <MotionBarChart
                    data={data}
                    dataKey={dataKey}
                    series={series}
                    type={type}
                    h={h}
                    w={w}
                    withLegend={withLegend}
                    legendProps={{
                        ...legendProps,
                        component: motion.div,
                        componentProps: {
                            initial: { opacity: 0, y: 20 },
                            animate: { opacity: 1, y: 0 },
                            transition: springs.chart
                        }
                    }}
                    withTooltip={withTooltip}
                    tooltipProps={tooltipProps}
                    tooltipAnimationDuration={tooltipAnimationDuration || presets.chart.duration * 1000}
                    withXAxis={withXAxis}
                    withYAxis={withYAxis}
                    xAxisProps={xAxisProps}
                    yAxisProps={yAxisProps}
                    gridAxis={gridAxis}
                    tickLine={tickLine}
                    strokeDasharray={strokeDasharray}
                    unit={unit}
                    valueFormatter={valueFormatter}
                    barProps={enhancedBarProps}
                    minBarSize={minBarSize}
                    orientation={orientation}
                    gridColor={gridColor}
                    textColor={textColor}
                    referenceLines={referenceLines}
                    xAxisLabel={xAxisLabel}
                    yAxisLabel={yAxisLabel}
                    withBarValueLabel={withBarValueLabel}
                    barChartProps={{
                        ...barChartProps,
                        // Add smooth data transitions
                        isAnimationActive: true,
                        animationBegin: 0,
                        animationDuration: presets.chart.duration * 1000,
                        animationEasing: presets.chart.ease
                    }}
                    classNames={classNames}
                    styles={{
                        ...styles,
                        bar: {
                            ...styles?.bar,
                            transition: `all ${presets.chart.duration}s ${presets.chart.ease}`
                        }
                    }}
                    // Motion animations
                    initial={{ opacity: 0, scale: 0.95 }}
                    animate={{ opacity: 1, scale: 1 }}
                    exit={{ opacity: 0, scale: 0.95 }}
                    transition={springs.chart}
                />
            </AnimatePresence>
        </motion.div>
    );
}

export default BarChart;
