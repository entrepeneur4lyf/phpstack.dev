import React from 'react';
import { AreaChart as MantineAreaChart } from '@mantine/charts';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, scroll, presets, interactive } from '../../utils/animations';

// Motion-enhanced chart
const MotionAreaChart = motion(MantineAreaChart);

function AreaChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        type,
        h,
        w,
        curveType,
        connectNulls,
        withDots,
        withGradient,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        withXAxis,
        withYAxis,
        xAxisProps,
        yAxisProps,
        rightYAxisProps,
        withRightYAxis,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        dotProps,
        activeDotProps,
        strokeWidth,
        fillOpacity,
        areaChartProps,
        orientation,
        splitColors,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        classNames,
        styles,
    } = mingleData;

    const chartRef = React.useRef(null);

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: chartRef,
        offset: ["start end", "end start"]
    });

    // Enhanced dot props with hover animations
    const enhancedDotProps = {
        ...dotProps,
        component: motion.circle,
        componentProps: {
            ...interactive.button,
            transition: springs.chart
        }
    };

    // Enhanced active dot props
    const enhancedActiveDotProps = {
        ...activeDotProps,
        component: motion.circle,
        componentProps: {
            initial: { scale: 1 },
            animate: { scale: 1.2 },
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
                <MotionAreaChart
                    data={data}
                    dataKey={dataKey}
                    series={series}
                    type={type}
                    h={h}
                    w={w}
                    curveType={curveType}
                    connectNulls={connectNulls}
                    withDots={withDots}
                    withGradient={withGradient}
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
                    rightYAxisProps={rightYAxisProps}
                    withRightYAxis={withRightYAxis}
                    gridAxis={gridAxis}
                    tickLine={tickLine}
                    strokeDasharray={strokeDasharray}
                    unit={unit}
                    valueFormatter={valueFormatter}
                    dotProps={enhancedDotProps}
                    activeDotProps={enhancedActiveDotProps}
                    strokeWidth={strokeWidth}
                    fillOpacity={fillOpacity}
                    areaChartProps={{
                        ...areaChartProps,
                        // Add smooth data transitions
                        isAnimationActive: true,
                        animationBegin: 0,
                        animationDuration: presets.chart.duration * 1000,
                        animationEasing: presets.chart.ease
                    }}
                    orientation={orientation}
                    splitColors={splitColors}
                    gridColor={gridColor}
                    textColor={textColor}
                    referenceLines={referenceLines}
                    xAxisLabel={xAxisLabel}
                    yAxisLabel={yAxisLabel}
                    rightYAxisLabel={rightYAxisLabel}
                    withPointLabels={withPointLabels}
                    classNames={classNames}
                    styles={styles}
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

export default AreaChart;
