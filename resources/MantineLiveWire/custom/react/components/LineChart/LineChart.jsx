import React from 'react';
import { LineChart as MantineLineChart } from '@mantine/charts';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionLineChart = motion(MantineLineChart);
const MotionPath = motion.path;
const MotionCircle = motion.circle;

function LineChart({ wire, mingleData }) {
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
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        lineChartProps,
        gradientStops,
        classNames,
        styles,
        // Animation props
        animate = true,
        withGradient = true,
    } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionLineChart
                data={data}
                dataKey={dataKey}
                series={series}
                type={type}
                h={h}
                w={w}
                curveType={curveType}
                connectNulls={connectNulls}
                withDots={withDots}
                withLegend={withLegend}
                legendProps={{
                    ...legendProps,
                    wrapperProps: {
                        ...legendProps?.wrapperProps,
                        initial: { opacity: 0, y: 20 },
                        animate: { opacity: 1, y: 0 },
                        transition: springs.chart,
                    },
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
                dotProps={{
                    ...dotProps,
                    component: ({ cx, cy, ...rest }) => (
                        <MotionCircle
                            cx={cx}
                            cy={cy}
                            initial={{ scale: 0, opacity: 0 }}
                            animate={{ scale: 1, opacity: 1 }}
                            transition={{
                                delay: presets.chart.duration * 0.5,
                                ...springs.chart,
                            }}
                            {...rest}
                        />
                    ),
                }}
                activeDotProps={activeDotProps}
                strokeWidth={strokeWidth}
                orientation={orientation}
                gridColor={gridColor}
                textColor={textColor}
                referenceLines={referenceLines}
                xAxisLabel={xAxisLabel}
                yAxisLabel={yAxisLabel}
                rightYAxisLabel={rightYAxisLabel}
                withPointLabels={withPointLabels}
                lineChartProps={{
                    ...lineChartProps,
                    className: animate ? 'animated-path' : '',
                }}
                gradientStops={gradientStops}
                classNames={{
                    ...classNames,
                    root: `${classNames?.root || ''} ${animate ? 'with-animations' : ''}`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'visible',
                        '& .animated-path': {
                            strokeDasharray: animate ? '1000' : 'none',
                            strokeDashoffset: animate ? '1000' : 'none',
                            animation: animate ? `drawLine ${presets.chart.duration}s ${presets.chart.ease} forwards` : 'none',
                        },
                        '@keyframes drawLine': {
                            to: {
                                strokeDashoffset: '0',
                            },
                        },
                    },
                }}
                {...layout.default}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={springs.chart}
            />
        </AnimatePresence>
    );
}

// Add variants for common use cases
LineChart.Area = function AreaChart(props) {
    return (
        <LineChart
            {...props}
            mingleData={{
                ...props.mingleData,
                type: 'area',
                withGradient: true,
                gradientStops: props.mingleData?.gradientStops || [
                    { offset: 0, color: 'currentColor', opacity: 0.2 },
                    { offset: 1, color: 'currentColor', opacity: 0 },
                ],
            }}
        />
    );
};

LineChart.Smooth = function SmoothChart(props) {
    return (
        <LineChart
            {...props}
            mingleData={{
                ...props.mingleData,
                curveType: 'natural',
                withDots: true,
                strokeWidth: 2,
            }}
        />
    );
};

LineChart.Minimal = function MinimalChart(props) {
    return (
        <LineChart
            {...props}
            mingleData={{
                ...props.mingleData,
                withXAxis: false,
                withYAxis: false,
                withTooltip: false,
                withDots: false,
                strokeWidth: 1,
            }}
        />
    );
};

export default LineChart;
