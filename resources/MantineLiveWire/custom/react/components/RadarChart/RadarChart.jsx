import React from 'react';
import { RadarChart as MantineRadarChart } from '@mantine/charts';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionRadarChart = motion(MantineRadarChart);
const MotionPath = motion.path;
const MotionCircle = motion.circle;
const MotionText = motion.text;

function RadarChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        h,
        w,
        withPolarGrid = true,
        withPolarAngleAxis = true,
        withPolarRadiusAxis = true,
        withLegend = true,
        radarChartProps,
        polarGridProps,
        polarAngleAxisProps,
        polarRadiusAxisProps,
        classNames,
        styles,
        // Animation props
        animate = true,
        interactive: isInteractive = true,
    } = mingleData;

    // Path animation for radar lines
    const pathAnimation = {
        initial: { pathLength: 0, opacity: 0 },
        animate: { 
            pathLength: 1,
            opacity: 1,
            transition: {
                duration: presets.chart.duration,
                ease: presets.chart.ease,
                opacity: { duration: presets.chart.duration * 0.5 }
            }
        }
    };

    // Grid animation
    const gridAnimation = {
        initial: { scale: 0.8, opacity: 0 },
        animate: { 
            scale: 1,
            opacity: 1,
            transition: {
                duration: presets.chart.duration * 0.5,
                ease: presets.chart.ease
            }
        }
    };

    // Label animation
    const labelAnimation = {
        initial: { opacity: 0, y: 5 },
        animate: { 
            opacity: 1,
            y: 0,
            transition: {
                delay: presets.chart.duration * 0.5,
                duration: presets.chart.duration * 0.5,
                ease: presets.chart.ease
            }
        }
    };

    // Interactive point props
    const getInteractiveProps = () => {
        if (!isInteractive) return {};

        return {
            whileHover: { 
                scale: 1.2,
                transition: {
                    ...springs.chart,
                    duration: presets.chart.duration * 0.3
                }
            },
            whileTap: { scale: 0.9 }
        };
    };

    return (
        <AnimatePresence mode="wait">
            <MotionRadarChart
                data={data}
                dataKey={dataKey}
                series={series}
                h={h}
                w={w}
                withPolarGrid={withPolarGrid}
                withPolarAngleAxis={withPolarAngleAxis}
                withPolarRadiusAxis={withPolarRadiusAxis}
                withLegend={withLegend}
                radarChartProps={{
                    ...radarChartProps,
                    className: `${radarChartProps?.className || ''} ${animate ? 'animated-radar' : ''}`,
                }}
                polarGridProps={{
                    ...polarGridProps,
                    gridComponent: ({ path, ...rest }) => (
                        <MotionPath
                            d={path}
                            {...rest}
                            {...(animate && gridAnimation)}
                        />
                    ),
                }}
                polarAngleAxisProps={{
                    ...polarAngleAxisProps,
                    tickComponent: ({ x, y, payload }) => (
                        <MotionText
                            x={x}
                            y={y}
                            {...(animate && labelAnimation)}
                        >
                            {payload.value}
                        </MotionText>
                    ),
                }}
                polarRadiusAxisProps={polarRadiusAxisProps}
                classNames={{
                    ...classNames,
                    radar: `${classNames?.radar || ''} ${animate ? 'animated-path' : ''}`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'visible',
                    },
                }}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={springs.chart}
                radarComponent={({ points, color, ...rest }) => (
                    <motion.g>
                        <MotionPath
                            {...rest}
                            stroke={color}
                            fill={color}
                            fillOpacity={0.2}
                            {...(animate && pathAnimation)}
                        />
                        {isInteractive && points.map((point, index) => (
                            <MotionCircle
                                key={index}
                                cx={point.x}
                                cy={point.y}
                                r={4}
                                fill={color}
                                {...getInteractiveProps()}
                            />
                        ))}
                    </motion.g>
                )}
            />
        </AnimatePresence>
    );
}

// Add variants for common use cases
RadarChart.Simple = function SimpleRadarChart(props) {
    return (
        <RadarChart
            {...props}
            mingleData={{
                ...props.mingleData,
                withPolarGrid: false,
                withPolarRadiusAxis: false,
            }}
        />
    );
};

RadarChart.Interactive = function InteractiveRadarChart(props) {
    return (
        <RadarChart
            {...props}
            mingleData={{
                ...props.mingleData,
                interactive: true,
                withLegend: true,
            }}
        />
    );
};

RadarChart.Filled = function FilledRadarChart(props) {
    return (
        <RadarChart
            {...props}
            mingleData={{
                ...props.mingleData,
                radarChartProps: {
                    ...props.mingleData?.radarChartProps,
                    fillOpacity: 0.3,
                },
            }}
        />
    );
};

export default RadarChart;
