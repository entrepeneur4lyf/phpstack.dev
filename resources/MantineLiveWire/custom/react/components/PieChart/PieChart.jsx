import React from 'react';
import { PieChart as MantinePieChart } from '@mantine/charts';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionPieChart = motion(MantinePieChart);
const MotionPath = motion.path;
const MotionText = motion.text;

function PieChart({ wire, mingleData }) {
    const {
        data,
        size,
        withTooltip = true,
        tooltipDataSource,
        withLabels = true,
        withLabelsLine = true,
        labelsPosition = 'outside',
        labelsType = 'percent',
        startAngle = 0,
        endAngle = 360,
        strokeWidth = 1,
        strokeColor,
        h,
        w,
        classNames,
        styles,
        // Animation props
        animate = true,
        interactive: isInteractive = true,
    } = mingleData;

    // Segment animation
    const segmentAnimation = {
        initial: { 
            pathLength: 0,
            rotate: startAngle - 90, // Adjust for SVG coordinate system
        },
        animate: { 
            pathLength: 1,
            rotate: endAngle - 90,
            transition: {
                duration: presets.chart.duration,
                ease: presets.chart.ease,
                pathLength: {
                    duration: presets.chart.duration * 0.75,
                    ease: presets.chart.ease,
                },
                rotate: {
                    duration: presets.chart.duration,
                    ease: presets.chart.ease,
                },
            }
        },
    };

    // Label animation
    const labelAnimation = {
        initial: { opacity: 0, scale: 0.8 },
        animate: { 
            opacity: 1, 
            scale: 1,
            transition: {
                delay: presets.chart.duration * 0.5,
                duration: presets.chart.duration * 0.5,
                ease: presets.chart.ease,
            }
        },
        exit: { opacity: 0, scale: 0.8 }
    };

    // Interactive segment props
    const getInteractiveProps = () => {
        if (!isInteractive) return {};

        return {
            whileHover: { 
                scale: 1.05,
                transition: {
                    ...springs.chart,
                    duration: presets.chart.duration * 0.3
                }
            },
            whileTap: { scale: 0.95 }
        };
    };

    return (
        <AnimatePresence mode="wait">
            <MotionPieChart
                data={data}
                size={size}
                withTooltip={withTooltip}
                tooltipDataSource={tooltipDataSource}
                withLabels={withLabels}
                withLabelsLine={withLabelsLine}
                labelsPosition={labelsPosition}
                labelsType={labelsType}
                startAngle={startAngle}
                endAngle={endAngle}
                strokeWidth={strokeWidth}
                strokeColor={strokeColor}
                h={h}
                w={w}
                classNames={{
                    ...classNames,
                    segment: `${classNames?.segment || ''} ${animate ? 'animated-segment' : ''}`,
                    label: `${classNames?.label || ''} ${animate ? 'animated-label' : ''}`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'visible',
                    },
                    segment: {
                        ...styles?.segment,
                        transition: animate ? 
                            `all ${presets.chart.duration}s ${presets.chart.ease}` : 
                            undefined,
                    },
                }}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={springs.chart}
                segmentComponent={({ path, color, ...rest }) => (
                    <MotionPath
                        d={path}
                        fill={color}
                        {...rest}
                        {...(animate && segmentAnimation)}
                        {...getInteractiveProps()}
                    />
                )}
                labelComponent={({ text, ...rest }) => (
                    <MotionText
                        {...rest}
                        {...(animate && labelAnimation)}
                    >
                        {text}
                    </MotionText>
                )}
            />
        </AnimatePresence>
    );
}

// Add variants for common use cases
PieChart.Donut = function DonutChart(props) {
    return (
        <PieChart
            {...props}
            mingleData={{
                ...props.mingleData,
                strokeWidth: props.mingleData?.strokeWidth || 32,
                withLabels: props.mingleData?.withLabels ?? false,
            }}
        />
    );
};

PieChart.HalfPie = function HalfPieChart(props) {
    return (
        <PieChart
            {...props}
            mingleData={{
                ...props.mingleData,
                startAngle: -90,
                endAngle: 90,
                labelsPosition: 'outside',
            }}
        />
    );
};

PieChart.Interactive = function InteractivePieChart(props) {
    return (
        <PieChart
            {...props}
            mingleData={{
                ...props.mingleData,
                interactive: true,
                withTooltip: true,
                withLabels: true,
            }}
        />
    );
};

export default PieChart;
