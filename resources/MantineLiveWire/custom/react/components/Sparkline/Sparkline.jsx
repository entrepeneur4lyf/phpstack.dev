import React from 'react';
import { Sparkline as MantineSparkline } from '@mantine/charts';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionSparkline = motion(MantineSparkline);
const MotionPath = motion.path;

function Sparkline({ wire, mingleData }) {
    const {
        data,
        w,
        h,
        curveType,
        color,
        fillOpacity,
        strokeWidth,
        trendColors,
        classNames,
        styles,
        // Animation props
        animate = true,
        withGradient = true,
    } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionSparkline
                data={data}
                w={w}
                h={h}
                curveType={curveType}
                color={color}
                fillOpacity={animate ? 0 : fillOpacity} // Start with 0 opacity for animation
                strokeWidth={strokeWidth}
                trendColors={trendColors}
                classNames={classNames}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'visible', // Allow overflow for animations
                    },
                }}
                {...layout.default}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={springs.chart}
            >
                {/* Animate the line path */}
                {animate && (
                    <motion.g>
                        <MotionPath
                            initial={{ pathLength: 0 }}
                            animate={{ pathLength: 1 }}
                            transition={{
                                duration: presets.chart.duration,
                                ease: presets.chart.ease,
                            }}
                        />
                        
                        {/* Animate the gradient fill */}
                        {withGradient && (
                            <motion.path
                                initial={{ opacity: 0 }}
                                animate={{ 
                                    opacity: fillOpacity,
                                    transition: {
                                        delay: presets.chart.duration * 0.5, // Start after line animation
                                        duration: presets.chart.duration * 0.5,
                                        ease: presets.chart.ease,
                                    }
                                }}
                            />
                        )}
                    </motion.g>
                )}
            </MotionSparkline>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Sparkline.Trend = function SparklineTrend(props) {
    return (
        <Sparkline
            {...props}
            mingleData={{
                ...props.mingleData,
                trendColors: props.mingleData?.trendColors || {
                    positive: 'green',
                    negative: 'red',
                },
                strokeWidth: props.mingleData?.strokeWidth || 2,
                h: props.mingleData?.h || 30,
            }}
        />
    );
};

Sparkline.Mini = function SparklineMini(props) {
    return (
        <Sparkline
            {...props}
            mingleData={{
                ...props.mingleData,
                h: props.mingleData?.h || 20,
                w: props.mingleData?.w || 80,
                strokeWidth: props.mingleData?.strokeWidth || 1,
                fillOpacity: props.mingleData?.fillOpacity || 0.2,
            }}
        />
    );
};

Sparkline.Area = function SparklineArea(props) {
    return (
        <Sparkline
            {...props}
            mingleData={{
                ...props.mingleData,
                fillOpacity: props.mingleData?.fillOpacity || 0.4,
                withGradient: true,
            }}
        />
    );
};

export default Sparkline;
