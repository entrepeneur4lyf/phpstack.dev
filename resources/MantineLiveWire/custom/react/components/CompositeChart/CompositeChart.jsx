import React from 'react';
import { CompositeChart as MantineCompositeChart } from '@mantine/charts';
import { motion, AnimatePresence, useScroll } from 'motion/react';
import { springs, scroll, presets, interactive } from '../../utils/animations';

// Motion-enhanced chart
const MotionCompositeChart = motion(MantineCompositeChart);

function CompositeChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        h,
        w,
        curveType,
        connectNulls,
        withDots,
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
        maxBarWidth,
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        composedChartProps,
        classNames,
        styles,
    } = mingleData;

    const chartRef = React.useRef(null);

    // Scroll-linked animations
    const { scrollYProgress } = useScroll({
        target: chartRef,
        offset: ["start end", "end start"]
    });

    // Process series to add staggered animations
    const enhancedSeries = React.useMemo(() => {
        return series.map((item, index) => {
            const baseDelay = index * (presets.chart.duration * 0.25);
            const getTypeSpecificProps = () => {
                switch (item.type) {
                    case 'bar':
                        return {
                            component: motion.rect,
                            componentProps: {
                                initial: { scaleY: 0, originY: 1 },
                                animate: { scaleY: 1, originY: 1 },
                                transition: {
                                    ...springs.chart,
                                    delay: baseDelay
                                },
                                ...interactive.button
                            }
                        };
                    case 'area':
                        return {
                            component: motion.path,
                            componentProps: {
                                initial: { opacity: 0, pathLength: 0 },
                                animate: { opacity: 1, pathLength: 1 },
                                transition: {
                                    ...springs.chart,
                                    delay: baseDelay
                                }
                            }
                        };
                    case 'line':
                        return {
                            component: motion.path,
                            componentProps: {
                                initial: { pathLength: 0 },
                                animate: { pathLength: 1 },
                                transition: {
                                    ...springs.chart,
                                    delay: baseDelay
                                }
                            }
                        };
                    default:
                        return {};
                }
            };

            return {
                ...item,
                ...getTypeSpecificProps()
            };
        });
    }, [series]);

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
                <MotionCompositeChart
                    data={data}
                    dataKey={dataKey}
                    series={enhancedSeries}
                    h={h}
                    w={w}
                    curveType={curveType}
                    connectNulls={connectNulls}
                    withDots={withDots}
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
                    maxBarWidth={maxBarWidth}
                    orientation={orientation}
                    gridColor={gridColor}
                    textColor={textColor}
                    referenceLines={referenceLines}
                    xAxisLabel={xAxisLabel}
                    yAxisLabel={yAxisLabel}
                    rightYAxisLabel={rightYAxisLabel}
                    withPointLabels={withPointLabels}
                    composedChartProps={{
                        ...composedChartProps,
                        // Add smooth data transitions
                        isAnimationActive: true,
                        animationBegin: 0,
                        animationDuration: presets.chart.duration * 1000,
                        animationEasing: presets.chart.ease
                    }}
                    classNames={classNames}
                    styles={{
                        ...styles,
                        chart: {
                            ...styles?.chart,
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

export default CompositeChart;
